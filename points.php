<?php
	include 'db_connect.php';
    // connecting to db
    $con = new DB_CONNECT();

    $sql="USE myankou_201401_cpsc481;";
    if (!mysql_query($sql)){
        die("Error using Database: " . mysql_error());
    }

	//$link = mysql_connect('mysql1.cs.clemson.edu','myankou','OmzCFQwT'); 
	/*if (!$con) { 
		die('Could not connect to MySQL: ' . mysql_error()); 
	} 
	echo 'Connection OK'; 
	echo '<br>';*/


if (!function_exists('json_encode'))
{
    function json_encode($a=false)
    {
        if (is_null($a)) return 'null';
        if ($a === false) return 'false';
        if ($a === true) return 'true';
        if (is_scalar($a))
        {
            if (is_float($a))
            {
                // Always use "." for floats.
                return floatval(str_replace(",", ".", strval($a)));
            }

            if (is_string($a))
            {
                static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
                return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
            }
            else
            return $a;
        }
        $isList = true;
        for ($i = 0, reset($a); $i < count($a); $i++, next($a))
        {
            if (key($a) !== $i)
            {
                $isList = false;
                break;
            }
        }
        $result = array();
        if ($isList)
        {
            foreach ($a as $v) $result[] = json_encode($v);
            return '[' . join(',', $result) . ']';
        }
        else
        {
            foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
            return '{' . join(',', $result) . '}';
        }
    }
}


	$sth = mysql_query("SELECT * FROM poi");
	$rows = array();
	while($r = mysql_fetch_assoc($sth)) {
    	$rows[] = $r;
	}
	print json_encode($rows);
?>