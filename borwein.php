<?php
include(__DIR__.'/colour_pi.php');

function borwein($precision){
	// set scale with suitable spare room
	bcscale($precision+5);

	//inital conditions
	$rootTwo = bcsqrt(2); 
	$a = bcsub(6, bcmul(4, $rootTwo));
	$y = bcsub($rootTwo, 1);

	//number of interations needed
	$count = 11;//floor(log($precision)/log(4));
	for($k = 0; $k < $count; $k++){
		$sqrt = bcsqrt(bcsub(1,bcpow($y, 4))); 
		$right = bcsqrt($sqrt); 
		$top = bcsub(1, $right);
		$bottom = bcadd(1, $right);
		$y = bcdiv($top, $bottom);
		
		$onePlusY = bcadd(1, $y); 
		$left = bcmul($a, bcpow($onePlusY, 4));
		$y2 = bcpow($y, 2);
		$power = bcpow(2, (2*$k+3));
		$expansion = bcadd($onePlusY, $y2);
		$right = bcmul($power, bcmul($y, $expansion));
		$a = bcsub($left, $right);
	}
return bcdiv(1, $a, $precision);
}
$pi = borwein(4037);
checkPi($pi);
