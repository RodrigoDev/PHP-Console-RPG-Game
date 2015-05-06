<?php
include "Weapon.php";
include "Dice.php";

class Hero {

    public $health_points;
    public $strength;
    public $agility;
    public $weapon;
    public $dice_sides;

    /**
     * @return mixed
     */
    public function getHealthPoints() {
        return $this->health_points;
    }

    /**
     * @param mixed $health_points
     */
    public function setHealthPoints($health_points) {
        $this->health_points = $health_points;
    }

    /**
     * @return mixed
     */
    public function getStrength() {
        return $this->strength;
    }

    /**
     * @param mixed $strength
     */
    public function setStrength($strength) {
        $this->strength = $strength;
    }

    /**
     * @return mixed
     */
    public function getAgility() {
        return $this->agility;
    }

    /**
     * @param mixed $agility
     */
    public function setAgility($agility) {
        $this->agility = $agility;
    }

    /**
     * @return mixed
     */
    public function getWeapon() {
        return $this->weapon;
    }

    /**
     * @param mixed $weapon
     */
    public function setWeapon($weapon) {
        $this->weapon = $weapon;
    }

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

    public function attack(Hero $target) {
        $damage = Dice::roll(20) +
            Dice::roll($this->getDiceSides()) +
            $this->getStrength() +
            $this->getWeapon()->getAttack();

        return $target->defend($damage);
    }

    public function defend($damage) {
        $defence =  Dice::roll(20) +
            $this->getAgility() +
            $this->getWeapon()->getDefence();

        if($damage > $defence) {
            $damage_dealt = $damage - $defence;
            $this->setHealthPoints($this->getHealthPoints() - ($damage_dealt));
            if($this->getHealthPoints() < 1) {
                return false;
            }
        }

        return true;
    }

    public function initiative() {
        return $this->getAgility() + Dice::roll(20);
    }
}

class Human extends Hero {

    function __construct() {
        $this->setDiceSides(6);
        $this->setHealthPoints(12);
        $this->setStrength(1);
        $this->setAgility(2);
        $this->setWeapon(new LongSword());
    }
}

class Orc extends Hero {

    function __construct() {
        $this->setDiceSides(8);
        $this->setHealthPoints(20);
        $this->setStrength(2);
        $this->setAgility(0);
        $this->setWeapon(new WoodenMace());
    }
}