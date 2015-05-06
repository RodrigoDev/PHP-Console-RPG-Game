<?php
require_once "../Dice.php";

class DiceTest extends PHPUnit_Framework_TestCase {

    public function testIfReturnsAnInteger() {
        $this->assertEquals(true, is_int(Dice::roll(6)));
    }
}
