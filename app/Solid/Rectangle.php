<?php

namespace App\Solid;

/**
 * ShapeInterface를 추가
 */
class Rectangle implements ShapeInterface
{
    public $width;
    public $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    // 메소드 구현이 필수이기 때문에 인터페이스를 만든다.
    public function area()
    {
        return $this->width * $this->height;
    }
}
