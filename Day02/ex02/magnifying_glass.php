#!/usr/bin/php
<?php
if ($argc > 1)
{
	function iter_to_upper($str_array) {
		return str_replace($str_array[1], strtoupper($str_array[1]), $str_array[0]);
	}
	$str = file_get_contents($argv[1]);
	$ret = preg_replace_callback("/<a href=.*<\/a>/", function($s) {
			$s[0] = preg_replace_callback("/title=\"(.*)\"/", iter_to_upper, $s[0]);
			$s[0] = preg_replace_callback("/>([^<>]*)</", iter_to_upper, $s[0]);
			return $s[0];
	}, $str);
	print($ret);
}
?>