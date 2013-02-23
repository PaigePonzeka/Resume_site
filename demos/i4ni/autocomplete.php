<?
<?
 $dbms = 'mysqli';
$dbhost = '';
$dbport = '';
$dbname = 'allstark_stats';
$dbuser = 'allstark_stats';
$dbpasswd = 'thenewclan';
$table_prefix = 'phpbb_';
$acm_type = 'file';
$load_extensions = '';
 /* Connecting, selecting database */

$conn = mysql_connect("localhost","$dbuser","$dbpasswd");
mysql_select_db("$dbname",$conn);

if(isset($_GET['getCountriesByLetters']) && isset($_GET['letters'])){
	$letters = $_GET['letters'];
	$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
	$res = mysql_query("SELECT players_gamerTag FROM players WHERE gamertag LIKE '".$letters."%'") or die(mysql_error());
	#echo "1###select ID,countryName from ajax_countries where countryName like '".$letters."%'|";
	while($inf = mysql_fetch_array($res)){
		echo $inf["players_gamerTag"]."|";
	}	
}
?>

