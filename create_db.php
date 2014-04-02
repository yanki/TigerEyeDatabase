<?php 

//database connect
    include 'db_connect.php';
    // connecting to db
    $con = new DB_CONNECT();

	if (!$con) { 
		die('Could not connect to MySQL: ' . mysql_error()); 
	} 
	echo 'Connection OK'; 
	echo '<br>';

  $sql="USE myankou_201401_cpsc481;";
  if (mysql_query($sql)){
      echo "Switched Use.";
      echo '<br>';
    } else {
      echo "Error using Database: " . mysql_error();
      echo '<br>';
  }

  $sql="CREATE TABLE IF NOT EXISTS `artifact` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `data` varchar(500) NOT NULL,
      `type` int(11) NOT NULL,
      `ref_id` int(11) NOT NULL,
      PRIMARY KEY (`id`),
      KEY `type` (`type`),
      KEY `ref_id` (`ref_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
  if (mysql_query($sql)){
      echo "Created artifact table.";
      echo '<br>';
    } else {
      echo "Error creating artifact table: " . mysql_error();
      echo '<br>';
  }

  $sql="CREATE TABLE IF NOT EXISTS `artifact_type` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `type` varchar(100) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";
  if (mysql_query($sql)){
      echo "Created artifact_type table.";
      echo '<br>';
    } else {
      echo "Error creating artifact_type table: " . mysql_error();
      echo '<br>';
  }

  /*$sql="INSERT INTO `artifact_type` (`id`, `type`) VALUES
    (1, 'image');";
  if (mysql_query($sql)){
      echo "Inserted into artifact_type.";
      echo '<br>';
    } else {
      echo "Error inserting into artifact_type: " . mysql_error();
      echo '<br>';
  }*/

  $sql="CREATE TABLE IF NOT EXISTS `location` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(50) NOT NULL,
      `gps_lat` double NOT NULL,
      `gps_lon` double NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
  if (mysql_query($sql)){
      echo "Created location table.";
      echo '<br>';
    } else {
      echo "Error creating location table: " . mysql_error();
      echo '<br>';
  }

  $sql="CREATE TABLE IF NOT EXISTS `poi` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(50) NOT NULL,
      `gps_lat` double NOT NULL,
      `gps_lon` double NOT NULL,
      `campus_id` int(11) NOT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `name` (`name`),
      KEY `campus_id` (`campus_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
  if (mysql_query($sql)){
      echo "Created poi table.";
      echo '<br>';
    } else {
      echo "Error creating poi table: " . mysql_error();
      echo '<br>';
  }

  $sql="CREATE TABLE IF NOT EXISTS `time` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `time` varchar(10) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";
  if (mysql_query($sql)){
      echo "Created time table.";
      echo '<br>';
    } else {
      echo "Error creating time table: " . mysql_error();
      echo '<br>';
  }

  $sql="CREATE TABLE IF NOT EXISTS `time_ref` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `date` date NOT NULL,
      `poi_id` int(11) NOT NULL,
      `time_id` int(11) NOT NULL,
      PRIMARY KEY (`id`),
      KEY `poi_id` (`poi_id`),
      KEY `time_id` (`time_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
  if (mysql_query($sql)){
      echo "Created time_ref table.";
      echo '<br>';
    } else {
      echo "Error creating time_ref table: " . mysql_error();
      echo '<br>';
  }

  $sql="CREATE TABLE IF NOT EXISTS `admin` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` varchar(10) NOT NULL,
      `password` varchar(10) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";
  if (mysql_query($sql)){
      echo "Created admin table.";
      echo '<br>';
    } else {
      echo "Error creating admin table: " . mysql_error();
      echo '<br>';
  }

  $sql="INSERT INTO admin (id, username, password) VALUES
    (1,'root', 'root');";
  if (mysql_query($sql)){
      echo "INSERT INTO admin successful.";
      echo '<br>';
    } else {
      echo "Error inserting into admin: " . mysql_error();
      echo '<br>';
  }
  /*$sql="ALTER TABLE `artifact`
      ADD CONSTRAINT `artifact_ibfk_2` FOREIGN KEY (`ref_id`) REFERENCES `time_ref` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
      ADD CONSTRAINT `artifact_ibfk_1` FOREIGN KEY (`type`) REFERENCES `artifact_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
  if (mysql_query($sql)){
      echo "artifact Keys linked.";
      echo '<br>';
    } else {
      echo "Error linking Keys in artifact: " . mysql_error();
      echo '<br>';
  }

  $sql="ALTER TABLE `poi`
      ADD CONSTRAINT `poi_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
  if (mysql_query($sql)){
      echo "poi Keys linked.";
      echo '<br>';
    } else {
      echo "Error linking Keys in poi: " . mysql_error();
      echo '<br>';
  }

  $sql="ALTER TABLE `time_ref`
      ADD CONSTRAINT `time_ref_ibfk_2` FOREIGN KEY (`time_id`) REFERENCES `time` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
      ADD CONSTRAINT `time_ref_ibfk_1` FOREIGN KEY (`poi_id`) REFERENCES `poi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;";
  if (mysql_query($sql)){
      echo "time_ref Keys linked.";
      echo '<br>';
    } else {
      echo "Error linking Keys in time_ref: " . mysql_error();
      echo '<br>';
  }*/

	// Execute query

  $query="SELECT * FROM time";
	$result = mysql_query($query);  
	while($data = mysql_fetch_row($result)){
  		echo("
        <tr>
          <td>$data[0] </td>
          <td>$data[1]</td>
        </tr></br>");
	}

?> 