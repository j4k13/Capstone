<?php
	date_default_timezone_set('America/New_York');
        $whereFile = file_get_contents("weather.txt");
        $whereMatch[] = 0;
        preg_match_all("#<cap:areaDesc>(.*?)</cap:areaDesc>#",$whereFile,$whereMatch);
        var_dump($whereMatch[1]);
	$whatMatch[] = 0;
	preg_match_all("#<summary>(.*?)</summary>#",$whereFile,$whatMatch);
	var_dump($whatMatch[1]);
	var_dump("made it");
        //set_include_path("/var/www/html/Capstone/LocationFiles/");
        $whatiterator = 0;
        foreach($whatMatch[1] as $thewhat)
        {
        	foreach($whereMatch[1] as $thewhere)
        	{
        		$allPlaces = explode("; ",$whereMatch[1][$whatiterator]);
        		foreach($allPlaces as $county)
        		{
        			$towrite = fopen($county,"a+");
        			$thething = $thewhat;
        			$thething .= "\n";
        			fwrite($towrite,$thething);
				fclose($towrite);
        		}
        	}
        	$whatiterator = $whatiterator + 1;
        }
?>
