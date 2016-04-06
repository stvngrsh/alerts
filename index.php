<?php 
	$db = mysqli_connect('localhost','root','root','scotchbox');
  	$query = "SELECT * FROM alerts ORDER BY datetime";
	$result = mysqli_query($db, $query);

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$rows[] = $row;
	}
	mysqli_free_result($result);

?>
<!DOCTYPE html>
<html lang="en" hola_ext_inject="disabled">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	<meta name="author" content="Steven Gresh">
	<link rel="icon" href="favicon.ico">

	<title>UMD Alerts</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<style>
	</style>
</head>
<body>
	<?php include 'nav.php'; ?>
	<div id="map"></div>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcMUyi3FWcwPBiSCSGkAdUHcHA4_OcA_c&callback=initMap"></script>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	// Create a map object and specify the DOM element for display.
	var map;
	var center = {lat: 38.987294, lng: -76.941964};

	function CenterControl(controlDiv, map){
		var controlUI = document.createElement('div');
		controlUI.style.backgroundColor = '#fff';
	  	controlUI.style.border = '2px solid #fff';
		controlUI.style.borderRadius = '3px';
	  	controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
	 	controlUI.style.cursor = 'pointer';
	  	controlUI.style.marginBottom = '22px';
	  	controlUI.style.marginTop = '60px';
	  	controlUI.style.marginLeft = '10px';
	  	controlUI.style.textAlign = 'center';
	  	controlUI.title = 'Click to recenter the map';
	  	controlDiv.appendChild(controlUI);

		// Set CSS for the control interior.
		var controlText = document.createElement('div');
		controlText.style.color = 'rgb(25,25,25)';
		controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
		controlText.style.fontSize = '16px';
		controlText.style.lineHeight = '38px';
		controlText.style.paddingLeft = '5px';
		controlText.style.paddingRight = '5px';
		controlText.innerHTML = 'Center Map';
		controlUI.appendChild(controlText);

		// Setup the click event listeners: simply set the map to Chicago.
		controlUI.addEventListener('click', function() {
			map.setCenter(center);
		});
	}

	function MapTypeControl(controlDiv, map){
		// Creating divs & styles for custom zoom control
		controlDiv.style.padding = '5px';

		// Set CSS for the control wrapper
		var controlWrapper = document.createElement('div');
		controlWrapper.style.backgroundColor = 'white';
		controlWrapper.style.borderStyle = 'solid';
		controlWrapper.style.borderColor = 'gray';
		controlWrapper.style.borderWidth = '1px';
		controlWrapper.style.display = 'inline';
		controlWrapper.style.cursor = 'pointer';
		controlWrapper.style.textAlign = 'center';
		controlWrapper.style.width = '128px'; 
		controlWrapper.style.height = '64px';

		controlDiv.appendChild(controlWrapper);
		  
		// Set CSS for the zoomIn
		var mapButton = document.createElement('div');
		mapButton.style.width = '128px'; 
		mapButton.style.height = '32px';
		mapButton.style.fontFamily = 'Roboto,Arial,sans-serif';
		mapButton.style.fontSize = '16px';
		mapButton.style.lineHeight = '38px';
		mapButton.style.paddingLeft = '5px';
		mapButton.style.paddingRight = '5px';
		mapButton.innerHTML = 'Center Map';
		/* Change this to be the .png image you want to use */
		controlWrapper.appendChild(mapButton);

		// Set CSS for the zoomOut
		var satButton = document.createElement('div');
		satButton.style.width = '128px'; 
		satButton.style.height = '32px';
		satButton.style.fontFamily = 'Roboto,Arial,sans-serif';
		satButton.style.fontSize = '16px';
		satButton.style.lineHeight = '38px';
		satButton.style.paddingLeft = '5px';
		satButton.style.paddingRight = '5px';
		satButton.innerHTML = 'Center Map';
		/* Change this to be the .png image you want to use */
		controlWrapper.appendChild(satButton);

		// Setup the click event listener - zoomIn
		google.maps.event.addDomListener(mapButton, 'click', function() {
			map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
		});

		// Setup the click event listener - zoomOut
		google.maps.event.addDomListener(satButton, 'click', function() {
			map.setMapTypeId(google.maps.MapTypeId.SATELLITE);

		});  
	}

  	function initMap() {
    	map = new google.maps.Map(document.getElementById('map'), {
     		center: center,
    		zoom: 15
    	});

    	var mapTypeControlDiv = document.createElement('div');
  		var mapTypeControl = new MapTypeControl(mapTypeControlDiv, map);
  		mapTypeControlDiv.index = 1;
  		map.controls[google.maps.ControlPosition.LEFT_TOP].push(mapTypeControlDiv);
    	
    	var centerControlDiv = document.createElement('div');
    	var centerControl = new CenterControl(centerControlDiv, map);
    	centerControlDiv.index = 2;
    	map.controls[google.maps.ControlPosition.LEFT_TOP].push(centerControlDiv);

		<?php
		$iter = 0;
		$latlngArr = [];
		$latlngIter = [];
		foreach($rows as $row){
			$id = $row['id'];
			$lat = $row['lat'];
			$lng = $row['long'];
			$title = $row['incident'];
			$s = $lat." ".$lng;
			if(in_array($s, $latlngArr)){
				$pos = array_search($s, $latlngArr);
				$i = $latlngIter[$pos];
		?>	
				var c = infowindow<?php echo $i;?>.getContent();
				infowindow<?php echo $i;?>.setContent(c + <?php echo "'".$title."<BR>'";?>);
		<?php
			}
			else{
				array_push($latlngArr, $s);
				array_push($latlngIter, $iter);
		?>		
				var infowindow<?php echo $iter;?> = new google.maps.InfoWindow({
				    content: <?php echo "'".$title."<BR>'";?>
				});
		    	var marker<?php echo $iter;?> = new google.maps.Marker({
		    		map: map,
		    		position: {lat: <?php echo $lat;?>, lng: <?php echo $lng;?>},
		    		animation: google.maps.Animation.DROP,
		    		title: "Marker"
		    	});
		    	marker<?php echo $iter;?>.addListener('click', function() {
				    infowindow<?php echo $iter;?>.open(map, marker<?php echo $iter;?>);
				});
		<?php
				$iter = $iter+1;
			}
		}
		?>
  	}//Close initMap
  	$(document).ready(function(){
		initMap();
	});
	</script>

</body>
</html>