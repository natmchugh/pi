<?php


//multiply a 2 x 2
function multiply ($A, $B) {
	$C = array(
		'a' => $A['a'] * $B['a'] + $A['b'] * $B['c'],
		'b' => $A['a'] * $B['b'] + $A['b'] * $B['d'],
		'c' => $A['c'] * $B['a'] + $A['d'] * $B['c'],
		'd' => $A['c'] * $B['b'] + $A['d'] * $B['d'],
	);
	
	return $C;
	
}

function invertMatrix($A) {
$deterimant = 1 / ($A['a'] * $A['d'] - $A['b'] * $A['c']);
$repositioned = array('a' => $A['d'], 'b' => -1 * $A['b'], 'c' => -1 * $A['c'], 'd' => $A['a']);

$Ainverse = array();
foreach ($repositioned as $key => $val) {
	$Ainverse[$key] = $deterimant * $val;
}

return $Ainverse; 
}


$p0 = array('a' => 43, 'b' => 66, 'c' => 15, 'd' => 23);

$p0inverse = invertMatrix($p0);

$p1 = array('a' => 18, 'b' => 29, 'c' => 5, 'd' => 8);
$ident = array('a' => 1, 'b' => 0, 'c' => 0, 'd' => 1);
$M0 = array('a' => 175,'b' => 241, 'c' => 61, 'd' => 84);

$M1 = multiply($p1, multiply($ident , multiply($p0inverse, $M0)));

var_dump($M1);