#!/usr/bin/php
<?php
if ($argc > 1)
{
	$str = $argv[1];
	$ret = preg_replace("/[ \t]+/", " ", $str);
	print(trim($ret, ' ')."\n");
}
?>