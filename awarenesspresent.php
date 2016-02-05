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
		if(false)
		{
		echo "Alerts For ", $location, "<br>";
        	}
		else{
		echo "Entered location is outside of project's current scope";
		}
	}
	?>
    </body>
</html>
