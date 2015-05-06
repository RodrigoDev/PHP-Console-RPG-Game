<?php
require "./vendor/autoload.php";

include "Arena.php";
include "Hero.php";

$heros = array('Human', 'Orc', 'Dwarf');
$weapons = array('LongSword', 'WoodenMace', 'BattleAxe');

echo "Choose the first champion (Human, Orc or Dwarf): ";
$firstHero = Seld\CliPrompt\CliPrompt::prompt();

if(!in_array($firstHero, $heros)) {
    echo "Wrong hero name!";
    exit();
}

echo "Choose the first champion weapon (LongSword, WoodenMace or BattleAxe): ";
$firstHeroWeapon = Seld\CliPrompt\CliPrompt::prompt();

if(!in_array($firstHeroWeapon, $weapons)) {
    echo "Wrong weapon name!";
    exit();
}

echo "Choose the second champion (Human, Orc or Dwarf): ";
$secondHero = Seld\CliPrompt\CliPrompt::prompt();

if(!in_array($secondHero, $heros)) {
    echo "Wrong hero name!";
    exit();
}

echo "Choose the first champion weapon (LongSword, WoodenMace or BattleAxe): ";
$secondHeroWeapon = Seld\CliPrompt\CliPrompt::prompt();

if(!in_array($secondHeroWeapon, $weapons)) {
    echo "Wrong weapon name!";
    exit();
}

$hero1 = new $firstHero(new $firstHeroWeapon());
$hero2 = new $secondHero(new $secondHeroWeapon());

$arena = new Arena($hero1, $hero2);
$winner = $arena->fight();

echo get_class($winner) ." win!";
echo PHP_EOL;