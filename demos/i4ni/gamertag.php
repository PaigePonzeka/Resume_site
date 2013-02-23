<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>i4Ni-Player Card</title>
    <link href="subpage.css" rel="stylesheet" type="text/css" media="screen" />
    <?php require("meta.php");?>


<?php require("body.php");?>

<?php require_once("navbar.php"); ?>
 <!-- end #header -->
	<div id="page">
		<div id="bgtop">
			<div id="bgbottom">
				<div id="content">
					<div class="post">
						<div class="title">
							<h2><a href="#">View Player Info</a></h2>
						</div>
						<div class="entry">
	<?php require("config.php");?>
<?php

// In case register_globals is disabled.
$gamertag = $_GET['country'];


/* Performing SQL query */
$query = "SELECT * FROM players WHERE gamertag='$gamertag'";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
$num_results = mysql_num_rows($result);
if ($num_results > 0){
echo $row['category'];

$stats=array();
$value=0;
$imagesLocation="http://www.thei4niclan.com/images/medals/";

 while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    foreach ($line as $col_value) {
	$stats[$value]=$col_value;
	$value++;
      }
      }
	  if($stats[3]!=0)
	  {
		  $killDeath=$stats[2] / $stats[3];
	  }
	  else
	  {
		   $killDeath=$stats[2];
	  }
	  if($stats[2]!=0)
	  {
		   $headshotKill=$stats[8]/$stats[2];
	  }
	  else
	  {
		  $headshotKill=$stats[8];
	  }


//create images gif names array
$imagesName[20]=array();
	$imagesNames[0]="double.gif";
	$imagesNames[1]="triple.gif";
	$imagesNames[2]="tacular.gif";
	$imagesNames[3]="frenzy.gif";
	$imagesNames[4]="trocity.gif";
	$imagesNames[5]="manjaro.gif";
	$imagesNames[6]="spree.gif";
	$imagesNames[7]="riot.gif";
	$imagesNames[8]="rampage.gif";
	$imagesNames[9]= "beserker.gif";
	$imagesNames[10]="overkill.gif";
	$imagesNames[11]="sniper.gif";
	$imagesNames[12]="stick.gif";
	$imagesNames[13]="beatdown.gif";
	$imagesNames[14]="assassin.gif";
	$imagesNames[15]="splatter.gif";
	$imagesNames[16]="hijack.gif";
	$imagesNames[17]="flagk.gif";
	$imagesNames[18]="flagr.gif";
	$imagesNames[19]="flagt.gif";
//format all numbers to strings
$killDeath2=number_format($killDeath,3);
$headshotKill2=number_format($headshotKill,3);
$kills=number_format($stats[2]);
$deaths=number_format($stats[3]);
$assists=number_format($stats[4]);
$headshots=number_format($stats[8]);

//Echo the values to the webpage
echo "<h2>$gamertag</h2>\n";
		echo"<p>Time on Server: $stats[6]&nbsp; &nbsp;Scores: $stats[1]</p>\n";

        	echo"<p>Kills: $kills <br />\n
        		Deaths: $deaths<br />\n
        		Assists: $assists<br />\n
        		Headshots: $headshots</p>\n";


        	echo "<p>Kill/Death: $killDeath2</p>\n
        	<p>Headshot/Kill: $headshotKill2</p>\n";

		  /*  echo "<center>
            <table>
           <tr>";
		for($counter=0; $counter<=19; $counter++){
			echo "<td><img src=\"$imagesLocation$imagesNames[$counter]\" /></td> \n";
			$nextStatInArray=$counter+7;
			 echo "
            			<td>$stats[$nextStatInArray]</td>";
			if ($counter==5){
				echo "</tr> <tr>";
			}
			if ($counter==10){
				echo "</tr> <tr>";
			}
			if ($counter==16){
				echo "</tr> <tr>";
			}

		}
            echo "</tr>
            </table>
        	</center>";*/
			}else{
echo '<higher>This Player Does Not Exist Please Check Your Input, Also Make Sure there are no Spaces Before the Name. <br /> </higher><a href="stats.html"> Click Here To Try Again</a>';
}
  /* Free resultset */
  mysql_free_result($result);

 /* Closing connection */
mysql_close($link);

?>




							</div>





						</div>
					</div>

				</div>
				<!-- end #content -->

				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
	<?php require("footer.php");?>
	<!-- end #footer -->
</div>


<!-- end #wrapper -->

<!-- end #wrapper -->

</body>
</html>