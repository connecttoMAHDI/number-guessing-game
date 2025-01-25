<?php

const N = "\r\n";

echo "Welcome to the Number Guessing Game!", N;
echo "I'm thinking of a number between 1 and 100.", N;
echo "You have x changes to guess the correct number.", N, N;

$randNum = rand(1, 100);
$attemps = 0;
$chances = 0;

echo "Please select the difficulty level:", N;
echo "1. Easy (10 chances)", N;
echo "2. Medium (5 chances)", N;
echo "3. Hard (3 chances)", N, N;

echo "Enter your choice: ";

do {
    $difficultyLvl = trim(fgets(STDIN));
    echo N;
    switch ($difficultyLvl) {
        case 1:
            $chances = 10;
            echo "Great! You have selected the Easy difficulty level." . N;
            echo "Let's start the game!", N, N;
            break;
        case 2:
            $chances = 5;
            echo "Great! You have selected the Medium difficulty level." . N;
            echo "Let's start the game!", N, N;
            break;
        case 3:
            $chances = 3;
            echo "Great! You have selected the Hard difficulty level." . N;
            echo "Let's start the game!", N, N;
            break;
        default:
            echo "Please select difficulty level.", N;
            echo "Enter your choice: ";
    }
} while (
    !in_array($difficultyLvl, [1, 2, 3])
);

do {
    echo "Enter your guess: ";
    $ans = trim(fgets(STDIN));

    $attemps++;
    if ($ans == $randNum) {
        echo "Congratulations! You guessed the correct number in $attemps attempts.", N;
        exit;
    } else if ($ans > $randNum) {
        echo "Incorrect! The number is less than $ans.", N;
    } else if ($ans < $randNum) {
        echo "Incorrect! The number is greater than $ans.", N;
    }
    $chances--;
    echo N;
} while (
    ($chances > 0) && ($ans !== $randNum)
);
echo "Oops! you run out of chance.", N;
echo "The number was $randNum";
exit;
