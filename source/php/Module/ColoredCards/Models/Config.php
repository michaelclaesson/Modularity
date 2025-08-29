<?php

namespace Modularity\Module\ColoredCards\Models;

use Modularity\Module\ColoredCards\Helpers\ColorName;

class Config {
    private bool $customColorsAllowed = false;

    /** @var Color[] */
    private array $colorPalette = [];

    public function __construct($data)
    {
        if (isset($data['colored_cards_allow_custom_colors']) && is_bool($data['colored_cards_allow_custom_colors'])) {
            $this->customColorsAllowed = $data['colored_cards_allow_custom_colors'];
        }

        if (isset($data['colored_cards_colors']) && is_array($data['colored_cards_colors'])) {
            $this->colorPalette = $this->parseColors($data['colored_cards_colors']);
        }
    }
    
    /**
     * Get whether or not custom colors is allowed in module
     *
     * @return bool
     */
    public function isCustomColorsAllowed() : bool 
    {
        return $this->customColorsAllowed;
    }
    
    /**
     * Get colors from custom palette
     *
     * @return Color[]
     */
    public function getColors() : array 
    {
        return $this->colorPalette;
    }
    
    /* 
     * @param  mixed $colorData
     * @return Color[]
     */
    private function parseColors($colorData) : array {
        $colors = [];

        foreach ($colorData as $item) {
            if (isset($item['color']) && preg_match('/^#[0-9a-fA-F]{6}$/', $item['color'])) {
                $colorInfo = ColorName::getName($item['color']);
                $colors[] = new Color($colorInfo[1], $item['color']);
            }
        }

        return $colors;
    }
}