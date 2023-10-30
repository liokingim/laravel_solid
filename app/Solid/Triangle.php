<?php

namespace App\Solid;

class Triangle implements ShapeInterface
{
    public $base;
    public $height;

    public function __construct($base, $height)
    {
        $this->base = $base;
        $this->height = $height;
    }

    public function area()
    {
        return ($this->base * $this->height) / 2;
    }
}
