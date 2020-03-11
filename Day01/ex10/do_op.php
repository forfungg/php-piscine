#!/usr/bin/php
<?php
if ($argc == 4)
{
	$a = trim($argv[1], ' \t');
	$b = trim($argv[3], ' \t');
	$op = trim($argv[2], ' \t');
	if ($op === '+')
		print($a + $b);
	else if ($op === '-')
		print($a - $b);
	else if ($op === '*')
		print($a * $b);
	else if ($op === '/' && $b != 0)
		print($a / $b);
	else if ($op === '%' && $b != 0)
		print($a % $b);
	else
		exit();
	print("\n");
}
?>