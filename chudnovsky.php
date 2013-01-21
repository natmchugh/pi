<?php
require(__DIR__.'/factorial.php');
include(__DIR__.'/colour_pi.php');

function bcpi($precision){
	$fact = new Factiorial();
	$num = 0;
	bcscale($precision+3);
	$sqrtConst = bcsqrt('640320');
	$limit = floor($precision+3)/14;
for ($k =0; $k < $limit; $k++){
	$num = bcadd($num, bcdiv(
	bcmul(bcadd('13591409',bcmul('545140134', $k)),bcmul(bcpow(-1, $k), $fact->calculate(6*$k))),
	// divide
	bcmul(bcmul(bcpow('640320',3*$k+1),$sqrtConst), bcmul($fact->calculate(3*$k), bcpow($fact->calculate($k),3)))));
}
return bcdiv(1,(bcmul(12,($num))),$precision);
}

$pi = bcpi(2037);
checkPi($pi);
