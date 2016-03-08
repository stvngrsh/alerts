<?php

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

					$event = trim(substr($title, 20));
					$offcampus = ((0 === strpos(strtolower($event), 'off-campus')) || (0 === strpos(strtolower($event), 'off campus')));
					
					$nodetext = (string)print_r($node,true);
					
					$regex = '/(?<=INCIDENT:).+?(?=OCCURRED:)/';
					preg_match($regex, $nodetext, $output_array);

					print_r($output_array[0]);

					echo $nodetext;

					echo '<BR>';
					echo '<BR>';

					/*
					foreach($node->getElementsByTagName('p') as $p){
						$span = $p->getElementsByTagName('span');
						if($span->item(0) != NULL){
							$font = $span->item(0)->getElementsByTagName('font');
							if($font->item(0) != NULL){
								$text = $font->item(0)->nodeValue;

								if(0 === strpos(strtolower($text), 'incident:')){
									$incident = $text;
								}
								if(0 === strpos(strtolower($text), 'occurred:')){
									$occured = $text;
								}
								if(0 === strpos(strtolower($text), 'location:')){
									$location = $text;
								}
								
							}
						}

					}
					echo $event;
					echo " ";
					echo $offcampus;
					echo "<BR>";
					echo $incident;
					echo "<BR>";
					echo $occured;
					echo "<BR>";
					echo $location;
					echo "<BR>";
					echo '<BR>';
					*/
					
				}

			}
		}
	}
	
}


?>