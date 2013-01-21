<?php
include(__DIR__.'/colour_pi.php');

function bcpi($precision){
	bcscale($precision+6);
	$a = 0.5;
	$s = 5 * (pow(5, 0.5) - 2);
	$i = 0;
	$count = ceil(log($precision+6)/log(2))-1;
	while($i < $count){
		$x = bcsub(bcdiv(5, $s) , 1);
		$y = bcadd(bcpow(bcsub($x - 1), 2 ), 7);
		++$i;
	}

return bcadd($p,0,$precision);
}
$pi = bcpi(2037);
checkPi($pi);
