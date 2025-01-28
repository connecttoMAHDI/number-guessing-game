<?php

// Function to colorize text
function colorText($text, $colorCode)
{
    return "\033[" . $colorCode . "m" . $text . "\033[0m";
}

// Define color codes
$red = "31";
$green = "32";
$yellow = "33";
$blue = "34";
$magenta = "35";
$cyan = "36";
