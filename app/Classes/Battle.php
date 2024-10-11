<?php

namespace App\Classes;

class Battle {
    public static function simulate(Character $char1, Character $char2) {
        echo "Starting battle between {$char1->getName()} and {$char2->getName()}!\n";
        $round = 1;

        while ($char1->getHealth() > 0 && $char2->getHealth() > 0) {
            echo ">> Round {$round}:\n";
            $char1->attack($char2);

            if ($char2->getHealth() <= 0) {
                echo "{$char2->getName()} has been defeated!\n";
                break;
            }

            $char2->attack($char1);

            if ($char1->getHealth() <= 0) {
                echo "{$char1->getName()} has been defeated!\n";
                break;
            }

            $round++;
        }

        echo "========= End of Battle =========\n";
        echo "Winner: " . ($char1->getHealth() > 0 ? $char1->getName() : $char2->getName()) . "\n";
    }
}