<style type="text/css">
	table, td {
   		border: 1px solid #000000;
   		float:	left;
	}
	#titles	{
		font-weight: 800;
	}
</style>

<?php 
    include 'db_connect.php';
    // connecting to db
    $con = new DB_CONNECT();
	if (!$con) { 
		die('Could not connect to MySQL: ' . mysql_error()); 
	} 
	$sql = mysql_query("SELECT * FROM poi"); 
?>

<table>
<tr>
	<th colspan="100%">Points of Interest</th>
</tr>
<tr id="titles">
	<td>ID</td>
	<td>Name</td>
	<td>Latitude</td>
	<td>Longitude</td>
</tr>
<?php
	while($data = mysql_fetch_row($sql)){
?>
<tr>
    <td><?php echo $data[0]; ?></td>
    <td><?php echo $data[1]; ?></td>
    <td><?php echo $data[2]; ?></td>
    <td><?php echo $data[3]; ?></td>
</tr>
<?php 
	} 
?>
</table></br>

<?php
	$sql = mysql_query("SELECT * FROM location");
?>
<table>
<tr>
	<th colspan="100%">Available Locations</th>
</tr>
<tr id="titles">
	<td>ID</td>
	<td>Name</td>
	<td>Latitude</td>
	<td>Longitude</td>
</tr>
<?php
	while($data = mysql_fetch_row($sql)){
?>
<tr>
    <td><?php echo $data[0]; ?></td>
    <td><?php echo $data[1]; ?></td>
    <td><?php echo $data[2]; ?></td>
    <td><?php echo $data[3]; ?></td>
</tr>
<?php 
	} 
?>
</table></br>
<?php
	$sql = mysql_query("SELECT * FROM time_ref");
?>
<table>
<tr>
	<th colspan="100%">Time References</th>
</tr>
<tr id="titles">
	<td>ID</td>
	<td>Date</td>
	<td>Point of Interest ID</td>
	<td>Time ID</td>
</tr>
<?php
	while($data = mysql_fetch_row($sql)){
?>
<tr>
    <td><?php echo $data[0]; ?></td>
    <td><?php echo $data[1]; ?></td>
    <td><?php echo $data[2]; ?></td>
    <td><?php echo $data[3]; ?></td>
</tr>
<?php 
	} 
?>
</table></br>
<?php
	$sql = mysql_query("SELECT * FROM artifact");
?>
<table>
<tr>
	<th colspan="100%">Artifacts</th>
</tr>
<tr id="titles">
	<td>ID</td>
	<td>Data</td>
	<td>Type</td>
	<td>Time Reference ID</td>
</tr>
<?php
	while($data = mysql_fetch_row($sql)){
?>
<tr>
    <td><?php echo $data[0]; ?></td>
    <td><?php echo $data[1]; ?></td>
    <td><?php echo $data[2]; ?></td>
    <td><?php echo $data[3]; ?></td>
</tr>
<?php 
	} 
?>
</table></br>
<?php
	$sql = mysql_query("SELECT * FROM artifact_type");
?>
<table>
<tr>
	<th colspan="100%">Artifact Types</th>
</tr>
<tr id="titles">
	<td>ID</td>
	<td>Type</td>
</tr>
<?php
	while($data = mysql_fetch_row($sql)){
?>
<tr>
    <td><?php echo $data[0]; ?></td>
    <td><?php echo $data[1]; ?></td>
</tr>
<?php 
	} 
?>
</table></br>
<?php
	$sql = mysql_query("SELECT * FROM time");
?>
<table>
<tr>
	<th colspan="100%">Times</th>
</tr>
<tr id="titles">
	<td>ID</td>
	<td>Time</td>
</tr>
<?php
	while($data = mysql_fetch_row($sql)){
?>
<tr>
    <td><?php echo $data[0]; ?></td>
    <td><?php echo $data[1]; ?></td>
</tr>
<?php 
	} 
?>
</table>