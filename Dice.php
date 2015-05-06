<?php

class Dice {

    public static function roll($faces) {
        return rand(1, $faces);
    }
}