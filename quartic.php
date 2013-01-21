<?php
include(__DIR__.'/colour_pi.php');

function bcpi($precision){
	bcscale($precision+6);
	$a = bcsqrt(2);
	$b = 0;
	$p = bcadd(2, $a);
	$i = 0;
	$count = ceil(log($precision+6)/log(2))-1;
	while($i < $count){
		$sqrt_a = bcsqrt($a);
		$a1 = $a;
		$a = bcdiv(bcadd($sqrt_a,bcdiv(1,$sqrt_a)),2);
		$b_up = bcmul($sqrt_a,bcadd(1,$b));
		$b_down = bcadd($a1,$b);
		$b = bcdiv($b_up, $b_down);
		$p_up = bcmul(bcmul($p,$b),bcadd(1,$a));
		$p_down = bcadd(1, $b);
		$p = bcdiv($p_up, $p_down);
		++$i;
	}
 
return bcadd($p,0,$precision);
}
$pi = bcpi(2037);
checkPi($pi);