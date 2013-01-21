<?php
include(__DIR__.'/colour_pi.php');

function leibnizPi ($iterations, $places) {
        bcscale($places);
        $num = 0;
        for ($i =0; $i < $iterations; $i++) {
		$fourN = bcmul(4, $i);
		$fourNPlusOne = bcadd($fourN, 1);
		$fourNPlusThree = bcadd($fourN, 3);
                $term = bcdiv(2, bcmul($fourNPlusOne, $fourNPlusThree ));
                $num = bcadd($num, $term);
        }
        return bcmul(4, $num);
}

$pi = leibnizPi(500000, 100);
checkPi($pi);
