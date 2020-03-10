<?php
function ft_split($str)
{
	if (!$str)
		return NULL;
	else
	{
		$new = array_filter(explode(' ',$str), function($value) {
			return !is_null($value) && $value !== "";
		});
		sort($new);
		return $new;
	}
}
?>