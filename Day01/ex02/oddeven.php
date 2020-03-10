#!/usr/bin/php
<?php
	while(!feof(STDIN))
	{
		print("Enter number: ");
		$nb = trim(fgets(STDIN));
		if(feof(STDIN))
			break;
		if (is_numeric($nb))
		{
			if ($nb % 2 == 0)
				print("The number ".$nb." is even\n");
			else
				print("The number ".$nb." is odd\n");
		}
		else
			print("'".$nb."' is not a number\n");
	}
	print("\n");
?>