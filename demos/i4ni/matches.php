<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>i4Ni-Matches Per Map</title>
    <link href="http://www.thei4niclan.com/subpage.css" rel="stylesheet" type="text/css" media="screen" />
    
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <?php
	//loads the mysql configure php file
	    require("config.php");
		//load the maps name array
		
    
echo "<script type=\"text/javascript\">";
require("maps.php");
	echo "var visualization;
	  var data = new google.visualization.DataTable();

	function selected()
	{
    	var selection =visualization.getSelection();
	 	for (var i = 0; i < selection.length; i++) {
   			 var item = selection[i];
    		if (item.row != null && item.column != null) {
      			message += '{row:' + item.row + ',column:' + item.column + '}';
    		} 
			else if (item.row != null) {
      			message += '{row:' + item.row + '}';
    		} 
			else if (item.column != null) {
      			message += '{column:' + item.column + '}';
    		}
  		}
  		if (message == '') {
    		message = 'nothing';
  		}
  		alert('You selected ' + message);
	}
function drawVisualization() {
        // Create and populate the data table.
        data.addColumn('string', 'Map');
        data.addColumn('number', 'Matches Per Map');
";
	  //call the mysql queries for each map value and set the array
	  $maps_count;

		// In case register_globals is disabled.
		for($i=0; $i<sizeof($maps); $i+=1)
		{
		/* Performing SQL query for first gamertag*/
			$query = "SELECT COUNT(map) FROM matches WHERE map='$maps[$i]'";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());

			$num_results= mysql_num_rows($result);
		
 		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    		foreach ($line as $col_value) {
				//echo "$maps[$i]";
				//echo "$col_value \n";
				$maps_count[$i]=$col_value;
			}
 		}
 		mysql_free_result($result);
		}
		$maps_used;
	  //echo the javascript function to draw the pieChart Value
		echo "data.addRows(".sizeof($maps).");\n";
		//$used=0;
		for($j=0;$j<sizeof($maps);$j+=1)
				{
					echo "data.setValue(".$j.","."0".",'".$maps[$j]."'); \n";
					echo "data.setValue(".$j.","."1".",".$maps_count[$j]."); \n";
					
				}
			
			
     
	  //echo the options
  		echo "var options = {cht: 'p3', title: 'Matches Per Map', chp: 0.628, chs: '800x800',";
		
		//echo the color options (stored in the maps.php)
		echo "colors:[";
				for($k=0;$k<sizeof($map_colors);$k+=1)
				{
					echo "'".$map_colors[$k]."'";
					if($k<(sizeof($map_colors)-1))
					{
						echo ",\n";
					}
					
				}
				echo "]};\n";

        // Create and draw the visualization.
      echo "visualization= new google.visualization.PieChart(document.getElementById('visualization'));
		google.visualization.events.addListener(visualization, 'select', myClickHandler);
           visualization.draw(data, options);}";

	
    
      

     echo "function myClickHandler(){
		
  var selection = visualization.getSelection();";
  	echo "for (var i = 0; i < selection.length; i++) {
    			var item = selection[i];
				var newPlace=mapsArray[item.row];
				var newURL=\"map.php?map=\";		
				var newURL=newURL.concat(newPlace);
				
				window.document.location.href = newURL;
	
  			}}";

  echo "google.setOnLoadCallback(drawVisualization);

    </script>";
    ?>
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
							<h2><a href="#">View Match Info</a></h2>
						</div>
						<div class="entry">
  <body style="font-family: Arial;border: 0 none;">
    <div id="visualization" style="width: 900px; height: 800px;"></div>
                
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
