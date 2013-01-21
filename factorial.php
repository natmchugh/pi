<?php

class Factiorial {

	private static $_cache = array(1 => 1,2 => 2);

	public function calculate($n) {
		$nearest = $this->findNearestInCache($n);
		$answer = self::$_cache[$nearest];
		$diff = $n - $nearest;
		if ($diff > 0) {
			for ($i = $nearest; $i < $n; ++$i) {
				$answer = bcadd($answer, bcmul($answer,$i));
				self::$_cache[$i+1] = $answer;
			}
		} else {
			for ($i = $nearest; $i > $n; --$i) {
				$answer = bcdiv($answer,$i);
			}
		}
		return $answer;
	}
	
   private function findNearestInCache($n) {
        $keys = array_keys(self::$_cache);
        rsort($keys);
        $nearest = current($keys) ;
        $smallestDiff = abs(current($keys) - $n);
            foreach ($keys as $key) {
                if ($diff = abs($n - $key) < $smallestDiff) {
                    $nearest = $key;
                    $smallestDiff = $diff;
                }
            }
            return $nearest;
    }

	
}