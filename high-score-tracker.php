<?php

require_once './DifficultyLevels.php';
require_once './colorful_message.php';

define('SCORES_FILE_PATH', './high-scores.json');
define('N', "\r\n");

function checkScore($attempts, $difficulty)
{
    global $green, $yellow, $red, $cyan;

    // Load existing scores
    $scores = file_exists(SCORES_FILE_PATH) ? json_decode(file_get_contents(SCORES_FILE_PATH), true) : [];

    // Initialize the difficulty array if not present
    $scores[$difficulty] = $scores[$difficulty] ?? [];

    // Sort scores by attempts (ascending)
    usort($scores[$difficulty], fn($a, $b) => $a['attempts'] <=> $b['attempts']);
    $topScore = $scores[$difficulty][0]['attempts'] ?? PHP_INT_MAX;

    // If it is a top score
    if ($attempts < $topScore) {
        echo colorText("🎉 Wohoo! A new top score for the $difficulty level! 🎉", $green), N;
        echo colorText("💾 Would you like to save it? (yes/no): ", $cyan);

        // Ask the player if they want to save the record
        $shouldSave = trim(fgets(STDIN));
        if (strtolower($shouldSave) === 'yes') {
            // Get the player's name
            echo colorText("🏷️ Enter your name (or leave it blank for Anonymous): ", $yellow), N;
            $playerName = trim(fgets(STDIN)) ?: "Anonymous";

            // Determine the number of chances
            $chancesCount = match ($difficulty) {
                DifficultyLevels::EASY => 10,
                DifficultyLevels::MEDIUM => 5,
                DifficultyLevels::HARD => 3,
                default => throw new InvalidArgumentException('Invalid difficulty level'),
            };

            // Add the new record
            $scores[$difficulty][] = [
                "player" => $playerName,
                "total_chances" => $chancesCount,
                "attempts" => $attempts,
                "date" => date('Y-m-d H:i:s')
            ];

            // Save updated scores to the file
            file_put_contents(SCORES_FILE_PATH, json_encode($scores, JSON_PRETTY_PRINT));

            echo colorText("✅ Your score has been saved! 🏆", $green), N;
        } else {
            global $blue;
            echo colorText("👍 Okay Boss! Go for another top score! 💪", $blue), N;
        }
    }
}
