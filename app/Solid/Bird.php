<?php

namespace App\Solid;

/**
 * 4: Interface Segregation Principle (ISP) in PHP
 *
 * 인터페이스 분리 원칙
 * 인터페이스는 클래스에서 만드는 메소드를 강제하면 안된다.
 */
interface Bird
{
    public function speak();

    public function walk();

    // 펭귄에서 필요없는 메소드가 된다.
    // 없는 메소드를 펭귄에서 만들게 되면, 리턴값을 널을 주거나 예외처리하는 경우가 발생한다.
    // 개발자로서 인터페이스를 만들때 잘 생각해보자.
    public function fly();
}
