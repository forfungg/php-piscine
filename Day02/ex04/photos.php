#!/usr/bin/php
<?php
function get_name($url) {
	return array_pop(explode("/", parse_url($url)['path']));
}
if ($argc > 1) {
	$i = 1;
	while ($i < $argc) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		if (!parse_url($argv[$i])['path'])
			$url = $argv[$i]."/";
		else
			$url = $argv[$i];
		$path = parse_url($url)['host'];
		curl_setopt($ch, CURLOPT_URL, $url);
		$str = curl_exec($ch);
		$all_imgs = array();
		preg_match_all("/<img[^>]+src=\"([^\"]+)\"/i", $str, $matches);
		$all_imgs = $matches[1];
		$img_urls = array();
		foreach($all_imgs as $img) {
			$tmp = "/^".str_replace("/", "\/",$url)."/";
			if (!preg_match($tmp, $img) && !preg_match("/(^https:\/\/)|(^http:\/\/)/", $img) && $img[0] != "/")
				$new = $url.$img;
			else if (!preg_match($tmp, $img) && $img[0] == "/")
				$new = $url.ltrim($img, $img[0]);
			else
				$new = $img;
			array_push($img_urls, $new);
		}
		if (!file_exists($path)) {
			mkdir($path, 0755, true);
		}
		foreach($img_urls as $iurl) {
			$file_name = $path."/".get_name($iurl);
			$fd = fopen($file_name, 'w+');
			curl_setopt($ch, CURLOPT_URL, $iurl);
			curl_setopt($ch, CURLOPT_FILE, $fd);
			curl_exec($ch);
			fclose($fd);
		}
		curl_close($ch);
		$i++;
	}
}
?>