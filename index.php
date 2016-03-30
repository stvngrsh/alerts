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
	<div id="map"></div>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcMUyi3FWcwPBiSCSGkAdUHcHA4_OcA_c&callback=initMap"></script>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	// Create a map object and specify the DOM element for display.
	var map;

  	function initMap() {
    	map = new google.maps.Map(document.getElementById('map'), {
     		center: {lat: 38.987294, lng: -76.941964},
    		zoom: 15
    	});

<?php
$iter = 1;
    	
foreach($rows as $row){
	$id = $row['id'];
	$lat = $row['lat'];
	$lng = $row['long'];
	$title = $row['incident'];

?>
    	var marker<?php echo $iter;?> = new google.maps.Marker({
    		map: map,
    		position: {lat: <?php echo $lat;?>, lng: <?php echo $lng;?>},
    		title: <?php echo "'".$title."'";?>
    	});
<?php
	$iter = $iter+1;
}
?>
  	}
  	$(document).ready(function(){
		initMap()
	});
	</script>

</body>
</html>