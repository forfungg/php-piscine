#!/usr/bin/php
<?php
foreach($argv as $i => $a){
	if ($i > 0 && $a != "")
		print($a."\n");
}
?>