<?php

namespace App\Traits;

trait MagicTrait {
    public function castSpell() {
        echo "{$this->name} casts a powerful spell!\n";
    }
}