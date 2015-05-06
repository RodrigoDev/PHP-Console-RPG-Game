<?php

include "Arena.php";
include "Hero.php";

$human = new Human();
$orc   = new Orc();

$arena = new Arena($human, $orc);
$winner = $arena->fight();

echo get_class($winner) ." win!";