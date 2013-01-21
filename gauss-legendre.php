<?php
include(__DIR__.'/colour_pi.php');

function bcpi($precision){
	$limit = ceil(log($precision)/log(2))-1;
	bcscale($precision+6);
	$a = 1;
	$b = bcdiv(1,bcsqrt(2));
	$t = 1/4;
	$p = 1;
	for($n = 0; $n < $limit; $n++){
		$x = bcdiv(bcadd($a,$b),2);
		$y = bcsqrt(bcmul($a, $b));
		$t = bcsub($t, bcmul($p,bcpow(bcsub($a,$x),2)));
		$a = $x;
		$b = $y;
		$p = bcmul(2,$p);
	}
	return bcdiv(bcpow(bcadd($a, $b),2),bcmul(4,$t),$precision);
}
$pi = bcpi(2037);
checkPi($pi);
