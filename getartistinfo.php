<?php
set_time_limit(0); // no time limit to open or close file miliseconds
ini_set('display_errors',true); // display errors
$fp = fopen (dirname(__FILE__) . '/artist-info.json', 'w+'); //saving weather conditions here, creates file
$ch = curl_init('http://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exsentences=5&exlimit=10&explaintext=&titles=Edward_S._Curtis'); //file we're getting current conditions from curl is a method for manipulating files
curl_setopt($ch, CURLOPT_TIMEOUT, 50); // if don't get file in 50 miliseconds, close it
curl_setopt($ch, CURLOPT_FILE, $fp); // put contents of foreign file in local file
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // 
curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Crystal Bridges Museum Collection (http://www.crystalbridgescollection.com/)");
curl_exec($ch);
curl_close($ch);
fclose($fp);
?>