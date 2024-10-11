<?php

namespace App\Classes;

class Mage extends Character {

    public function attack(Character $opponent) {
        
        echo "{$this->name} casts a fireball!\n";
        
        $damage = $this->attackPower + rand(5, 15); 
        $opponent->receiveDamage($damage);

        echo "{$opponent->getName()} receives {$damage} damage. Health remaining: {$opponent->getHealth()}\n";
    }
}