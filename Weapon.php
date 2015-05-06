<?php

class Weapon {

    public $attack;
    public $defence;

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
    }
}

class WoodenMace extends Weapon {
    public function __construct() {
        $this->setAttack(1);
        $this->setDefence(0);
    }
}