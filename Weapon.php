<?php

class Weapon {

    private $attack;
    private $defence;
    private $dice_sides;

    /**
     * @return mixed
     */
    public function getDiceSides() {
        return $this->dice_sides;
    }

    /**
     * @param mixed $dice_sides
     */
    public function setDiceSides($dice_sides) {
        $this->dice_sides = $dice_sides;
    }

    /**
     * @return mixed
     */
    public function getAttack() {
        return $this->attack;
    }

    /**
     * @param mixed $attack
     */
    public function setAttack($attack) {
        $this->attack = $attack;
    }

    /**
     * @return mixed
     */
    public function getDefence() {
        return $this->defence;
    }

    /**
     * @param mixed $defence
     */
    public function setDefence($defence) {
        $this->defence = $defence;
    }

}

class LongSword extends Weapon {
    public function __construct() {
        $this->setAttack(2);
        $this->setDefence(1);
        $this->setDiceSides(6);
    }
}

class WoodenMace extends Weapon {
    public function __construct() {
        $this->setAttack(1);
        $this->setDefence(0);
        $this->setDiceSides(8);
    }
}

class BattleAxe extends Weapon {
    public function __construct() {
        $this->setAttack(3);
        $this->setDefence(0);
        $this->setDiceSides(10);
    }
}