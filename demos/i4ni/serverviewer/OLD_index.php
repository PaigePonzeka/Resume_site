
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>i4Ni-Server Viewer</title>
    <link href="http://www.thei4niclan.com/subpage.css" rel="stylesheet" type="text/css" media="screen" />
     <?php require("../meta.php");?>


<?php require("../body.php");?>
 

<script type="text/javascript">
<!--
function HideFrame(element) {
  var fr = document.getElementById (element);
if(fr.style.display=="none") {
   fr.style.display="block";
}
else {
   fr.style.display="none";
  }
 }
//-->
</script>

</head>

<body>

<?php
require("aaah.php");
$numOfServers=count($aaahServer);
for($i=0;$i<$numOfServers;$i+=1)
{

	echo "<div style=\"width:200px;
     line-height:30px;
     font-family:verdana,arial,helvetica,sans-serif;
     font-size:16px;
     color:#666;
     text-align:center;
     background-color:#eee;
     border:3px double #666;
     cursor:pointer;\" onclick=\"HideFrame('$aaahServer[$i]')\">$aaahServer[$i]</div>";
	echo "<iframe style=\"display:none\" width=425px height=555px id=\"$aaahServer[$i]\" src=\"http://www.diablovixen.com/servers/aaah/$aaahServer[$i].php\" frameborder=\"0\" ></iframe>";
	}
?>
<?php
require("i4ni.php");
$numOfServers=count($i4niServer);
for($i=0;$i<$numOfServers;$i+=1)
{
	echo "<div style=\"width:200px;
     line-height:30px;
     font-family:verdana,arial,helvetica,sans-serif;
     font-size:16px;
     color:#666;
     text-align:center;
     background-color:#eee;
     border:3px double #666;
     cursor:pointer;\" onclick=\"HideFrame('$i4niServer[$i]')\">$i4niServer[$i]</div>";
	echo "<iframe style=\"display:none\" width=425px height=555px id=\"$i4niServer[$i]\" src=\"http://www.diablovixen.com/servers/i4ni/$i4niServer[$i].php\" frameborder=\"0\" ></iframe>";
	}
?>

</body>
</html>