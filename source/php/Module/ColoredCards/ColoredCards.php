<?php

namespace Modularity\Module\ColoredCards;

use Municipio\Helper\Image as ImageHelper;

use Modularity\Integrations\Component\ImageResolver;
use ComponentLibrary\Integrations\Image\Image as ImageComponentContract;

class ColoredCards extends \Modularity\Module
{
    public $slug = 'coloredcards';
    public $supports = array();
    public $blockSupports = array(
        'align' => ['full']
    );

    private $baseClass;

    private static $palettesToGet = [
        'color_palette_primary',
        'color_palette_secondary',
        'color_background',
    ];

    public function init()
    {
        $this->nameSingular = __("Colored Cards", 'modularity');
        $this->namePlural = __("Colored Cards", 'modularity');
        $this->description = __("Creates card with colored backgrounds from manual data.", 'modularity');

        $this->baseClass = $this->slug . '-' . $this->ID;;

        add_filter('Modularity/Block/Data', array($this, 'blockData'), 50, 3);

        add_filter('acf/load_field/key=field_67f00af58f0c6', array($this, 'colorChoices'));
    }

    public function data(): array
    {
        $data           = [];
        $fields         = $this->getFields();

        $data['cards']  = $this->prepareCards($fields['cards']);

        $data['baseClass'] = $this->baseClass;
        $data['cardClass'] = 'colored-card u-padding--4';
        $data['columnClass'] = $this->getColumnClass();
        $data['wrapperClass'] = $this->getWrapperClass(); 

        $data['wrapCards'] = $fields['wrap_cards_color_container'];

        if ($data['wrapCards']) {
            $data['wrapperBackgroundColor'] = $this->getWrapperBackgroundColor($fields['container_background_color']);
        }

        /* $data['manualInputs']      = [];
        $data['ID']                = $this->ID;
        $data['columns']           = !empty($fields['columns']) ? $fields['columns'] . '@md' : 'o-grid-4@md';
        $data['context']           = ['module.manual-input.' . $this->template];
        $data['ratio']             = !empty($fields['ratio']) ? $fields['ratio'] : '4:3';
        $data['imagePosition']     = !empty($fields['image_position']) ? true : false;
        $imageSize                 = $this->getImageSize($displayAs);
        $data['freeTextFiltering'] = !empty($fields['free_text_filtering']) ? true : false;
        $data['lang']              = [
            'search' => __('Search', 'modularity'),
        ];

        $data['accordionColumnTitles'] = $this->createAccordionTitles(
            isset($fields['accordion_column_titles']) ? $fields['accordion_column_titles'] : [], 
            isset($fields['accordion_column_marking']) ? $fields['accordion_column_marking'] : ''
        );

        if (!empty($fields['manual_inputs']) && is_array($fields['manual_inputs'])) {
            foreach ($fields['manual_inputs'] as $index => &$input) {
                $input = array_filter($input, function($value) {
                    return !empty($value) || $value === false;
                });
                $arr                            = array_merge($this->getManualInputDefaultValues(), $input);
                $arr['isHighlighted']           = $this->canBeHighlighted($fields, $index);
                // TODO: change name and migrate
                $arr['icon']                    = $arr['box_icon'];
                $arr['image']                   = $this->maybeGetImageImageContract($displayAs, $arr['image']) ?? $this->getImageData($arr['image'], $imageSize);
                $arr['accordion_column_values'] = $this->createAccordionTitles($arr['accordion_column_values'], $arr['title']);
                $arr['view']                    = $this->getInputView($arr['isHighlighted']);
                $arr['columnSize']              = $this->getInputColumnSize($fields, $arr['isHighlighted']);
                $arr                            = \Municipio\Helper\FormatObject::camelCase($arr);
                $data['manualInputs'][]         = (array) $arr;
            }
        }

        //Check if any item has an image
        $data['anyItemHasImage'] = array_reduce($data['manualInputs'], function($carry, $item) {
            if (isset($item['image'])) {
                if (is_a($item['image'], ImageComponentContract::class)) {
                    return $carry || $item['image']->getUrl();
                }
                return $carry || !empty($item['image']);
            }
            return $carry;
        }, false); */

        return $data;
    }

    public function colorChoices($field) 
    {
        $colors = $this->getColorsFromPalettes();

        $field['choices'] = [];
        foreach ($colors as $name => $hex) {
            $field['choices'][$name] = '<span style="display:inline-block;height:30px;width:100%;;background-color:' . $hex . ';"></span>';
        }

        $field['choices']['custom-color'] = __('Custom color', 'modularity');

        return $field;
    }

    private function getWrapperBackgroundColor($color) {
        $colorMapper = [
            'color-palette-primary-base' => 'var(--color-primary)',
            'color-palette-primary-light' => 'var(--color-primary-light)',
            'color-palette-primary-dark' => 'var(--color-primary-dark)',
            'color-palette-secondary-base' => 'var(--color-secondary)',
            'color-palette-secondary-light' => 'var(--color-secondary-light)',
            'color-palette-secondary-dark' => 'var(--color-secondary-dark)',
            'color-background-background' => 'var(--color-background)',
            'color-background-complementary' => 'var(--color-background-complementary)',
        ];

        if ($color === 'custom-color') {
            $fields = $this->getFields();

            if (!isset($fields['container_background_color_custom'])) {
                return false;
            }

            return $fields['container_background_color_custom'];
        }
        
        if (!isset($colorMapper[$color])) {
            return false;
        }

        return $colorMapper[$color];
    }

