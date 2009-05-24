<?php
// This page is depricated and will be removed from the project once I figure
// out how you do that in git.

$dbfilename='../../planetrefidb.txt';
$dbfile = fopen($dbfilename, "r");
$dbuser=trim(fgets($dbfile));
$dbpassword=trim(fgets($dbfile));
$dbhost=trim(fgets($dbfile));
$dbname=trim(fgets($dbfile));
    
DEFINE('DB_USER', $dbuser);
DEFINE('DB_PASSWORD', $dbpassword);
DEFINE('DB_HOST', $dbhost);
DEFINE('DB_NAME', $dbname);

// Make the database connection
$dbc = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to
                                                         MySQL: ' . $dbuser . mysql_error());

// Select the database
@mysql_select_db(DB_NAME) OR die ('Could not select the database: ' . mysql_error());

?>