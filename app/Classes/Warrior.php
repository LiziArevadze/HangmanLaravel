<?php

namespace App\Classes;

class Warrior extends Character {

    public function attack(Character $opponent) {

        echo "{$this->name} attacks with a sword!\n";
        $damage = $this->attackPower;
        $opponent->receiveDamage($damage);

        echo "{$opponent->getName()} receives {$damage} damage. Health remaining: {$opponent->getHealth()}\n";
    }
}