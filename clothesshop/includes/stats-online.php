<?php 
//ini_set('error_reporting', E_ALL);
$ip = $_SERVER['REMOTE_ADDR'];
$mins = 15;//number of mins to consider an active session


//first delete inactive records
$query = mysql_query("DELETE  FROM visitors_online where visitor_time < NOW() - INTERVAL 20 MINUTE "); 

$query = mysql_query("SELECT * FROM visitors_online where visitor_ip = '$ip' and visitor_time >= NOW() - INTERVAL ". $mins  ." MINUTE "); //see if they are already logged

if (@mysql_num_rows($query) == 0){// no entry found for this ip and time
$query = "INSERT into visitors_online  (visitor_ip, visitor_time) VALUES ( '$ip', now() )";
	mysql_query($query, CONNECTION ) or die(mysql_error());
	}
	else{
		$query = "UPDATE visitors_online SET visitor_time = now() where visitor_ip = '$ip'";
		mysql_query($query, CONNECTION ) or die(mysql_error());
		}




?>