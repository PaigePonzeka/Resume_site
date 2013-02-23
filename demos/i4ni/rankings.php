<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>i4Ni-Rankings</title>
    <link href="subpage.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="rankings.css" rel="stylesheet" type="text/css" media="screen" />

      <?php require("meta.php");?>


<?php require("body.php");?>
 
<?php require_once("navbar.php"); ?>

<div id="page">
		<div id="bgtop">
			<div id="bgbottom">
				<div id="content">
				  <div class="post">
				    <div class="title">
							<h2><a href="#">Player Rankings</a></h2>
				    </div>
                    <div class="wrapper">
					<div class="left">

						<!--<div class="entry">-->
                        
                        <?php
						require("config.php");
						
						
						$query = "SELECT gamertag,kills FROM players ORDER BY kills DESC LIMIT 10";
						$result = mysql_query($query) or die("Query failed : " . mysql_error());
						$num = mysql_num_rows($result);
						if ($num <= 0){
							echo "<p> ERROR </p>";
						}
						else
						{
							$count=0;
							echo "<table>\n<th colspan=\"3\">Top Kills</th> <tr><td><h1>Rank</h1></td><td><h1>Player Name</h1></td><td><h1>Total Kills</h1></td></tr>";
							while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
								$count++;
								echo "<tr><td> $count </td>";
    							foreach ($line as $col_value) {
									
									echo "<td>$col_value</td>"; 
     						 }
							 echo "</tr> \n";
      							}
							echo "</table>\n";
						}
						
						
						?>
                       </div>
                      <div class="right">
                        <?php
						$query = "SELECT gamertag,scores FROM players ORDER BY scores DESC LIMIT 10";
						$result = mysql_query($query) or die("Query failed : " . mysql_error());
						$num = mysql_num_rows($result);
						if ($num <= 0){
							echo "<p> ERROR </p>";
						}
						else
						{
							$count=0;
							echo "<table>\n<th colspan=\"3\">Top Scores</th> <tr><td><h1>Rank</h1></td><td><h1>Player Name</h1></td><td><h1>Total Scores</h1></td></tr>";
							while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
								$count++;
								echo "<tr><td> $count </td>";
    							foreach ($line as $col_value) {
									
									echo "<td>$col_value</td>"; 
     						 }
							 echo "</tr> \n";
      							}
							echo "</table>\n";
						}
						
						
						?>
                      </div>
					  
				</div>

                     <div class="wrapper">
					<div class="left">

						<!--<div class="entry">-->
                        
                        <?php
						
						$query = "SELECT gamertag,totalMedals FROM players ORDER BY totalMedals DESC LIMIT 10";
						$result = mysql_query($query) or die("Query failed : " . mysql_error());
						$num = mysql_num_rows($result);
						if ($num <= 0){
							echo "<p> ERROR </p>";
						}
						else
						{
							$count=0;
							echo "<table>\n<th colspan=\"3\">Top Medal Count</th> <tr><td><h1>Rank</h1></td><td><h1>Player Name</h1></td><td><h1>Total Medals</h1></td></tr>";
							while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
								$count++;
								echo "<tr><td> $count </td>";
    							foreach ($line as $col_value) {
									
									echo "<td>$col_value</td>"; 
     						 }
							 echo "</tr> \n";
      							}
							echo "</table>\n";
						}
						
						
						?>
                       </div>
                      <div class="right">
                        <?php
						$query = "SELECT gamertag,wins FROM players ORDER BY wins DESC LIMIT 10";
						$result = mysql_query($query) or die("Query failed : " . mysql_error());
						$num = mysql_num_rows($result);
						if ($num <= 0){
							echo "<p> ERROR </p>";
						}
						else
						{
							$count=0;
							echo "<table>\n<th colspan=\"3\">Most Wins</th> <tr><td><h1>Rank</h1></td><td><h1>Player Name</h1></td><td><h1>Most Wins</h1></td></tr>";
							while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
								$count++;
								echo "<tr><td> $count </td>";
    							foreach ($line as $col_value) {
									
									echo "<td>$col_value</td>"; 
     						 }
							 echo "</tr> \n";
      							}
							echo "</table>\n";
						}
						
						
						?>
                      </div>
					  
				</div>
                <div class="wrapper">
					<div class="left">

						<!--<div class="entry">-->
                        
                        <?php
						
						
						
						$query = "SELECT gamertag,assists FROM players ORDER BY assists DESC LIMIT 10";
						$result = mysql_query($query) or die("Query failed : " . mysql_error());
						$num = mysql_num_rows($result);
						if ($num <= 0){
							echo "<p> ERROR </p>";
						}
						else
						{
							$count=0;
							echo "<table>\n<th colspan=\"3\">Top Assists</th> <tr><td><h1>Rank</h1></td><td><h1>Player Name</h1></td><td><h1>Total Assists</h1></td></tr>";
							while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
								$count++;
								echo "<tr><td> $count </td>";
    							foreach ($line as $col_value) {
									
									echo "<td>$col_value</td>"; 
     						 }
							 echo "</tr> \n";
      							}
							echo "</table>\n";
						}
						
						
						?>
                       </div>
                      <div class="right">
                        <?php
						$query = "SELECT gamertag,headshots FROM players ORDER BY headshots DESC LIMIT 10";
						$result = mysql_query($query) or die("Query failed : " . mysql_error());
						$num = mysql_num_rows($result);
						if ($num <= 0){
							echo "<p> ERROR </p>";
						}
						else
						{
							$count=0;
							echo "<table>\n<th colspan=\"3\">Top Headshots</th> <tr><td><h1>Rank</h1></td><td><h1>Player Name</h1></td><td><h1>Total Headshots</h1></td></tr>";
							while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
								$count++;
								echo "<tr><td> $count </td>";
    							foreach ($line as $col_value) {
									
									echo "<td>$col_value</td>"; 
     						 }
							 echo "</tr> \n";
      							}
							echo "</table>\n";
						}
						
						
						?>
                      </div>
					  
				</div>
                
                <div class="wrapper">
					<div class="left">

						<!--Calculate Kill to Death Ratio-->
                        <!-- read each players Kills and Death Ratio add to new mysql database then display top killsdeath-->
                        <?php 
						$query = "SELECT gamertag,killdeath FROM killdeath ORDER BY killdeath DESC LIMIT 10";
						$result = mysql_query($query) or die("Query failed : " . mysql_error());
						$num = mysql_num_rows($result);
						if ($num <= 0){
							echo "<p> ERROR </p>";
						}
						else
						{
							$count=0;
							echo "<table>\n<th colspan=\"3\">Kill/Death Ratio Leaders</th> <tr><td>Rank</td><td><h1>Player Name</h1></td><td><h1>KillDeath</h1></td><td></tr>";
							while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
								$count++;
								echo "<tr><td> $count </td>";
    							foreach ($line as $col_value) {
									
									echo "<td>$col_value</td>"; 
     						 }
							 echo "</tr> \n";
      							}
							echo "</table>\n";
						}
						
						/*$query = "SELECT gamertag,kills,deaths FROM players";
						$result = mysql_query($query) or die("Query failed : " . mysql_error());
						$num = mysql_num_rows($result);
						if ($num <= 0){
							echo "<p> ERROR </p>";
						}
						else
						{
							$count=0;
							echo "<table>\n<th colspan=\"3\">Top Assists</th> <tr><td><h1>Rank</h1></td><td><h1>Player Name</h1></td><td><h1>Total Assists</h1></td></tr>";
							while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
								$count++;
								//echo "<tr><td> $count </td>";
								//$line as $col_value;
								//$gamer=$col_value;
								//$kills=$line[1];
								//$deaths=$line[2];
								$player;
								//echo "Kills= $kills   Gamer=$gamer     deaths=$deaths";
								$num = 0;
    							foreach ($line as $col_value) {
									$player[$num]=$col_value;
									echo "PLAYER DETAILS! $player[$num]"; 
									$num++;
     						 }
							 $killdeath=0;
							 	if ($player[2]==0)//if the num of deaths =0
								{//the kill to death ratio is just equal to num of deaths
									$killdeath=$player[1];
								}
								else//just calculate the kill death from both values 
								{
									$killdeath=$player[1]/$player[2];
								}
								$format=number_format($killdeath, 3);
								//echo "Killdeath= $format";
								$insert = "INSERT INTO killdeath VALUES (\"$player[0]\", $format)";
								echo $insert;
						$insertRes = mysql_query($insert) or die("Query failed : " . mysql_error());*/

						?>
                       </div>
                      <div class="right">
                        <?php
						$query = "SELECT gamertag,headshots FROM players ORDER BY headshots DESC LIMIT 10";
						$result = mysql_query($query) or die("Query failed : " . mysql_error());
						$num = mysql_num_rows($result);
						if ($num <= 0){
							echo "<p> ERROR </p>";
						}
						else
						{
							$count=0;
							echo "<table>\n<th colspan=\"3\">Top Headshots</th> <tr><td><h1>Rank</h1></td><td><h1>Player Name</h1></td><td><h1>Total Headshots</h1></td></tr>";
							while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
								$count++;
								echo "<tr><td> $count </td>";
    							foreach ($line as $col_value) {
									
									echo "<td>$col_value</td>"; 
     						 }
							 echo "</tr> \n";
      							}
							echo "</table>\n";
						}
						
						
						?>
                      </div>
					  
				</div>
                           
				  </div>
					</div>
		
				</div>
				<!-- end #content -->
				<?php mysql_close($link);?>
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

