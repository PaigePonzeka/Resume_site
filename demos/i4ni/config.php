
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

?>
