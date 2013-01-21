<?php

$circ = 0;
$r = 1;
$noTriangles = 1000000;
for ($i = 0; $i < $noTriangles; $i++) {
	$angle = 360 / $noTriangles;
	$op = sin(deg2rad($angle/2))*$r;
	$circ += 2*$op;
	
}

var_dump($circ / 2);
var_dump(M_PI);
