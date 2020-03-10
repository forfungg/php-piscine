<?php
function ft_is_sort($list){
	$tmp = array_values($list);
	asort($tmp);
	if ($list === $tmp)
		return TRUE;
	else
		return FALSE;
}
?>