<?php

require_once './high-score-tracker.php';
require_once './DifficultyLevels.php';
require_once './colorful_message.php';

const N = "\r\n";

$restart = false;

do {
    echo colorText("🎮 Welcome to the Number Guessing Game! 🎮", $cyan), N;
    echo "🤔 I'm thinking of a number between " . colorText("1 and 100", $yellow) . ".", N;
    echo "You have " . colorText("x chances", $yellow) . " to guess the correct number.", N, N;

    $randNum = rand(1, 100);
    $attemps = 0;
    $chances = 0;

    echo "🌟 Please select the difficulty level:", N;
    echo colorText("1. Easy (10 chances)", $green), N;
    echo colorText("2. Medium (5 chances)", $yellow), N;
    echo colorText("3. Hard (3 chances)", $red), N, N;

    echo "Enter your choice: ";

    do {
        $difficultyLvl = trim(fgets(STDIN));
        echo N;
        switch ($difficultyLvl) {
            case 1:
                $chances = 10;
                echo colorText("✅ Great! You have selected the Easy difficulty level.", $green), N;
                echo "🚀 Let's start the game!", N, N;
                break;
            case 2:
                $chances = 5;
                echo colorText("✅ Great! You have selected the Medium difficulty level.", $yellow), N;
                echo "🚀 Let's start the game!", N, N;
                break;
            case 3:
                $chances = 3;
                echo colorText("✅ Great! You have selected the Hard difficulty level.", $red), N;
                echo "🚀 Let's start the game!", N, N;
                break;
            default:
                echo colorText("⚠️ Please select a valid difficulty level.", $red), N;
                echo "Enter your choice: ";
        }
    } while (!in_array($difficultyLvl, [1, 2, 3]));

    do {
        echo "🔢 Enter your guess: ";
        $ans = trim(fgets(STDIN));
        if (!is_numeric($ans)) {
            echo colorText("⚠️ Please enter a valid number.", $red), N;
            continue;
        }

        $attemps++;

        if ((int)$ans === $randNum) {
            $difficulty = ($difficultyLvl == 1) ? DifficultyLevels::EASY : (($difficultyLvl == 2) ? DifficultyLevels::MEDIUM : DifficultyLevels::HARD);
            echo colorText("🎉 Congratulations! You guessed the correct number in $attemps attempts. 🎉", $green), N;
            
            // Check if it is a top score
            checkScore($attemps, $difficulty);
            exit;
        } else if ($ans > $randNum) {
            echo colorText("❌ Incorrect! The number is less than $ans.", $magenta), N;
        } else if ($ans < $randNum) {
            echo colorText("❌ Incorrect! The number is greater than $ans.", $blue), N;
        }

        $chances--;

        if ($attemps > 0 && $chances > 0) {
            echo "⏳ You have " . colorText("$chances chances remaining.", $yellow), N;
        }
        echo N;
    } while (($chances > 0) && ($ans !== $randNum));

    echo colorText("😔 Oops! You ran out of chances.", $red), N;
    echo "The correct number was " . colorText($randNum, $green) . ".", N, N;

    echo "🔁 Do you want to try again? [yes/no] ", N;
    $restart = false;
    $shouldRestart = trim(fgets(STDIN));
    if (strtolower($shouldRestart) === 'yes') $restart = true;
} while ($restart);

echo colorText("👋 Thanks for playing! Goodbye!", $cyan), N;

exit;
