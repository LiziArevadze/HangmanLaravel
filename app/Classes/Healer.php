<?php

namespace App\Classes;

use App\Traits\MagicTrait;

class Healer extends Character
{
    use MagicTrait;

    public function attack(Character $opponent)
    {
        echo "{$this->name} uses healing magic instead of attacking!\n";
        $healAmount = rand(10, 20);
        $this->health += $healAmount;
        echo "{$this->name} heals for {$healAmount} points. Health is now {$this->health}\n";
    }
}