    private function getColorsFromPalettes() 
    {
        $colorsToGet = [
            'base',
            'dark',
            'light',
            'background',
            'complementary',
        ];
        $hexesToIgnore = [
            '#ffffff',
        ];

        $colors = [];
        $rawColors = \Municipio\Helper\Color::getPalettes(self::$palettesToGet);

        foreach ($rawColors as $paletteName => $palette) {
            if (!is_array($palette)) {
                continue;
            }

            foreach ($palette as $color => $hex) {
                if (in_array($color, $colorsToGet) && !in_array(strtolower($hex), $hexesToIgnore)) {
                    $colors[str_replace('_', '-', $paletteName) . '-' . $color] = $hex;
                }
            }
        }

        return array_unique($colors);
    }

    private function prepareCards(array $cardData) 
    {
        $preparedData = [];

        if (!is_array($cardData)) {
            return $preparedData;
        }

        foreach ($cardData as $card) {
            $preparedData[] = [
                'heading' => $card['heading'],
                'content' => !empty($card['content']) ? $card['content'] : false,
                'image' => is_int($card['image']) ? $this->getImageContract($card['image']) : false,
                'link' => $card['link'],
                'columnClass' => $this->getColumnClass(),
            ];
        }

        return $preparedData;
    }

    private function getColumnClass() 
    {
        return 'o-grid-4@md';
    }

    private function getWrapperClass() 
    {
        $classes = [
            "{$this->baseClass}__wrapper",
            'u-padding__y--4@xs',
            'u-padding__y--4@sm',
            'u-padding__y--4@md',
            'u-padding__y--8@lg',
            'u-padding__y--8@xl',
        ];

        return implode(' ', $classes);
    }

    private function getImageContract(int $imageId) 
    {
        return ImageComponentContract::factory(
            $imageId,
            [600, false],
            new ImageResolver()
        );
    }

    /**
     * @return array Array with default values
     */
    private function getManualInputDefaultValues(): array
    {
        return [
            'title'                     => null,
            'content'                   => null,
            'link'                      => null,
            'link_text'                 => __("Read more", 'modularity'),
            'image'                     => null,
            'accordion_column_values'   => [],
            'box_icon'                  => null
        ];
    }

    /**
     * Returns the input column size based on the given fields.
     *
     * @param array $fields The array of fields.
     * @return string The input column size.
     */
    private function getInputColumnSize(array $fields): string
    {
        $columnSize = !empty($fields['columns']) ? $fields['columns'] : 'o-grid-4';
        
        return $columnSize . '@md';
    }

    /**
     * Get all data attached to the image.
     * 
     * @param array $fields All the acf fields
     * @param array|string $size Array containing height and width OR predefined size as a string.
     * @return array
     */
    private function getImageData($imageId = false, $size = [400, 225])
    {
        if (!empty($imageId)) {
            $image = ImageHelper::getImageAttachmentData($imageId, $size);

            if ($image) {
                $image['removeCaption'] = true;
            }

            unset($image['title']);
            unset($image['description']);

            return $image;
        }

        return false;
    }

    /**
     * Decides the size of the image based on view
     * 
     * @param string $displayAs The name of the template/view.
     * @return array
     */
    private function getImageSize($displayAs, $return = "both"): null|array|int {
        switch ($displayAs) {
            case "segment": 
                $dimensions =  [1920, 1080];
            case "block":
                $dimensions =  [1024, 1024];
            case "collection": 
            case "box":
                $dimensions =  [768, 768];
            default: 
                $dimensions = [1440, 810];
        }

        if($return == "width") {
            return $dimensions[0] ?? null;
        }

        if($return == "height") {
            return $dimensions[1] ?? null;
        }

        return $dimensions;
    }

    /**
     * Add full width setting to frontend.
     * @param [array] $viewData
     * @param [array] $block
     * @param [object] $module
     * @return array
     */
    public function blockData($viewData, $block, $module) {
        if (strpos($block['name'], "acf/manualinput") === 0 && $block['align'] == 'full' && !is_admin()) {
            $viewData['stretch'] = true;
        } else {
            $viewData['stretch'] = false;
        }
        return $viewData;
    }

    /**
     * Get the template file name for rendering.
     *
     * This function returns the name of the template file to use for rendering
     * based on the template property of the current object. If the specified
     * template file exists, it will be returned; otherwise, a default template
     * ('card.blade.php') will be used.
     *
     * @return string The template file name.
     */
    public function template() 
    {
        $path = __DIR__ . "/views/" . $this->template . ".blade.php";

        if (file_exists($path)) {
            return $this->template . ".blade.php";
        }
        
        return 'base.blade.php';
    }

    /**
     * Available "magic" methods for modules:
     * init()            What to do on initialization
     * data()            Use to send data to view (return array)
     * style()           Enqueue style only when module is used on page
     * script            Enqueue script only when module is used on page
     * adminEnqueue()    Enqueue scripts for the module edit/add page in admin
     * template()        Return the view template (blade) the module should use when displayed
     */
}
