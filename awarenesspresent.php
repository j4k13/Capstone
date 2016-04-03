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
		echo "Alerts For ", $location, "<br>";
		GetContents($location);
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
