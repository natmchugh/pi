<?php

require(__DIR__.'/factorial.php');
include(__DIR__.'/colour_pi.php');

function bcpi($precision){
	$fact = new Factiorial();
	$sum = '0';
	bcscale($precision+5);
	$limit = floor($precision+5)/8;
	for ($n = 0; $n < $limit; $n++){
		$a = $fact->calculate(bcmul(4, $n));
		$b = bcadd(1103, bcmul(26390, $n));
		$c = bcmul(bcpow($fact->calculate($n), 4), bcpow(396,bcmul(4, $n)));
		$sum = bcadd(bcdiv(bcmul($a, $b), $c), $sum);
	}
	return bcdiv(1, bcmul(bcdiv(bcmul(2, bcsqrt(2)), 9801), $sum), $precision);
}

$pi = bcpi(2037);
checkPi($pi);