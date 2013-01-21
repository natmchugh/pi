<?php

require(__DIR__ . '/factorial.php');
include(__DIR__.'/colour_pi.php');


function bcpi($precision) {
	$fact = new Factiorial();
	$num = 0;
	bcscale($precision + 3);
	$limit = ($precision + 3) / 20;
	$a = bcadd(1657145277365, bcmul(bcsqrt(61), 212175710912));
	$b = bcadd(107578229802750, bcmul(bcsqrt(61), 13773980892672));
	$c = bcpow(bcmul(5280, bcadd(236674, bcmul(bcsqrt(61), 30303))), 3);
	for ($n = 0; $n < $limit; $n++) {
		$sixNFact = $fact->calculate($n * 6);
		$threeNfact = $fact->calculate($n * 3);
		$nFactCubed = bcpow($fact->calculate($n), 3);
		$minusOnePowerN = pow(-1, $n);
		$aPlusNB = bcadd($a, bcmul($n, $b));
		
		$cToHalf = bcsqrt($c);
		$cToN = bcpow($c, $n);

		$top = bcmul($minusOnePowerN, bcmul($sixNFact, $aPlusNB));
		$bottom = bcmul($nFactCubed, bcmul($threeNfact, bcmul($cToN, $cToHalf)));
		$num = bcadd($num, bcdiv($top, $bottom));
	}
	return bcdiv(1, (bcmul(12, ($num))), $precision);
}
$pi = bcpi(2037);
checkPi($pi);
