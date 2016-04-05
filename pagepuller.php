<?php
	//set timezone because OMG warn'ins
	date_default_timezone_set('America/New_York');
	//get hash from last check
	$lastcheck = md5_file("weather.txt");
	//initialize curl for weather page
	$weatherpage = curl_init("http://alerts.weather.gov/cap/va.php?x=1");
	//clean out temp
	
	//open file to write
	$weathertxt = fopen("temp.txt","w");
	//take hash of incoming data
	$newdata = md5_file("temp.txt");
	//set curl to write file
	curl_setopt($weatherpage, CURLOPT_FILE, $weathertxt);
	//curl_setopt($weatherpage, CURLOPT_HEADER, 0);
	//execute page pull and write
	curl_exec($weatherpage);
	//close curl session
	curl_close($weatherpage);
	//compare new page to back up
	if($lastcheck != $newdata)
	{
		//load changes to weather.txt
		$current = file_get_contents("weather.txt");
		$new = file_get_contents("temp.txt");
		file_put_contents($current,$new);
		$log = fopen("log.txt","a+");
		$update = "Updated Weather.txt\n";
		fwrite($log,$update);
		//push updates
		//update about pushing
		fclose($log);
	}
	else
	{
		$log = fopen("log.txt","a+");
		$update = "No new warnings";
		fwrite($log,$update);
		fclose($log);		
	}
	//close file	
	fclose($weathertxt);
?>
