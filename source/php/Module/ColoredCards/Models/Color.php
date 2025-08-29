<?php

namespace Modularity\Module\ColoredCards\Models;

class Color {
    private string $name;

    private string $hexColor;

    public function __construct(string $name, string $hexColor) 
    {  
        $this->name = $name;
        $this->hexColor = $hexColor;
    }

    public function getName() : string 
    {
        return $this->name;
    }

    public function getHex() : string 
    {
        return $this->hexColor;
    }
}