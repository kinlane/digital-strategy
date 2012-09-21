<?php 
// ----------------------------
// Title: Pull Federal Agency Digital Report
// Description:  This sample script will pull the JSON version of a single agencies digital strategy
// Author:  Kin Lane
// Email: info@apievangelist.com
// Date:  09/21/2012
// ----------------------------

// Set the root URL for Agency
$url = "http://www.gsa.gov";

// Append the JSON version of the digital strategy
$url .= "/digitalstrategy.json";

echo "Pulling JSON URL: <a href=" . chr(34). $url . chr(34) . " target='_blank'>" . $url . "</a><br />";

// Pull the JSON digital strategy
$http = curl_init();  
curl_setopt($http, CURLOPT_URL, $url);  
curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);   

$output = curl_exec($http);
$info = curl_getinfo($http);
$http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);	

// If you encounter 302 or 301 then handle redirect
if($http_status=='302'||$http_status=='301')
	{
	
	// Pull the redirect URL from the last curl call
	$url = $info['redirect_url'];
	
	echo "<br />Pulling redirect JSON URL: <a href=" . chr(34). $url . chr(34) . " target='_blank'>" . $url . "</a><br />";		
	
	// Pull the JSON from redirect URL
	$http = curl_init();  
	curl_setopt($http, CURLOPT_URL, $url);  
	curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);   
	
	$output = curl_exec($http);
	$info = curl_getinfo($http);	
	$http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);

	}

$report = json_decode($output);

//var_dump($report);

if(is_null($report))
	{
	// We didn't find a valid JSON object
	echo "<strong>No JSON was found in the response!!</strong><br />";
	$http_status = "404";
	}
else
	{
	// Handle the report generated date
	$generated = $report->generated;	
	$Generated_Date = date('Y-m-d H:i:s', strtotime($generated));	
	echo "Report Generated: " . $Generated_Date . "<br />";
	echo "<br /><hr /><br />";	
	
	// Process earch report item		
	foreach($report->items as $reportitem)
		{
		//var_dump($reportitem);
		$id = $reportitem->id;
		$text = $reportitem->text;
		$parent = $reportitem->parent;
		$due = $reportitem->due;
		$due_date = $reportitem->due_date;
		
		echo "<strong>Item:</strong><br >";
		echo "id: " . $id . "<br />";
		echo "text: " . $text . "<br />";
		echo "parent: " . $parent . "<br />";
		echo "due: " . $due . "<br />";
		echo "due_date: " . $due_date . "<br />";
		echo "<br />";
				
		$sortcount = 1;
		
		// Process each field on the report
		echo "<strong>Field(s):</strong><br >";
		foreach($reportitem->fields as $reportfield)
			{
			
			//var_dump($reportfield);
			
			$type = $reportfield->type;
			$name = $reportfield->name;
			$label = $reportfield->label;
			$value = $reportfield->value;
			
			echo "type: " . $type . "<br />";
			echo "name: " . $name . "<br />";
			echo "label: " . $label . "<br />";
			echo "<ul>";
			if(is_array($value))
				{
				foreach($value as $v)
					{	
					echo "<li>" . $v . "</li>";
					$acount++;
					}				
				}
			elseif(is_null($value))
				{
				$value = '';
				}
			else 
				{
				echo "<li>" . $value . "</li>";
				}
			
			echo "</ul>";		
								
			$sortcount++;
			}
		echo "<br /><hr /><br />";	
			
		}						
	}	
?>	
