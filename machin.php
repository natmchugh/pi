<?php
include(__DIR__.'/colour_pi.php');

function bcpi($precision){
	$num = 0;
	bcscale($precision+3);
	$limit = $precision;//floor($precision+3)/14;
	for ($n = 0; $n < $limit; $n++) {
		$twoNPlusOne = 2*$n+1;
		$c = bcpow(bcdiv(1, 239), $twoNPlusOne);
		$b = bcmul(4, bcpow(bcdiv(1, 5), $twoNPlusOne));
		$a = bcdiv(bcpow(-1, $n), $twoNPlusOne);
		$num = bcadd(bcmul($a, bcsub($b, $c)), $num);
	}
return bcmul(4,$num, $precision);
}

$pi = bcpi(200);
checkPi($pi);
