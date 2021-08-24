<?php
    namespace Modularity;

    use enshrined\svgSanitize\Sanitizer as SVGSanitize;

    class BlockManager {

        public $modules = [];
        public $classes = [];

        public function __construct() {
            add_filter('block_categories', array($this, 'filterCategories'), 10, 2);
            add_filter('acf/load_field_group', array($this, 'addLocationRule'));
            add_filter('allowed_block_types', array($this, 'filterBlockTypes'));
            add_filter('render_block', array($this,'renderCustomGrid'), 10, 2);
            add_filter('render_block_data', array($this, 'blockDataPreRender'), 10, 2);
        }

        /**
         * Add missing width to columns
         * @return array
         */
        function blockDataPreRender($block_content, $block) {
           
            if($block['blockName'] === 'core/columns') {
                foreach($block['innerBlocks'] as &$innerBlock) {

                    if (!isset($innerBlock['attrs']['width'])) {
                        $innerBlock['attrs']['width'] = false;
                    }
                    
                    if(!$innerBlock['attrs']['width']) {
                        //Calculate the missing width and format number to two decimal points
                        $width = 100 / count($block['innerBlocks']);
                        $width = (string) round($width, 0) . '%';
                        $innerBlock['attrs']['width'] = $width;
                    }
                }
            }
 
            return $block;
        }

        /**
         * Render a custom grid around each column
         * @return string
         */
        function renderCustomGrid (string $block_content, array $block): string 
        {
            $widths = [
                '100%' => 'grid-md-12',
                '75%'  => 'grid-md-9',
                '66%'  => 'grid-md-8',
                '50%'  => 'grid-md-6',
                '33%'  => 'grid-md-4',
                '25%'  => 'grid-md-3'
            ];
            
            if ( 'core/column' === $block['blockName'] ) {
                $block_content = '<div class="'. $widths[$block['attrs']['width']] .'">' . $block_content . '</div>';
            }

            return $block_content;
        }

        /**
         * Filter out all of the native block types except freeform, aka classic
         * @return array
         */
        public function filterBlockTypes($allowedBlocks) {
            $registeredBlocks = \WP_Block_Type_Registry::get_instance()->get_all_registered();
            
            foreach($registeredBlocks as $type => $block) {
                $allowedCoreBlocks = array(
                    'core/columns',
                    'core/freeform'
                );
                
                if(str_contains($type, 'core/') && !in_array($type, $allowedCoreBlocks)) {
                    unset($registeredBlocks[$type]);
                }
            }

            return array_keys($registeredBlocks);
        }

        /**
         * Add a module category
         * @return array
         */
        public function filterCategories( $categories, $post ) {            
            
            return array_merge(
                $categories,
                array([
                    'slug' => 'modules',
                    'title' => __( 'Modules', 'modularity' ),
                    'icon' => 'wordpress'
                ])
            );
        }
        
        /**
         * Register all registered and compatible modules as blocks
         * @return void
         */
        public function registerBlocks() {
            if( function_exists('acf_register_block_type') ) {
                foreach($this->classes as $class) {
                    if($class->isBlockCompatible) {

                        //Look for icon (including cleaning)
                        if($class->assetDir && file_exists($class->assetDir. 'icon.svg')) {
                            $sanitizer = new SVGSanitize();
                            $sanitizer->minify(true);
                            $sanitizer->removeXMLTag(true); 
                            $icon = $sanitizer->sanitize(
                                file_get_contents($class->assetDir . 'icon.svg')
                            );
                        } else {
                            $icon = ''; 
                        }

                        //Create block
                        acf_register_block_type(array(
                            'name'              => $class->slug,
                            'title'             => __($class->nameSingular),
                            'icon'              => $icon,
                            'description'       => __($class->description),
                            'render_callback'   => array($this, 'renderBlock'),
                            'category'          => 'modules',
                            'moduleName'        => $class->slug,
                            'supports'          => array(
                                'jsx' => true
                            ),
                        ));
                    }
                }
            }

        }

        /**
         * Add location rule to each field group to make them avaible to corresponding block
         * @return array
         */
        public function addLocationRule($group) {

            $newGroup = $group;

            $enabledModules = \Modularity\ModuleManager::$enabled;  

            if (($key = array_search('mod-table', $enabledModules)) !== false) {
                unset($enabledModules[$key]);
            } 

            foreach($group['location'] as $location) {                
                foreach($location as $locationRule) {
                    $valueIsModule = in_array($locationRule['value'], $enabledModules);  
                    $locationRuleExists = str_contains($locationRule['value'], 'acf/');

                    // If the location rule that we are trying to add already exists, return original group
                    if($locationRuleExists && $locationRule['param'] === 'block') {
                        
                        return $group;
                    }

                    if($valueIsModule && $locationRule['operator'] === '==') {
                                                                        
                        $newGroup['location'][] = [
                            [
                                'param' => 'block',
                                'operator' => '==', 
                                'value' => \str_replace('mod-', 'acf/', $locationRule['value'])
                            ]
                        ];  
                        
                    }
                }
            }

            return $newGroup;
        }

        /**
         * Set the default value of fields if value is missing
         * @return array
         */
        private function setDefaultValues($data, $defaultValues) {
            foreach($data as $key => &$dataPoint) {
                if(empty($dataPoint)) {
                    $isSnakeCased = \str_contains($key, '_');

                    if($isSnakeCased) {
                        $dataPoint = $defaultValues['_' . $key];
                    } else {
                        $key = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $key));
                        $dataPoint = $defaultValues['_' . $key];
                    }
                }
            }

            return $data;
        }

        /**
         * Get the default values of fields
         * @return array
         */
        private function getDefaultValues($blockData) {
            $fieldDefaultValues = [];
            foreach($blockData as $key => $dataPoint) {
                
                if($defaultValue = get_field_object($dataPoint)['default_value']) {
                    $fieldDefaultValues[$key] = $defaultValue;
                }
            }

            return $fieldDefaultValues;
        }

        /**
         * The callback used by registerBlocks to render either a block or a notice if validation failed
         * @return void
         */
        public function renderBlock($block) {                            
            $defaultValues = $this->getDefaultValues($block['data']);                            
            $display = new Display();            
            $module = $this->classes[$block['moduleName']];
            $module->data = $block['data'];
            $module->data = $module->data();
            $module->data = $this->setDefaultValues($module->data, $defaultValues); 
            $view = str_replace('.blade.php', '', $module->template());
            $view = !empty($view) ? $view : $block['moduleName'];       
            $viewData = array_merge(['post_type' => $module->moduleSlug], $module->data);                        
            $validatedCorrectly = $this->validateFields($block['data']);

            if($validatedCorrectly) {
                // Render block view if validated correctly
                echo  $display->renderView($view, $viewData);
            } elseif(is_user_logged_in()) {
                // Render a notice warning the user of required fields not filled in.
                echo '<div class="c-notice c-notice--danger">
                        <span class="c-notice__icon">
                                    
                            <i class="c-icon c-icon--size-md material-icons">
                                report
                            </i>            
                        </span>
                        <span class="c-notice__message--sm">
                            ['. $module->nameSingular .'] Please fill in all required fields
                                    
                        </span>
                    </div>';
            }
        }

        /**
         * Validates the required fields
         * @return boolean
         */
        private function validateFields($fields) {        
            $valid = true;

            foreach($fields as $key => $value) {    
                
                if(is_string($key) && is_string($value)) {
                    
                    if(str_contains($key, 'field_')) {
                        $field = $key;
                    }elseif(str_contains($value, 'field_')){
                        $field = $value;
                    }
                    
                }

                $fieldObject = get_field_object($field);

                //Skip validation of decendants
                if(isset($fieldObject['parent']) && str_contains($fieldObject['parent'], 'field_')) {
                    continue;
                }
                
                //Check if required field has a value
                if($fieldObject['required'] && !$fieldObject['value']) {
                    $valid = false;
                }
                
            }

            return $valid;
        }
    }