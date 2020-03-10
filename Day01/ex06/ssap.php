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

$list = array();
foreach($argv as $i => $a){
	if ($i > 0){
		$new = my_split($a);
		foreach($new as $n){
			array_push($list, $n);
		}
	}
}
sort($list);
foreach($list as $word){
	print($word."\n");
}
?>