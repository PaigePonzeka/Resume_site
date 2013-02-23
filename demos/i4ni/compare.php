#!/usr/local/bin/php 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>i4Ni - Compare</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="subpage.css" rel="stylesheet" type="text/css" media="screen" />

</head>
<body>
<center>
<div id="wrapper">
<div id="banner"><img src="images/animated_banner.gif" /></div>

	<div id="header">
		<div id="logo">
        <p>“But if there is serious injury, you are to take life for life, <em>eye for eye</em>, tooth for tooth, hand for hand, foot for foot,  burn for burn, wound for wound, bruise for bruise."-Exodus 21:23-25</p>
			
		</div>
		<!-- end #logo -->
        </div>
		<div id="menu">
			<ul>
				<li><a href="index.html">Go To Stats Home Page</a></li>
				<li><a href="stats.html">Go Back</a></li>

			</ul>
		</div>
		<!-- end #menu -->
	
	<!-- end #header -->
	<div id="page">
		<div id="bgtop">
			<div id="bgbottom">
				<div id="content">
					<div class="post">
						<div class="title">
							<h2><a href="#">Compare Players</a></h2>
						</div>
						<div class="entry">
						<?php
 $dbms = 'mysqli';
$dbhost = '';
$dbport = '';
$dbname = 'allstark_aaahstats';
$dbuser = 'allstark_stats';
$dbpasswd = 'thenewclan';
$table_prefix = 'phpbb_';
$acm_type = 'file';
$load_extensions = '';
 /* Connecting, selecting database */
$link = mysql_connect("$dbhost", "$dbuser", "$dbpasswd") or die("Could not connect : " . mysql_error());

/* echo "Connected successfully"; -- for testing purposes */
mysql_select_db("$dbname") or die("Could not select database");

// Address error handing.
ini_set ('display_errors', 1);

error_reporting (E_ALL & ~E_NOTICE);
// set up a boolean (using 0 for false and 1 for true
$dataCheck = 1;

// In case register_globals is disabled.
$gamertag1 = $_POST['gamertag1'];
$gamertag2 = $_POST['gamertag2'];

/* Performing SQL query for first gamertag*/
$query_gamertag1 = "SELECT * FROM players WHERE players_gamerTag='$gamertag1'";
$result_gamertag1 = mysql_query($query_gamertag1) or die("Query failed : " . mysql_error());
$num_results1 = mysql_num_rows($result_gamertag1);
if ($num_results1 <= 0){
	echo "<higher> Error: Player: $gamertag1 Doesn't Exist </higher>";
	echo "	</div>
					</div>
					
				</div>
				<!-- end #content -->
				
				<!-- end #sidebar -->
				<div style=\"clear: both;\">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
	<div id=\"footer\">
		<p>Copyright (c) 2010 thei4niclan.com. 
	</div>
	<!-- end #footer -->
</div>
<!-- end #wrapper -->

</body>
</html>";

	exit();
}
/* Performing SQL query for first gamertag*/
/* Performing SQL query for second gamertag*/
$query_gamertag2 = "SELECT * FROM players WHERE players_gamerTag='$gamertag2'";
$result_gamertag2 = mysql_query($query_gamertag2) or die("Query failed : " . mysql_error());
$num_results2 = mysql_num_rows($result_gamertag2);
if ($num_results2 <= 0){
	echo "<higher> Error: Player: $gamertag2 Doesn't Exist </higher>";
	echo "	</div>
					</div>
					
				</div>
				<!-- end #content -->
				
				<!-- end #sidebar -->
				<div style=\"clear: both;\">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
	<div id=\"footer\">
		<p>Copyright (c) 2010 thei4niclan.com. 
	</div>
	<!-- end #footer -->
</div>
<!-- end #wrapper -->

</body>
</html>";

	exit();
}
$stats_gamertag1=array();
$value_gamertag1=0;
$imagesLocation="http://www.thei4niclan.com/images/medals/";

 while ($line_gamertag1 = mysql_fetch_array($result_gamertag1, MYSQL_ASSOC)) {
    foreach ($line_gamertag1 as $col_value_gamertag1) {
	$stats_gamertag1[$value_gamertag1]=$col_value_gamertag1;
	$value_gamertag1++;
      }
      }
	   if($stats_gamertag1[3]=0)
	  {
		  $killDeath_gamertag1=$stats_gamertag1[2] / $stats_gamertag1[3];
	  }
	  else
	  {
		   $killDeath_gamertag1=$stats_gamertag1[2]; 
	  }
	  if($stats_gamertag1[2]!=0)
	  {
		   $headshotKill_gamertag1=$stats_gamertag1[5]/$stats_gamertag1[2];
	  }
	  else
	  {
		 $headshotKill_gamertag1=$stats_gamertag1[5];
	  }

	  


