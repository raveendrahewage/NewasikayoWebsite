<?php 
	function greeting()
	{
		$hour=date('h');

		if($hour>=0 and $hour <= 11)
		{
			echo  "Good Morning!";
		}
		elseif($hour >= 12 and $hour <= 17)
		{
			echo "Good Afternoon!";
		}
		elseif($hour >=17 and $hour<=19)
		{
			echo "Good Evening!";
		}
		else
		{ 
			echo "Good Night!";
		}
	} ?>