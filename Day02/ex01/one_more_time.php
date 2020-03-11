#!/usr/bin/php
<?php

function is_day($str) {
	$week = ["lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche"];
	foreach ($week as $d) {
		if ($d === $str)
			return TRUE;
	}
	return FALSE;
}

function is_month($str, $months) {
	for ($i = 0; $i < count($months); $i++) {
		if ($months[$i] === $str)
			return ($i + 1);
	}
	return FALSE;
}

date_default_timezone_set("CET");

if ($argc > 1)
{
	$months = ["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"];
	$tmp = preg_split("/ /", $argv[1]);
	if (count($tmp) != 5)
	{
		print("Wrong Format\n");
		exit();
	}
	$wday = strtolower($tmp[0]);
	$day = $tmp[1];
	$month = strtolower($tmp[2]);
	$year = $tmp[3];
	$tt = preg_split("/:/", $tmp[4]);
	if (!is_day($wday) || !($m_nb = is_month($month, $months)) || !preg_match("/^[1-2]?[0-9]$|^3[0-1]$/", $day) || !preg_match("/^[0-9]{4}$/", $year) || !preg_match("/^[0-9]{2}:[0-9]{2}:[0-9]{2}$/", $tmp[4]))
	{
		print("Wrong Format\n");
		exit();
	}
	else
		print(mktime($tt[0], $tt[1], $tt[2], $m_nb, $day, $year)."\n");
}
?>