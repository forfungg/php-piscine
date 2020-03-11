#!/usr/bin/php
<?php
	$img = "google.com";
	$url = "https://jiricodes.com";
	$tmp = "/^".str_replace("/", "\/",$url)."/";
	if (!preg_match($tmp, $img) && !preg_match("/(^https:\/\/)|(^http:\/\/)/", $img) && $img[0] != "/")
		$new = $url.$img;
	print($img."\n");
	print($new."\n");
	// $list = parse_url("https://www.jiricodes.com/images/jiricodes_black.png");
	// print_r($list);
	// preg_match_all("/[^\/]*$/", $list['path'], $name);
	// print_r($name);
?>