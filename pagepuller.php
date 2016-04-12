<?php
	//set timezone because OMG warn'ins
	date_default_timezone_set('America/New_York');
	set_include_path("/var/www/html/Capstone/");
	
	//check weather
	//--------------------------------------------------------------------
	//get hash from last check
	$lastcheck = md5_file("weather.txt");
	//initialize curl for weather page
	$weatherpage = curl_init("http://alerts.weather.gov/cap/va.php?x=1");
	//open file to write
	$weathertxt = fopen("temp.txt","w");
	//take hash of incoming data
	//$newdata = md5_file("temp.txt");
	//set curl to write file
	curl_setopt($weatherpage, CURLOPT_FILE, $weathertxt);
	//execute page pull and write
	curl_exec($weatherpage);
	//close curl session
	curl_close($weatherpage);
	//take hash of incoming data
        $newdata = md5_file("temp.txt");
	//compare new page to back up
	if($lastcheck != $newdata)
	{
		//load changes to weather.txt
		//$current = fopen("weather.txt","w");
		$new = file_get_contents("temp.txt");
		file_put_contents("weather.txt",$new);
		$log = fopen("log.txt","a+");
		$update = "Updated Weather\n";
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
	
	//check missing persons
	//--------------------------------------------------------------------
        //get hash from last check
        $lastcheck = md5_file("persons.txt");
        //initialize curl for weather page
        $personpage = curl_init("https://docs.google.com/document/u/1/d/1AO6ts-ILTyO2pyBAqoqOSJuXpvMA2KWB8bJnFy2SJug/pub");
        //open file to write
        $persontxt = fopen("tempp.txt","w");
        //set curl to write file
        curl_setopt($personpage, CURLOPT_FILE, $persontxt);
        //execute page pull and write
        curl_exec($personpage);
        //close curl session
        curl_close($personpage);
        //take hash of incoming data
        $newdata = md5_file("tempp.txt");
        //compare new page to back up
        if($lastcheck != $newdata)
        {
                //load changes to persons.txt
                //$current = fopen("persons.txt","w");
                $new = file_get_contents("tempp.txt");
                file_put_contents("persons.txt",$new);
                $log = fopen("log.txt","a+");
                $update = "Updated Missing Persons\n";
                fwrite($log,$update);
                //push updates
                //update about pushing
                fclose($log);
        }
        else
        {
                $log = fopen("log.txt","a+");
                $update = "No new missing people";
                fwrite($log,$update);
                fclose($log);
        }
        //close file    
        fclose($persontxt);

	//checking traffic
	//--------------------------------------------------------------------
        //get hash from last check
        $lastcheck = md5_file("traffic.txt");
        //initialize curl for traffic page
        $trafficpage = curl_init("http://www.511virginia.org/");
        //open file to write
        $traffictxt = fopen("tempt.txt","w");
        //set curl to write file
        curl_setopt($trafficpage, CURLOPT_FILE, $traffictxt);
        //execute page pull and write
        curl_exec($trafficpage);
        //close curl session
        curl_close($trafficpage);
        //take hash of incoming data
        $newdata = md5_file("tempt.txt");
        //compare new page to back up
        if($lastcheck != $newdata)
        {
                //load changes to traffic.txt
                $new = file_get_contents("tempt.txt");
                file_put_contents("traffic.txt",$new);
                $log = fopen("log.txt","a+");
                $update = "Updated traffic alerts\n";
                fwrite($log,$update);
                //push updates
                //update about pushing
                fclose($log);
        }
        else
        {
                $log = fopen("log.txt","a+");
                $update = "No new traffic alerts";
                fwrite($log,$update);
                fclose($log);
        }
        //close file    
        fclose($traffictxt);
	
	//function that parses weather page
	function parseWeather()
	{
		
	}
	
	//parse persons page
	function parsePersons()
	{
		
	}


	//parse traffic
	function parseTraffic()
	{
		
	}
?>
