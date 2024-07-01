<?php
function getCharWeight($char)
{
    return ord($char) - ord('a') + 1;
}

function getWeights($string)
{
    $weights = [];
    $length = strlen($string);

    for ($i = 0; $i < $length; $i++) {
        $char = $string[$i];
        $weight = getCharWeight($char);

        // Menghitung total weight untuk substring yang sama
        $currentWeight = $weight;
        for ($j = $i + 1; $j < $length && $string[$j] == $char; $j++) {
            $currentWeight += $weight;
        }

        // Menambahkan weight ke dalam array jika belum ada
        if (!in_array($currentWeight, $weights)) {
            $weights[] = $currentWeight;
        }
    }

    return $weights;
}

function weightedStrings($string, $queries)
{
    $weights = getWeights($string);
    $result = [];

    foreach ($queries as $query) {
        $result[] = in_array($query, $weights) ? 'Yes' : 'No';
    }

    return $result;
}

// Contoh penggunaan:
$string = "abbcccd";
$queries = [1, 3, 9, 8];
$result = weightedStrings($string, $queries);

echo "String: $string<br>";
echo "Queries: ";
echo "<pre>";
print_r($queries);
echo "</pre>";
echo "Result: ";
echo "<pre>";
print_r($result);
echo "</pre>";
