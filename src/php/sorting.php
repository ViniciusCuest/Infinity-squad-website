<?php
function mergeSort($array, $order = 'ASC') {

    if (count($array) <= 1)
        return $array;

    $middle = floor(count($array) / 2);
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right, $order);
}

function merge($left, $right, $order) {
    $result = [];
    $leftCount = count($left);
    $rightCount = count($right);
    $leftIndex = 0;
    $rightIndex = 0;

    while ($leftIndex < $leftCount && $rightIndex < $rightCount) {
        $comparison = $order === 'ASC' ? ($left[$leftIndex] <= $right[$rightIndex]) : ($left[$leftIndex] >= $right[$rightIndex]);

        if ($comparison) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        } else {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        }
    }

    while ($leftIndex < $leftCount) {
        $result[] = $left[$leftIndex];
        $leftIndex++;
    }

    while ($rightIndex < $rightCount) {
        $result[] = $right[$rightIndex];
        $rightIndex++;
    }

    return $result;
}
