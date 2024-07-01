<?php

function isBalanced($str)
{
    $stack = [];
    $map = [')' => '(', ']' => '[', '}' => '{'];

    foreach (str_split($str) as $char) {
        if (!isset($map[$char])) {
            continue; // Skip non-bracket characters
        }

        if (in_array($char, ['(', '[', '{'])) {
            array_push($stack, $char);
        } elseif (empty($stack) || array_pop($stack) !== $map[$char]) {
            return "NO";
        }
    }

    return empty($stack) ? "YES" : "NO";
}

// Test cases
$testCases = [
    "{ [ ( ) ] }",
    "{ [ ( ] ) }",
    "{ ( ( [ ] ) [ ] ) [ ] }"
];

foreach ($testCases as $test) {
    echo "Input: $test\n";
    $result = isBalanced($test);
    echo "Output: $result\n";
    var_dump($result);
    echo "\n";
}
