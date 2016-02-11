<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Project Awareness</title>
    </head>
    <body>
	<?php
	$location = $_GET["location"];
	if(empty($_GET["location"])){
	echo "You must provide a location";
	}
	else{
		$flag = DetectLoc($location);
		if($flag)
		{
		echo "Alerts For ", $location, "<br>";

        	}
		else{
		echo "Entered location is outside of project's current scope";
		}
	}
	function DetectLoc($loctosearch)
	{
		
		//problem is between here
		$searchfile = fopen("zips.txt","r") or die("Didn't find");
		$nextitem = "";
		//parse zip codes
		while(!feof($searchfile))
		{
			$nextitem = fgets($searchfile);
			echo $nextitem;
			if($lotosearch == $nextitem)
			{
				return true;		
			}
		}
		fclose($searchfile);
		//----------and here
		//parse counties
		//parse cities
		return false;
	}
	?>
    </body>
</html>