$stats_gamertag2=array();
$value_gamertag2=0;


 while ($line_gamertag2 = mysql_fetch_array($result_gamertag2, MYSQL_ASSOC)) {
    foreach ($line_gamertag2 as $col_value_gamertag2) {
	$stats_gamertag2[$value_gamertag2]=$col_value_gamertag2;
	$value_gamertag2++;
      }
      }
	   if($stats_gamertag2[3]!=0)
	  {
		 $killDeath_gamertag2=$stats_gamertag2[2] / $stats_gamertag2[3];
	  }
	  else
	  {
		   $killDeath_gamertag2=$stats_gamertag2[2]; 
	  }
	  if($stats_gamertag2[2]!=0)
	  {
		    $headshotKill_gamertag2=$stats_gamertag2[5]/$stats_gamertag2[2];
	  }
	  else
	  {
		  $headshotKill_gamertag2=$stats_gamertag2[5];
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
	//print the first part of the player comparision table
	echo "<center> \n
		
		<table border='.5' width='600px'>
        	<tr><th>GamerTag:</th>	<td>$gamertag1</td>	<td>$gamertag2</td></th></tr>
			
            <tr><th>Time:</th>	<td>"; 
			//compare and print TIME (higher values have the "higher" attribute (located in player_stat.css)
			//check and compare player 1
			if($stats_gamertag1[6]>$stats_gamertag2[6]){
				echo "<higher>$stats_gamertag1[6]</higher>";
			}
			else{
				echo "$stats_gamertag1[6]";
			}
			//end column...start new column
			echo "</td><td>";
			//check and compare player 2
			;
			if($stats_gamertag2[6]>$stats_gamertag1[6]){
				echo "<higher>$stats_gamertag2[6]</higher>";
			}
			else{
				echo "$stats_gamertag2[6]";
			}
			//end row
			
			//format scores String
			$scores1=number_format($stats_gamertag1[1]);
			$scores2=number_format($stats_gamertag2[1]);
			echo "<tr><th>Scores:</th>	<td>"; 
			//compare and print SCORES (higher values have the "higher" attribute (located in player_stat.css)
			//check and compare player 1
			if($stats_gamertag1[1]>$stats_gamertag2[1]){
				echo "<higher>$scores1</higher>";
			}
			else{
				echo "$scores1";
			}
			//end column...start new column
			echo "</td><td>";
			//check and compare player 2
			if($stats_gamertag2[1]>$stats_gamertag1[1]){
				echo "<higher>$scores2</higher>";
			}
			else{
				echo "$scores2";
			}
			//end row
			echo "</td></th></tr>\n";
			
			//format Kills String
			$kills1=number_format($stats_gamertag1[2]);
			$kills2=number_format($stats_gamertag2[2]);
			echo "<tr><th>Kills:</th>	<td>"; 
			//compare and print KILLS (higher values have the "higher" attribute (located in player_stat.css)
			//check and compare player 1
			if($stats_gamertag1[2]>$stats_gamertag2[2]){
				echo "<higher>$kills1</higher>";
			}
			else{
				echo "$kills1";
			}
			//end column...start new column
			echo "</td><td>";
			//check and compare player 2
			if($stats_gamertag2[2]>$stats_gamertag1[2]){
				echo "<higher>$kills2</higher>";
			}
			else{
				echo "$kills2";
			}
			//end row
			echo "</td></th></tr>\n";
			
			//format DEATHS String
			$deaths1=number_format($stats_gamertag1[3]);
			$deaths2=number_format($stats_gamertag2[3]);
			echo "<tr><th>Deaths:</th>	<td>"; 
			//compare and print DEATHS (lower values have the "higher" attribute (located in player_stat.css)
			//check and compare player 1
			if($stats_gamertag1[3]<$stats_gamertag2[3]){
				echo "<higher>$deaths1</higher>";
			}
			else{
				echo "$deaths1";
			}
			//end column...start new column
			echo "</td><td>";
			//check and compare player 2
			if($stats_gamertag2[3]<$stats_gamertag1[3]){
				echo "<higher>$deaths2</higher>";
			}
			else{
				echo "$deaths2";
			}
			//end row
			echo "</td></th></tr>\n";
			
			//format ASSISTS String
			$assists1=number_format($stats_gamertag1[4]);
			$assists2=number_format($stats_gamertag2[4]);
			echo "<tr><th>Assists:</th>	<td>"; 
			//compare and print Assists (higher values have the "higher" attribute (located in player_stat.css)
			//check and compare player 1
			if($stats_gamertag1[4]>$stats_gamertag2[4]){
				echo "<higher>$assists1</higher>";
			}
			else{
				echo "$assists1";
			}
			//end column...start new column
			echo "</td><td>";
			//check and compare player 2
			if($stats_gamertag2[4]>$stats_gamertag1[4]){
				echo "<higher>$assists2</higher>";
			}
			else{
				echo "$assists2";
			}
			//end row
			echo "</td></th></tr>\n";
			
			//format headshots String
			$headshots1=number_format($stats_gamertag1[5]);
			$headshots2=number_format($stats_gamertag2[5]);
			echo "<tr><th>Headshots:</th>	<td>"; 
			//compare and print HEADSHOTS (higher values have the "higher" attribute (located in player_stat.css)
			//check and compare player 1
			if($stats_gamertag1[5]>$stats_gamertag2[5]){
				echo "<higher>$headshots1</higher>";
			}
			else{
				echo "$headshots1";
			}
			//end column...start new column
			echo "</td><td>";
			//check and compare player 2
			if($stats_gamertag2[5]>$stats_gamertag1[5]){
				echo "<higher>$headshots2</higher>";
			}
			else{
				echo "$headshots2";
			}
			//end row
			echo "</td></th></tr>\n";
			
			echo "<tr><th>Kill/Death:</th>	<td>"; 
			//compare and print KILL/DEATH RATIO (higher values have the "higher" attribute (located in player_stat.css)
			//check and compare player 1
			$killDeath1=number_format  ($killDeath_gamertag1,3);
			if($killDeath_gamertag1>$killDeath_gamertag2){
				echo "<higher>$killDeath1</higher>";
			}
			else{
				echo "$killDeath1";
			}
			//end column...start new column
			echo "</td><td>";
			//check and compare player 2
			$killDeath2=number_format  ($killDeath_gamertag2,3);
			if($killDeath_gamertag2>$killDeath_gamertag1){
				echo "<higher>$killDeath2</higher>";
			}
			else{
				echo "$killDeath2";
			}
			//end row
			echo "</td></th></tr>\n";
			echo "
         
            <!--<tr><th>Total Medals:</th>	<td>4200</td>	<td>25512</td></th></tr>-->
            
        </table>
      
        </center>";
	
  /* Free resultset */
  mysql_free_result($result_gamertag1);
  mysql_free_result($result_gamertag2);

 /* Closing connection */
mysql_close($link);

?>
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
	<div id="footer">
		<p>Copyright (c) 2010 thei4niclan.com. 
	</div>
	<!-- end #footer -->
</div>
<!-- end #wrapper -->

</body>
</html>
