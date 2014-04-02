<?
include 'db_connect.php';
	// connecting to db
	$con = new DB_CONNECT();

	if (!$con) { 
		die('Could not connect to MySQL: ' . mysql_error()); 
	} 

	$sql="USE myankou_201401_cpsc481;";
	if (!mysql_query($sql)){
	    die("Error using Database: " . mysql_error());
	}

	$point=$_POST['name'];
	$lat=$_POST['lat'];
	$lon=$_POST['lon'];
	$loc=$_POST['loc'];

	$sql = "INSERT INTO poi (name, gps_lat, gps_lon, campus_id) 
			VALUES ('$point', '$lat', '$lon', '$loc')";
	if(mysql_query($sql)){
		echo "
			<script>
				var box=confirm('Point Created. Add another?');
				if (box==true) {
				  window.location = 'http://people.clemson.edu/~myankou/php/EyeApp/input.php';
				}else{
				  window.location = 'http://people.clemson.edu/~myankou/php/EyeApp/admin.html';
				}
			</script>
			";
	} else{
		echo "<br>Failed creating point: ". mysql_error();
	}

?>