<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PlayHangman extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play:hangman';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Play Hangman';
    protected $logFile = 'hangman.log';

    public function handle()
    {
        do {
            $this->info("Player 1: Enter the main word");
            $mainWord = trim($this->secret('Main Word'));
            $guessedWord = str_repeat('_', strlen($mainWord));
            $attempts = 6;
            $usedLetters = [];

            File::append(storage_path('logs/' . $this->logFile), "Player 1's main word: $mainWord\n");

            while ($attempts > 0 && $guessedWord !== $mainWord) {
                $this->info("Word: $guessedWord");
                $this->info("Attempts left: $attempts");
                $letter = trim($this->ask('Player 2: Guess a letter'));

                if (in_array($letter, $usedLetters)) {
                    $this->info("You already guessed that letter. Try another.");
                    continue;
                }

                $usedLetters[] = $letter;

                File::append(storage_path('logs/' . $this->logFile), "Player 2 guessed: $letter\n");

                if (strpos($mainWord, $letter) !== false) {
                    $this->info("Good guess!");

                    for ($i = 0; $i < strlen($mainWord); $i++) {
                        if ($mainWord[$i] == $letter) {
                            $guessedWord[$i] = $letter;
                        }
                    }
                } else {
                    $this->info("Wrong guess.");
                    $attempts--;
                }
            }

            if ($guessedWord === $mainWord) {
                $this->info("Congratulations! You've guessed the word: $mainWord");
                File::append(storage_path('logs/' . $this->logFile), "Result: Player 2 won. The word was: $mainWord\n");
            } else {
                $this->info("Game over! The word was: $mainWord");
                File::append(storage_path('logs/' . $this->logFile), "Result: Player 2 lost. The word was: $mainWord\n");
            }

            $logData = "Word: $mainWord, Guessed letters: " . implode(', ', $usedLetters) . ", Result: " . ($guessedWord === $mainWord ? 'Won' : 'Lost') . "\n";
            File::append(storage_path('logs/' . $this->logFile), $logData);

            $restart = $this->ask('Do you want to restart the game? (yes/no)');

        } while (strtolower($restart) === 'yes');

        $this->info('Thanks for playing!');
    }
}
