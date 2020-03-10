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

if ($argc > 1){
	$list = my_split($argv[1]);
	foreach($list as $i => $a){
		if ($i > 0)
			print($a." ");
		}
	print($list[0]."\n");
	}
?>