<?php
namespace Modularity\Module\ColoredCards\Helpers;
/**
 * Name That Color - PHP Class
 * 
 * Converted from the original JavaScript version by Chirag Mehta
 * Original: http://chir.ag/projects/ntc
 * 
 * This script is released under the Creative Commons License:
 * Attribution 2.5 http://creativecommons.org/licenses/by/2.5/
 * 
 * Sample Usage:
 * 
 * $match = NTC::name("#6195ED");
 * $rgb = $match[0]; // This is the RGB value of the closest matching color
 * $name = $match[1]; // This is the text string for the name of the match
 * $exactMatch = $match[2]; // True if exact color match, False if close-match
 */

class ColorName {
    /**
     * Path to the JSON file containing color data
     * 
     * @var string
     */
    private static $colorsJsonPath = __DIR__ . '/../assets/colors.json';
    
    /**
     * Cache for loaded color names
     * 
     * @var array|null
     */
    private static $names = null;


    /**
     * Get the name of a color from its hex value
     * 
     * @param string $color Hex color code
     * @return array [rgb, name, exactMatch]
     */
    /**
     * Load color names from JSON file
     *
     * @return array Color names array
     * @throws Exception If JSON file cannot be read or decoded
     */
    private static function loadColors() {
        if (self::$names === null) {
            $path = realpath(self::$colorsJsonPath);

            if (!file_exists($path)) {
                throw new \Exception('Colors JSON file not found: ' . $path);
            }
            
            $jsonContent = file_get_contents($path);
            if ($jsonContent === false) {
                throw new \Exception('Failed to read colors JSON file: ' . $path);
            }
            
            $colors = json_decode($jsonContent, true);
            if ($colors === null && json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Failed to parse colors JSON: ' . json_last_error_msg());
            }
            
            self::$names = $colors;
        }
        
        return self::$names;
    }
    
    /**
     * Get the name of a color from its hex value
     * 
     * @param string $color Hex color code
     * @return array [rgb, name, exactMatch]
     * @throws Exception If colors JSON file cannot be read or decoded
     */
    public static function getName($color) {
        $color = strtoupper($color);
        
        // Validate color format
        if (strlen($color) < 3 || strlen($color) > 7) {
            return ["#000000", "Invalid Color: " . $color, false];
        }
        
        // Normalize color format
        if (strlen($color) % 3 == 0) {
            $color = "#" . $color;
        }
        
        // Convert shorthand hex (#ABC) to full form (#AABBCC)
        if (strlen($color) == 4) {
            $color = "#" . $color[1] . $color[1] . $color[2] . $color[2] . $color[3] . $color[3];
        }

        $rgb = self::rgb($color);
        $r = $rgb[0];
        $g = $rgb[1];
        $b = $rgb[2];
        
        $hsl = self::hsl($color);
        $h = $hsl[0];
        $s = $hsl[1];
        $l = $hsl[2];
        
        $ndf1 = 0;
        $ndf2 = 0;
        $ndf = 0;
        $cl = -1;
        $df = -1;

        // Load colors from JSON file
        $colorNames = self::loadColors();
        
        // Find the closest color match
        foreach ($colorNames as $i => $colorData) {
            // Get the target color in proper format
            $targetColor = "#" . $colorData[0];
            
            // Check for exact match
            if ($color == $targetColor) {
                return [$targetColor, $colorData[1], true];
            }

            // Calculate RGB and HSL for the target color on the fly
            $targetRgb = self::rgb($targetColor);
            $targetHsl = self::hsl($targetColor);
            
            // Calculate color distance using RGB and HSL
            $ndf1 = pow($r - $targetRgb[0], 2) + pow($g - $targetRgb[1], 2) + pow($b - $targetRgb[2], 2);
            $ndf2 = pow($h - $targetHsl[0], 2) + pow($s - $targetHsl[1], 2) + pow($l - $targetHsl[2], 2);
            $ndf = $ndf1 + $ndf2 * 2;
            
            if ($df < 0 || $df > $ndf) {
                $df = $ndf;
                $cl = $i;
            }
        }

        return ($cl < 0) ? 
            ["#000000", "Invalid Color: " . $color, false] : 
            ["#" . $colorNames[$cl][0], $colorNames[$cl][1], false];
    }

    /**
     * Convert hex color to HSL
     * Adapted from Farbtastic 1.2 (http://acko.net/dev/farbtastic)
     * 
     * @param string $color Hex color code
     * @return array [h, s, l] values
     */
    private static function hsl($color) {
        $rgb = [
            hexdec(substr($color, 1, 2)) / 255,
            hexdec(substr($color, 3, 2)) / 255,
            hexdec(substr($color, 5, 2)) / 255
        ];
        
        $r = $rgb[0];
        $g = $rgb[1];
        $b = $rgb[2];
        
        $min = min($r, min($g, $b));
        $max = max($r, max($g, $b));
        $delta = $max - $min;
        $l = ($min + $max) / 2;

        $s = 0;
        if ($l > 0 && $l < 1) {
            $s = $delta / ($l < 0.5 ? (2 * $l) : (2 - 2 * $l));
        }

        $h = 0;
        if ($delta > 0) {
            if ($max == $r && $max != $g) $h += ($g - $b) / $delta;
            if ($max == $g && $max != $b) $h += (2 + ($b - $r) / $delta);
            if ($max == $b && $max != $r) $h += (4 + ($r - $g) / $delta);
            $h /= 6;
        }
        
        return [intval($h * 255), intval($s * 255), intval($l * 255)];
    }

    /**
     * Convert hex color to RGB
     * Adapted from Farbtastic 1.2 (http://acko.net/dev/farbtastic)
     * 
     * @param string $color Hex color code
     * @return array [r, g, b] values
     */
    private static function rgb($color) {
        return [
            hexdec(substr($color, 1, 2)),
            hexdec(substr($color, 3, 2)),
            hexdec(substr($color, 5, 2))
        ];
    }
}
