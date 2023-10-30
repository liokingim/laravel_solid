<?php

namespace App\Solid;

/**
 * 4: Interface Segregation Principle (ISP) in PHP
 *
 * 인터페이스 분리 원칙
 * 두개의 인터페이스만 필요하다.
 */
class Penguin implements Speakable, Walkable
{
    public function speak()
    {
        return 'start speaking';
    }

    public function walk()
    {
        return 'start walking';
    }
}