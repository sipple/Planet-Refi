<?php
// This file is used to establish a connection to the MySql Database
// It verifies the user-provided username and password are valid for
// this site and, if not, kills the connection and returns an error

// Set the database access variables
// Consider moving this information into a file not stored in souce control
    // Database connection info
$dbfilename='../planetrefidb.txt';
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