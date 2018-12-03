<?php

/**
 * This code finds all ordered subsets of a set of numbers.
 *
 * @copyright  2018 Dominique Bauer (dominique.bauer@etsmtl.net)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/***************************************************/
//Define the set of numbers:
$studentAnswer = array(1,3,2,4);
/***************************************************/

function subSet($n) {
    $in = range(1,$n);
    $count = count($in);
    $members = pow(2,$count);
    $return = array();
    for ($i = 0; $i < $members; $i++) {
        $b = sprintf("%0".$count."b",$i);
        $out = array();
        for ($j = 0; $j < $count; $j++) {
            if ($b{$j} == '1') $out[] = $in[$j];
        }
        if (count($out) >= 2) {
            $return[] = $out;
        }
    }
    sort($return);
    return $return;
}

$noItems=count($studentAnswer);
$orderedSubset=array();

foreach(subSet($noItems) as $item) {
    foreach ($item as &$value) {
    $value=$value-1;
    }
    $firstItem=$item[0];
    $orderedSubset[0]=$studentAnswer[$firstItem];
    for ($i = 0; $i < count($item)-1; $i++ ) {
        $j=$i+1;
        $firstItem=$item[$i];
        $nextItem=$item[$j];
        $ordered=true;
        $nextItem=$item[$j];
        if ($studentAnswer[$firstItem]<$studentAnswer[$nextItem]) {
            $ordered=$ordered and true;
            $orderedSubset[]=$studentAnswer[$nextItem];
        } else {
            $ordered=$ordered && false;
        }
    }
    if ($ordered and count($orderedSubset)==count($item)) {echo implode(",",$orderedSubset)."\n";}
    unset($orderedSubset);
}
