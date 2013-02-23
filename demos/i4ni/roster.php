
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>i4Ni-Roster</title>
    <link href="http://www.thei4niclan.com/subpage.css" rel="stylesheet" type="text/css" media="screen" />
    
     <?php require("meta.php");?>


<?php require("body.php");?>
 
<?php require_once("navbar.php"); ?>
<div id="page">
		<div id="bgtop">
			<div id="bgbottom">
				<div id="content">
					<div class="post">
						<div class="title">
							<h2><a href="#">Clan Roster</a></h2>
						</div>
                                                      
                                <?php
$dbms = 'mysqli';
$dbhost = '';
$dbport = '';
$dbname = 'ponzekac_i4ni';
$dbuser = 'ponzekac_thei4ni';
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
$sortkey=$_POST['sortkey'];
$sortkeyField = "players_$sortkey";
//echo "<p>Sorted by $sortkey</p>\n";
$query =  "SELECT gamertag FROM roster ORDER BY gamertag ASC";
//"SELECT '$sortkeyField', 'players_gamertag' FROM 'players' ORDER BY '$sortkeyField' DESC LIMIT 15 \n";
//echo  $query;
$result = mysql_query($query) or die("Query failed ".mysql_error());

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    foreach($line as $col_value) {
        //echo "<iframe src=\"http://card.mygamercard.net/geothermal/green/$col_value.card\" scrolling=\"no\" frameBorder=\"0\" height=\"140\" width=\"204\"></iframe>";
		echo "<div id='gamercard'> $col_value </div>";
        }
   }



mysql_free_result($result);
mysql_close($link);
?>
						
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




</body>
</html>
