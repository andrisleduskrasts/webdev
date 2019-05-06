<?php 
include("includes/conexion.php");
include('header.php');
include("includes/mensajes.php");

function nicetime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
   
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
   
    $now             = time();
    $unix_date         = strtotime($date);
   
       // check validity of date
    if(empty($unix_date)) {   
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {   
        $difference     = $now - $unix_date;
        $tense         = "ago";
       
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
   
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
   
    $difference = round($difference);
   
    if($difference != 1) {
        $periods[$j].= "s";
    }
   
    return "$difference $periods[$j] {$tense}";
}


?>


  
  
    <div class="content">	
	
		<div class="inner">
    		
    			<div class="dashTitle"><h2>Dashboard</h2></div>
			<span class="last">
         		<div class="siteInfo">
		  	<p>You are logged in using <?php echo $_SERVER['REMOTE_ADDR']?>. <br />
			CMS version <?php echo $version ?> which was last updated <?php echo $updated ?>           
	  <p>Please select a menu item on the left to continue.</p>

          		
<div class="statsTitle"><h2>Website Stats</h2></div>
<?php //stats
$query = mysql_query("SELECT * FROM visitors_online where  visitor_time >= NOW() - INTERVAL 15 MINUTE " , CONNECTION ); //see if they are already logged
$num_onine = mysql_num_rows($query);
?>
<?php if ( $num_onine <1){?>
<p>There aren't currently any visitors on the site.</p>
<?php } else if ( $num_onine ==1) {?>
<p>The site has 1 visitor online at present</p>
<?php } else{ ?>
<p>There are <?php echo $num_onine ?> visitors online.</p>
<?php } ?>
<p><a href="?refresh=<?php echo rand(0,99999); ?>">Click here to refresh these stats</a></p>

<?php if ($num_onine>0) { //list the users ?>
<hr>
<table width="500">
<tr>
<td><strong>Visitor IP</strong></td>
<td><strong>Last Activity</strong></td>
</tr>
<?php  
while($dr = mysql_fetch_array($query)){
	
	
echo "<tr>";
echo "<td>" . $dr["visitor_ip"] . "</td>";
echo "<td>" . nicetime($dr["visitor_time"]) . "</td>";
echo "</tr>";
}

}
?>


		</div>
		</div>
		
    </div><!--fin content-->
    


    



   <?php include('footer.php');?>

	