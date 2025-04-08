<?php

namespace Modularity\Module\ColoredCards;

use Modularity\Module\ColoredCards\Helpers\Color as ColorHelper;
use Modularity\Module\ColoredCards\Helpers\Config as ConfigHelper;

use Modularity\Integrations\Component\ImageResolver;
use ComponentLibrary\Integrations\Image\Image as ImageComponentContract;

use Modularity\Module\ColoredCards\Models\Config;

class ColoredCards extends \Modularity\Module
{
    public $slug = 'coloredcards';
    public $supports = array();
    public $blockSupports = array(
        'align' => ['full']
    );

    private $baseClass;

    private Config $config;

    public function init()
    {
        $this->nameSingular = __("Colored Cards", 'modularity');
        $this->namePlural = __("Colored Cards", 'modularity');
        $this->description = __("Creates card with colored backgrounds from manual data.", 'modularity');

        $this->baseClass = $this->slug . '-' . $this->ID;

        $this->config = ConfigHelper::getConfig();

        add_filter('acf/load_field/key=field_67f00af58f0c6', array($this, 'colorChoices'));
        add_filter('acf/load_field/key=field_67f289dc6aa72', array($this, 'colorChoices'));
    }

    public function data(): array
    {
        $data           = [];
        $fields         = $this->getFields();

        $data['cards']  = $this->prepareCards($fields['cards']);

        $data['baseClass'] = $this->baseClass;
        $data['cardClass'] = 'colored-card';
        $data['columnClass'] = $this->getColumnClass();
        $data['wrapperClass'] = $this->getWrapperClass(); 

        $data['wrapCards'] = $fields['wrap_cards_color_container'];

        if ($data['wrapCards']) {
            $data['wrapperBackgroundColor'] = $this->getBackgroundColor($fields['container_background_color'], $fields, 'container_background_color_custom');
        }

        $data['cardStyles'] = $this->getCardStyles($data['cards']);

        return $data;
    }

    public function colorChoices($field) 
    {
        $colors = ColorHelper::getColorsFromMunicipioPalettes();

        $field['choices'] = [
            'none' => __('None', 'modularity'),
        ];

        if ($this->config->isCustomColorsAllowed()) {
            $field['choices']['custom-color'] = __('Custom color', 'modularity');
        }

        if (is_admin() && ($screen = get_current_screen()) && $screen->id === 'acf-field-group') {
            return $field;
        }

        foreach ($colors as $var => $hex) {
            $field['choices'][$var] = '
                <span style="display:inline-flex;gap:.5rem;align-items:center;margin-top:2px;margin-bottom:2px;">
                    <span style="border-radius:5px;display:inline-block;height:18px;width:100px;;background-color:' . $hex . ';"></span>
                    <span>' . ColorHelper::mapCssVarToColorName($var) . '</span>
                </span>
            ';
        }

        foreach ($this->config->getColors() as $color) {
            $field['choices'][$color->getHex()] = '
                <span style="display:inline-flex;gap:.5rem;align-items:center;margin-top:2px;margin-bottom:2px;">
                    <span style="border-radius:5px;display:inline-block;height:18px;width:100px;;background-color:' . $color->getHex() . ';"></span>
                    <span>' . $color->getName() . '</span>
                </span>
            ';
        }

        return $field;
    }

    private function getCardStyles($cardData) {
        $cardStyles = [];

        foreach ($cardData as $card) {
            if ($card['background']) {
                $cardStyles[$card['id']] = [
                    'background' => $card['background'],
                    'color' => ColorHelper::getBestContrastColor($card['background'])
                ];
            }
        }

        if (sizeof($cardStyles) === 0) {
            return false;
        }

        return $cardStyles;
    }
        
    /**
     * Get proper background color value for CSS
     *
     * @param  string Color value for field
     * @param  array Array of fields from where to search for custom color value
     * @param  string Name of field to get custom color value from within fields array
     * @return bool|string
     */
    private function getBackgroundColor(string $color, array $fields, string $customColorField = 'background_color_custom') : bool|string 
    {  
        // Get custom color from correct field in fields
        if ($color === 'custom-color') {
            if (!isset($fields[$customColorField])) {
                return false;
            }

            return $fields[$customColorField];
        }

        // If hex code
        if (preg_match('/^#[0-9a-fA-F]{6}$/', $color)) {
            return $color;
        }

        // If we have a CSS var, wrap it in proper CSS function
        if (strpos($color, '--') === 0) {
            return "var({$color})";
        }

        return false;
    }

    private function prepareCards(array $cardData) 
    {
        $preparedData = [];

        if (!is_array($cardData)) {
            return $preparedData;
        }

        foreach ($cardData as $card) {
            $preparedData[] = [
                'id' => uniqid(),
                'heading' => $card['heading'],
                'content' => !empty($card['content']) ? $card['content'] : false,
                'image' => is_int($card['image']) ? $this->getImageContract($card['image']) : false,
                'link' => $card['link'],
                'columnClass' => $this->getColumnClass(),
                'background' => $this->getBackgroundColor($card['background_color'], $card)
            ];
        }

        return $preparedData;
    }

    private function getColumnClass() 
    {
        $fields = $this->getFields();

        switch ($fields['cards_per_column']) {
            case 2:
                $class = 'o-grid-6@md';
                break;
            case 3: 
                $class = 'o-grid-4@md';
                break;
            case 4: 
                $class = 'o-grid-6@md o-grid-3@lg';
                break;
        }

        return $class;
    }

    private function getWrapperClass() 
    {
        $classes = [
            "{$this->baseClass}__wrapper",
            'u-padding__y--4@xs',
            'u-padding__y--4@sm',
            'u-padding__y--4@md',
            'u-padding__y--8@lg',
            'u-padding__y--12@xl',
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
