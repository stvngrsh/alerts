<?php
	$geoAPIkey = 'AIzaSyAjFGc2XPNx-ethW6O5AvXfxgvNYeAfgio';
	$db = mysqli_connect('localhost','root','root','scotchbox');
	$query = "SELECT * FROM alerts";

	$result = mysqli_query($db, $query);

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$rows[] = $row;
	}
	mysqli_free_result($result);

	foreach($rows as $row){
		$id = $row['id'];
		$s = $row['location'];

		$s = preg_replace("/((?i)block of (?-i))/", "", $s);

		if($row['offcampus'] == 0){
			$s = $s.", College Park, MD";
		}
		$s = str_replace(" ", "+", $s);

		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/geocode/json?address='.$s.'&key='.$geoAPIkey);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$results = curl_exec($ch);
		curl_close($ch);

		$latlong = json_decode($results);
		$type = $latlong->results[0]->geometry->location_type;
		

		if($type == 'APPROXIMATE'){
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$s.'&key='.$geoAPIkey);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$results = curl_exec($ch);
			curl_close($ch);

			$latlong = json_decode($results);
		}
		$lat = $latlong->results[0]->geometry->location->lat;
		$lng = $latlong->results[0]->geometry->location->lng;

		echo $s."<BR>";
		echo $lat." ".$lng." ".$type."<BR>";
		
		$query = "UPDATE `alerts` SET `lat`='$lat', `long`='$lng' WHERE `id`='$id'";
		$result = mysqli_query($db, $query);

	}
	mysqli_close($db);
?>