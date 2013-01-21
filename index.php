<?php

function bcfact($n){
	$answer = 1;
	for ($i = $n; $i > 1; $i--) {
		$answer = bcadd($answer, bcmul($answer,$i-1));
	}
	return $answer;
}
function bcpi($precision){
	$num = 0;$k = 0;
	bcscale($precision+3);
$limit = ($precision+3)/14;
while($k < $limit){
	$num = bcadd($num, bcdiv(
	bcmul(bcadd('13591409',bcmul('545140134', $k)),bcmul(bcpow(-1, $k), bcfact(6*$k))),
	// divide
	bcmul(bcmul(bcpow('640320',3*$k+1),bcsqrt('640320')), bcmul(bcfact(3*$k), bcpow(bcfact($k),3)))));
	var_dump(bcfact(3*$k));
	++$k;
}
return bcdiv(1,(bcmul(12,($num))),$precision);
}

function gmp_pi($terms){
	$num = gmp_init(0);
	$sqrtConstant = gmp_sqrt('640320');
for ($i = 0; $i < $terms; $i++) {
	$k = gmp_init($i);
	$minusOnetoK = gmp_pow('-1', $i);
	$sixKFactorial = gmp_fact(6 * $i);
	$sum = gmp_add('13591409',gmp_mul('545140134', $k));
	$top = gmp_mul($sum ,gmp_mul($minusOnetoK, $sixKFactorial));
	$bottom = gmp_mul(gmp_mul(gmp_pow('640320',3*$i+1), $sqrtConstant), gmp_mul(gmp_fact(3*$i), gmp_pow(gmp_fact($k),3)));
var_dump(gmp_strval($bottom));
	$num = gmp_add($num, gmp_div($top,$bottom));
}
	$inverse = gmp_mul('12',$num);
return gmp_strval(gmp_div('1',$inverse));
}
echo bcpi(1);
echo gmp_pi(1), PHP_EOL;