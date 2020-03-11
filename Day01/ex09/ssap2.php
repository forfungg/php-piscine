#!/usr/bin/php
<?php
function my_split($str)
{
	if (!$str)
		return NULL;
	else
	{
		$new = array_filter(explode(' ',$str), function($value) {
			return !is_null($value) && $value !== "";
		});
		return array_values($new);
	}
}

function is_my_alph($c) {
	return ($c > 96 && $c < 123);
}

function is_my_nb($c) {
	return ($c > 47 && $c < 58);
}

function cmp_chars($a, $b)
{
	$an = ord($a);
	$bn = ord($b);
	if ($an == 0 || $bn == 0)
		return ($an - $bn);
	else if (is_my_alph($an) && !is_my_alph($bn))
		return -1;
	else if (!is_my_alph($an) && is_my_alph($bn))
		return 1;
	else if (is_my_nb($an) && !is_my_nb($bn))
		return -1;
	else if (!is_my_nb($an) && is_my_nb($bn))
		return 1;
	else
		return ($an - $bn);
}


function my_compare($a, $b) {
	$cnt = strlen($a);
	if (strlen($b) > $cnt)
		$cnt = strlen($b);
	for ($i = 0; $i <  $cnt; $i++){
		if ($ret = cmp_chars(strtolower($a[$i]), strtolower($b[$i])))
			return ($ret);
	}
	return($ret);
}

$list = array();
foreach($argv as $i => $a){
	if ($i > 0){
		$new = my_split($a);
		foreach($new as $n){
			array_push($list, $n);
		}
	}
}


usort($list, my_compare);
foreach($list as $word){
	print($word."\n");
}
?>