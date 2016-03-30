<?php
	$db = mysqli_connect('localhost','root','root','scotchbox');
	$query = "SELECT * FROM alerts";

	$result = mysqli_query($db, $query);

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$rows[] = $row;
	}
	mysqli_free_result($result);

	foreach($rows as $row){
		$id = $row['id'];
		$s = $row['date']." ".$row['time_one'];
		//echo $s."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$s = preg_replace("/(-[0-9]?[0-9])/", "", $s);
		$date = strtotime($s);
		$datetime = date(DATE_ISO8601, $date);
		//echo "<BR>";

		
		$query = "UPDATE `alerts` SET `datetime`='$datetime' WHERE `id`='$id'";
		echo $query."<BR>";
		$result = mysqli_query($db, $query);

	}
	mysqli_close($db);
?>