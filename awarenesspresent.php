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
		GetContents($location);
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
			//echo $nextitem;
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
	function GetContents($filetoread)
	{
		set_include_path("/var/www/html/Capstone/LocationFiles/");
		//echo "no thanks";
		
		$dataget = fopen($filetoread,"r",1) or die("Didn't open");
		while(!feof($dataget))
		{	
			$nextline = fgets($dataget);	
			echo $nextline."<br>";
		}
		fclose($dataget);		
	}
	?>
    </body>
</html>
