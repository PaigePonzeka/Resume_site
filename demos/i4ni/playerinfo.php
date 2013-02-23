<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>i4Ni-Player Info</title>
    <link href="http://www.thei4niclan.com/subpage.css" rel="stylesheet" type="text/css" media="screen" />
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
							<h2><a href="#">View Player Stats</a></h2>
						</div>
						<div class="entry">
		<form action="gamertag.php" method="get">
		
			<center><table border="0">
				<tr>
					<td><label for="country">Insert GamerTag: </label></td>
					<td><input type="text" id="country" name="country" value="" onkeyup="ajax_showOptions(this,'getCountriesByLetters',event)">
					<input type="hidden" id="country_hidden" name="country_ID"><!-- THE ID OF the country will be inserted into this hidden input --></td>
                    <td><input type="submit" name="submit" value="Submit" /></td>
				</tr>	
			</table></center>	

		
		</form>

				
       
                      

                      
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
