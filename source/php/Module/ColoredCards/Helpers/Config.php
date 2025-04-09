<?php

namespace Modularity\Module\ColoredCards\Helpers;

use Modularity\Module\ColoredCards\Models\Config as Configuration;

class Config {
    public static function getConfig() : Configuration 
    {
        $themeMods = get_option('theme_mods_municipio');
        $config = new Configuration($themeMods);

        return $config;
    }
}