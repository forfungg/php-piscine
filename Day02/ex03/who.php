#!/usr/bin/php
<?php
date_default_timezone_set("EET");
$file = fopen("/var/run/utmpx", "rb");
fseek($file, 1256);
while ($data = fread($file, 628))
{
	if (7 == unpack("itype", $data, 296)['type']){
		print(unpack("a256user", $data)['user']." ");
		print(unpack("a32term", $data, 260)['term']."  ");
		print(date("M j H:i", unpack("itstmp", $data, 300)['tstmp'])."\n");
	}
}
?>