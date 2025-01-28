# Number Guessing Game

Welcome to the **Number Guessing Game**! This is a fun CLI-based game where you try to guess a randomly generated number within a specific number of chances, depending on the difficulty level you choose.

---

## Features

- 🎮 **Three Difficulty Levels:**
  - Easy: 10 chances
  - Medium: 5 chances
  - Hard: 3 chances
- 🌈 **Colorful Messages** for better gameplay experience.
- 🏆 **High Score Tracking:**
  - Save your scores and compete for the top spot.
  - Reset high scores if needed.
- 🔁 Option to restart the game easily if you lost the game. 

---

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/connecttoMAHDI/number-guessing-game.git
   ```
2. Navigate to the project directory:
   ```bash
   cd number-guessing-game
   ```

---

## How to Play

Run the game using the following command:

```bash
php number_guessing.php
```

### Gameplay

1. The program will ask you to select a difficulty level:
   - Easy (10 chances)
   - Medium (5 chances)
   - Hard (3 chances)
2. Try to guess the randomly generated number between 1 and 100.
3. Receive feedback on whether your guess is too high or too low.
4. Guess the correct number before running out of chances to win!

---

## Commands

### Help

To see available commands:

```bash
php number_guessing.php --help
```

### Reset High Scores

To reset the high scores:

```bash
php number_guessing.php scores:clear
```

This will delete the `high-scores.json` file and reset all scores.

---

## High Scores

- The program keeps track of your best attempts for each difficulty level.
- If you achieve a new top score, you'll have the option to save your name along with your score.
- High scores are stored in a file called `high-scores.json`.

---

## Files

### Main Game

- **`number_guessing.php`**: The main entry point for the game.

### Core Modules

- **`high-score-tracker.php`**: Handles high score tracking and saving.
- **`DifficultyLevels.php`**: Contains constants for difficulty levels (Easy, Medium, Hard).
- **`colorful_message.php`**: Adds colorful output to the CLI.

---

## Example Gameplay

```bash
🎮 Welcome to the Number Guessing Game! 🎮
🤔 I'm thinking of a number between 1 and 100.
You have x chances to guess the correct number.

🌟 Please select the difficulty level:
1. Easy (10 chances)
2. Medium (5 chances)
3. Hard (3 chances)

Enter your choice: 2
✅ Great! You have selected the Medium difficulty level.
🚀 Let's start the game!

🔢 Enter your guess: 50
❌ Incorrect! The number is greater than 50.
⏳ You have 4 chances remaining.

🔢 Enter your guess: 75
🎉 Congratulations! You guessed the correct number in 2 attempts. 🎉

🎉 Wohoo! A new top score for the Medium level! 🎉
💾 Would you like to save it? (yes/no): yes
🏷️ Enter your name (or leave it blank for Anonymous): Mahdi
✅ Your score has been saved! 🏆
```

---

## Acknowledgments

Inspired by the [Number Guessing Game Challenge](https://roadmap.sh/projects/number-guessing-game) from the [roadmap.sh](https://roadmap.sh/).

