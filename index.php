<?php

$server = "mysql:host=localhost;dbname=alerts";
$user = "root";
$pass = "";

$db = new PDO($server, $user, $pass);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'alert.umd.edu/alerts');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$html = curl_exec($ch);
curl_close($ch);

# Create a DOM parser object
$dom = new DOMDocument();

$dom->loadHTML($html);

foreach ($dom->getElementsByTagName('div') as $node) {
	$attr = $node->getAttribute('class');
	if($attr == 'node node-umd-alerts node-promoted clearfix'){
		$h2 = $node->getElementsByTagName('h2');
		if($h2->item(0) != NULL){
			$a = $h2->item(0)->getElementsByTagName('a');
			if($a->item(0) != NULL){
				$title = $a->item(0)->nodeValue;

				if(0 === strpos($title, 'UMD Safety Notice')){

					$event = trim(substr($title, 19));
					$offcampus = ((0 === strpos(strtolower($event), 'off-campus')) || (0 === strpos(strtolower($event), 'off campus')));
					


					$nodetext = $node->nodeValue;
					
					$replace = array("\n");
					$nodetext = str_replace($replace, " ", $nodetext);
					//Get Incident
					preg_match_all("/(?<=INCIDENT:).+?(?=OCCURRED:)/", $nodetext, $output_array);
					$incident = trim(str_replace("\xc2\xa0",' ',trim($output_array[0][0])));
					if($offcampus == TRUE){
						$incident = str_replace("Off-Campus", '', $incident);
						$incident = str_replace("Off Campus", '', $incident);
						$incident = trim($incident);
					}

					//Get Occurred
					preg_match_all("/(?<=OCCURRED:).+?(?=LOCATION:)/", $nodetext, $output_array);
					$occurred = trim($output_array[0][0]);
					$reported = '';
					if(strpos($occurred, 'REPORTED') !== FALSE){
						//Get Reported
						preg_match_all("/(?<=REPORTED:)(.*)/", $occurred, $output_array);
						$reported = trim($output_array[0][0]);
						$r_date = substr($reported, 0, strpos($reported, '/'));
						$r_time = substr($reported, strpos($reported, '/')+2);

						preg_match_all("/.+?(?=REPORTED:)/", $occurred, $output_array);
						$occurred = trim($output_array[0][0]);
						$o_date = substr($occurred, 0, strpos($occurred, '/'));
						$o_time = substr($occurred, strpos($occurred, '/')+2);
					}
					else{
						$o_date = substr($occurred, 0, strpos($occurred, '/'));
						$o_time = substr($occurred, strpos($occurred, '/')+2);
					}

					//Get Location
					if($offcampus == TRUE){
						preg_match_all("/(?<=LOCATION:).+?(?=PGPD)/", $nodetext, $output_array);
					}
					else{
						preg_match_all("/(?<=LOCATION:).+?(?=UMPD)/", $nodetext, $output_array);
					}
					$location = trim(str_replace("\xc2\xa0",' ',trim($output_array[0][0],chr(0xC2).chr(0xA0))));


					//Get Case #
					if($offcampus == TRUE){
						preg_match_all("/(?<=PGPD CASE #: ).+?(?=\s)/", $nodetext, $output_array);
					}
					else{
						preg_match_all("/(?<=UMPD CASE #: ).+?(?=\s)/", $nodetext, $output_array);
					}
					$case = trim($output_array[0][0]);


					//Get Description
					if($offcampus == TRUE){
						preg_match_all("/(?<=PGPD CASE #: ).+?(?=\s)(.*)(?=The Prince George's County Police Department is)/", $nodetext, $output_array);
					}
					else{
						preg_match_all("/(?<=BRIEF DETAILS:)(.*)(?=The University of Maryland Police Department is)/", $nodetext, $output_array);
					}
					$description = mysql_real_escape_string(trim(str_replace("\xc2\xa0",' ',trim($output_array[1][0]))));


					echo $incident;
					echo '<BR>';
					if($offcampus == TRUE){
						echo "OFF Campus"."  ".$offcampus;
						echo '<BR>';
					}
					else{
						echo "ON Campus";
						echo '<BR>';
					}
					
					echo $o_date.'|'.$o_time.'<BR>';
					if($reported != ''){
						echo $reported;
						echo '<BR>';
						echo $r_date.'|'.$r_time.'<BR>';
					}

					$time_one = '';
					$time_two = '';
					if(strpos(strtolower($o_time), 'between') !== FALSE){
						$time_one = trim(substr($o_time, 0, strpos(strtolower($o_time), 'and')));
						$time_two = trim(substr($o_time, strpos(strtolower($o_time), 'and')));
						
						preg_match_all(@"/[01]?[0-9]([:.][0-9]{2})?(\s?[ap]\.m\.)?$/", $time_one, $output_array);
						$time_one = $output_array[0][0];
						preg_match_all(@"/[01]?[0-9]([:.][0-9]{2})?(\s?[ap]\.m\.)?$/", $time_two, $output_array);
						$time_two = $output_array[0][0];

						echo $time_one."<BR>";
						echo $time_two."<BR>";


					}
					else{
						$time_one = trim(str_replace("\xc2\xa0",' ',trim($o_time)));
						preg_match_all(@"/[01]?[0-9]([:.][0-9]{2})?(\s?[ap]\.m\.)?$/", $time_one, $output_array);
						$time_one = $output_array[0][0];
						echo $time_one."<BR>";
					}
					


					echo $location;
					echo '<BR>';
					echo $case;
					echo '<BR>';
					echo $description;
					echo '<BR>';


					//echo $nodetext;
					
					$query = $db->prepare("INSERT INTO `alerts`.`alerts` (`incident`, `offcampus`, `date`, `time_one`, `time_two`, `location`, `case`, `description`) VALUES ('$incident', '$offcampus', '$o_date', '$time_one', '$time_two', '$location', '$case', '$description')");
					$query->execute();

					//print_r($query);
					echo "<BR>";
					echo "<BR>";
					
				}

			}
		}
	}
	
}


?>