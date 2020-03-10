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

if ($argc == 2)
{
	$tmp = my_split($argv[1]);
	$cnt = count($tmp);
	foreach ($tmp as $i => $w){
		if ($i < $cnt - 1)
			print($w." ");
		else
			print($w."\n");
	}
}
?>