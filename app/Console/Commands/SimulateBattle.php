<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Classes\Warrior;
use App\Classes\Mage;
use App\Classes\Battle;

class SimulateBattle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:simulate-battle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $warrior = new Warrior('Aragorn', 100, 25);
        $mage = new Mage('Gandalf', 100, 20);

        Battle::simulate($warrior, $mage);

        return 0;
    }
}
