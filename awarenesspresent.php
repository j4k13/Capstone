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
    <body style="background-color:grey; text-align:left;">
	<div style="text-align:center;">
        <h1>Project Awareness</h1><br>
        </div>
	<?php
	$location = $_GET["location"];
	if(empty($_GET["location"])){
	echo "You must provide a location";
	}
	else{
		echo "<h4>Alerts For ", $location, "</h4><br>";
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
	<div style="text-align:center;">
        <form action="awarenesspresent.php" method="get">
                <h4>Would you like to search another location?</h4><input type="text" name="location"><br>
            <input type="submit">
        </form>
        </div>

    </body>
</html>
