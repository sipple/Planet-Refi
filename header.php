<?php
    /* $Id: episode.php 10 2008-07-13 19:07:29Z saalon $ */
    
    session_start();
    
    // Yes I will eventually merge this into one config file
    require_once("library_main.php");
    
    if ($_POST["user"] != "")
    {
        $username = trim($_POST["user"]);
        $userpassword = trim($_POST["password"]);
        
        if (Login($username, $userpassword))
            header('Location: index.php');
        else
            $error = 'Invalid Username/Password';
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" type="text/css" href="screen.css" media="screen" />
    <script src="http://static.simile.mit.edu/timeline/api-2.3.0/timeline-api.js?bundle=true" type="text/javascript"></script>
    <script src="timeline.js" type="text/javascript"></script>
</head>
<body onload="onLoad();" onresize="onResize();">
    <?=$errorDb ?>
    <div id="maincontent">
        <h1><a href="http://saalonmuyo.com/planetrefi/index.php">The Planet Money Listener Refinance Timelime</a></h1>

      <p class="navigation"><?php LoadNavBar(); ?></p>
