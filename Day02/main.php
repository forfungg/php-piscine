#!/usr/bin/php
<?php
$day = $argv[1];
$ret = preg_match("/^[1-2]?[0-9]$|^3[0-1]$/", $day);
print($ret."\n");
?>