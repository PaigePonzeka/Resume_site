
                                
                                <?php
$dbms = 'mysqli';
$dbhost = '';
$dbport = '';
$dbname = 'allstark_misc';
$dbuser = 'allstark_user';
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
$query =  "SELECT gamertag FROM roster";
//"SELECT '$sortkeyField', 'players_gamertag' FROM 'players' ORDER BY '$sortkeyField' DESC LIMIT 15 \n";
//echo  $query;
$result = mysql_query($query) or die("Query failed ".mysql_error());

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    foreach($line as $col_value) {
        echo "<iframe src=\"http://gamercard.xbox.com/$col_value.card\" scrolling=\"no\" frameBorder=\"0\" height=\"140\" width=\"204\"></iframe>";
        }
   }



mysql_free_result($result);
mysql_close($link);
?>
