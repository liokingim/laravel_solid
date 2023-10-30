<?php

namespace App\Solid;

/**
 * 4: Interface Segregation Principle (ISP) in PHP
 *
 * 인터페이스 분리 원칙
 * 3개의 메소드가 가능하다.
 */
class Duck implements Speakable, Walkable, Flyable
{
    public function speak()
    {
        return 'start speaking';
    }

    public function walk()
    {
        return 'start walking';
    }

    public function fly()
    {
        return 'start flying';
    }
}