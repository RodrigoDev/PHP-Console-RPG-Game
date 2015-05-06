<?php
include "Weapon.php";
include "Dice.php";

class Hero {

    private $health_points;
    private $strength;
    private $agility;
    private $weapon;

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

    public function attack(Hero $target) {
        $damage = Dice::roll(20) +
            Dice::roll($this->getWeapon()->getDiceSides()) +
            $this->getStrength() +
            $this->getWeapon()->getAttack();
        echo get_class($this) . " attacks with " . $damage . " damage." . PHP_EOL;
        return $target->defend($damage);
    }

    public function defend($damage) {
        $defence =  Dice::roll(20) +
            $this->getAgility() +
            $this->getWeapon()->getDefence();

        echo get_class($this) . " defends with " . $defence . " defence." . PHP_EOL;
        if($damage > $defence) {
            $damage_dealt = $damage - $defence;
            $this->setHealthPoints($this->getHealthPoints() - ($damage_dealt));
            echo get_class($this) . ": " . $this->getHealthPoints() . " health points" . PHP_EOL;
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

    function __construct($weapon) {
        $this->setHealthPoints(12);
        $this->setStrength(1);
        $this->setAgility(2);
        $this->setWeapon($weapon);
    }
}

class Orc extends Hero {

    function __construct($weapon) {
        $this->setHealthPoints(20);
        $this->setStrength(2);
        $this->setAgility(0);
        $this->setWeapon($weapon);
    }
}

class Dwarf extends Hero {

    function __construct($weapon) {
        $this->setHealthPoints(15);
        $this->setStrength(2);
        $this->setAgility(-1);
        $this->setWeapon($weapon);
    }
}