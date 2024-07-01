<?php
function isPalindrome($str)
{
    $len = strlen($str);
    for ($i = 0; $i < $len / 2; $i++) {
        if ($str[$i] !== $str[$len - $i - 1]) {
            return false;
        }
    }
    return true;
}

// Function to find the highest palindrome by changing at most 'k' digits
function highestPalindrome($s, $k)
{
    $length = strlen($s);

    // Base case: if no more changes allowed or if the string is already a palindrome
    if ($k < 0) {
        return -1; // No valid palindrome found
    }

    // Convert string to array for mutable operations
    $s = str_split($s);

    $left = 0;
    $right = $length - 1;

    while ($left < $right) {
        if ($s[$left] !== $s[$right]) {
            // Replace with the maximum of the two characters
            $s[$left] = $s[$right] = max($s[$left], $s[$right]);
            $k--;
        }
        $left++;
        $right--;
    }

    // If k is still greater than or equal to 0 after all possible changes
    if ($k >= 0) {
        return implode('', $s);
    }

    return -1; // No valid palindrome found
}

// Example usage:
$s = "3943";
$k = 1;

echo "Input: s = $s, k = $k<br>";
$result = highestPalindrome($s, $k);
echo "Output: ";
var_dump($result);
echo "<br><br>";

$s = "932239";
$k = 2;

echo "Input: s = $s, k = $k<br>";
$result = highestPalindrome($s, $k);
echo "Output: ";
var_dump($result);
echo "<br><br>";
