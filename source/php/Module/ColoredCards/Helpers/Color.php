<?php

namespace Modularity\Module\ColoredCards\Helpers;

class Color {
    private static $palettesToGet = [
        'color_palette_primary',
        'color_palette_secondary',
        'color_background',
    ];

    private static $colorMap = [
        'color-palette-primary-base' => '--color-primary',
        'color-palette-primary-light' => '--color-primary-light',
        'color-palette-primary-dark' => '--color-primary-dark',
        'color-palette-secondary-base' => '--color-secondary',
        'color-palette-secondary-light' => '--color-secondary-light',
        'color-palette-secondary-dark' => '--color-secondary-dark',
        'color-background-background' => '--color-background',
        'color-background-complementary' => '--color-background-complementary',
    ];

    private static $colorNames;

    public static function getColorNames()
    {
        if (!isset(self::$colorNames)) {
            self::$colorNames = [
                'color-palette-primary-base' => __('Primary color', 'modularity'),
                'color-palette-primary-light' => __('Primary color light', 'modularity'),
                'color-palette-primary-dark' => __('Primary color dark', 'modularity'),
                'color-palette-secondary-base' => __('Secondary color', 'modularity'),
                'color-palette-secondary-light' => __('Secondary color light', 'modularity'),
                'color-palette-secondary-dark' => __('Secondary color dark', 'modularity'),
                'color-background-background' => __('Background color', 'modularity'),
                'color-background-complementary' => __('Background color complementary', 'modularity'),
            ];
        }

        return self::$colorNames;
    }

    public static function mapPaletteColorToCssVar($paletteColorName) 
    {
        if (!isset(self::$colorMap[$paletteColorName])) {
            return false;
        }

        return self::$colorMap[$paletteColorName];
    }

    public static function mapCssVarToColorName($cssVar) 
    {
        if (preg_match('/var\(\s*(--[^)]+)\s*\)/', $cssVar, $matches)) {
            $cssVar = $matches[1];
        }

        $colorNames = self::getColorNames();
        $colorId = array_flip(self::$colorMap)[$cssVar];

        if (!isset($colorNames[$colorId])) {
            return false;
        }

        return $colorNames[$colorId];
    }

    public static function mapCssVarToHexColor($cssVar) 
    {
        if (preg_match('/var\(\s*(--[^)]+)\s*\)/', $cssVar, $matches)) {
            $cssVar = $matches[1];
        }

        $paletteColors = self::getColorsFromMunicipioPalettes();

        return $paletteColors[$cssVar];
    }

    public static function getBestContrastColor(string $backgroundColor, bool $returnAnyColor = false): string
    {
        if (strpos($backgroundColor, 'var(') === 0) {
            $backgroundColor = self::mapCssVarToHexColor($backgroundColor);
        }

        [$r, $g, $b] = self::hexToRgb($backgroundColor);
        $bgLuminance = self::getRelativeLuminance($r, $g, $b);

        $whiteContrast = self::getContrastRatio($bgLuminance, self::getRelativeLuminance(255, 255, 255));
        $blackContrast = self::getContrastRatio($bgLuminance, self::getRelativeLuminance(0, 0, 0));

        if (!$returnAnyColor) {
            return $whiteContrast >= $blackContrast ? 'white' : 'black';
        }

        [$h, $s, $l] = self::rgbToHsl($r, $g, $b);
        $l = $l < 0.5 ? 0.95 : 0.05;
        [$rNew, $gNew, $bNew] = self::hslToRgb($h, $s, $l);

        return sprintf("#%02x%02x%02x", $rNew, $gNew, $bNew);
    }

    public static function getColorsFromMunicipioPalettes() 
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
                $paletteColorName = str_replace('_', '-', $paletteName) . '-' . $color;
                $colorVarName = self::mapPaletteColorToCssVar($paletteColorName);

                if ($colorVarName && in_array($color, $colorsToGet) && !in_array(strtolower($hex), $hexesToIgnore)) {
                    $colors[$colorVarName] = $hex;
                }
            }
        }

        return array_unique($colors);
    }

    private static function getContrastRatio(float $lum1, float $lum2): float
    {
        return ($lum1 > $lum2)
            ? ($lum1 + 0.05) / ($lum2 + 0.05)
            : ($lum2 + 0.05) / ($lum1 + 0.05);
    }

    private static function getRelativeLuminance(int $r, int $g, int $b): float
    {
        [$r, $g, $b] = array_map(function ($c) {
            $c = $c / 255;
            return $c <= 0.03928 ? $c / 12.92 : pow(($c + 0.055) / 1.055, 2.4);
        }, [$r, $g, $b]);

        return 0.2126 * $r + 0.7152 * $g + 0.0722 * $b;
    }

    private static function hexToRgb(string $hex): array
    {
        $hex = ltrim($hex, '#');
        if (strlen($hex) === 3) {
            $hex = $hex[0] . $hex[0]
                 . $hex[1] . $hex[1]
                 . $hex[2] . $hex[2];
        }

        return [
            hexdec(substr($hex, 0, 2)),
            hexdec(substr($hex, 2, 2)),
            hexdec(substr($hex, 4, 2)),
        ];
    }

    private static function rgbToHsl(int $r, int $g, int $b): array
    {
        $r /= 255;
        $g /= 255;
        $b /= 255;

        $max = max($r, $g, $b);
        $min = min($r, $g, $b);
        $h = $s = $l = ($max + $min) / 2;

        if ($max !== $min) {
            $d = $max - $min;
            $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);

            switch ($max) {
                case $r:
                    $h = ($g - $b) / $d + ($g < $b ? 6 : 0);
                    break;
                case $g:
                    $h = ($b - $r) / $d + 2;
                    break;
                case $b:
                    $h = ($r - $g) / $d + 4;
                    break;
            }

            $h /= 6;
        } else {
            $h = $s = 0;
        }

        return [$h, $s, $l];
    }

    private static function hslToRgb(float $h, float $s, float $l): array
    {
        if ($s == 0) {
            $val = round($l * 255);
            return [$val, $val, $val];
        }

        $q = $l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s;
        $p = 2 * $l - $q;

        return [
            round(self::hue2rgb($p, $q, $h + 1/3) * 255),
            round(self::hue2rgb($p, $q, $h) * 255),
            round(self::hue2rgb($p, $q, $h - 1/3) * 255)
        ];
    }

    private static function hue2rgb(float $p, float $q, float $t): float
    {
        if ($t < 0) $t += 1;
        if ($t > 1) $t -= 1;
        if ($t < 1/6) return $p + ($q - $p) * 6 * $t;
        if ($t < 1/2) return $q;
        if ($t < 2/3) return $p + ($q - $p) * (2/3 - $t) * 6;
        return $p;
    }
}