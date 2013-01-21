<?php
include(__DIR__.'/colour_pi.php');

function leibnizPi ($iterations, $places) {
	bcscale($places);
	$num = 0;
	for ($i =0; $i < $iterations; $i++) {
		$term = bcdiv(1, bcadd(1, bcmul(2, $i) ));
		if ($i % 2 == 0) {
		$num = bcadd($num, $term);
		} else {
		$num = bcsub($num, $term);
		}
	}
	return bcmul(4, $num);
}

$pi = leibnizPi(1000000, 10);
checkPi($pi);
