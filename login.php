<?php
    $pageTitle = "Planet Money Race to Refinance";
    require_once('header.php');
?>

<br />
<?=$error?>
<form id="login" action="login.php" method="post">
Username: <input type="text" name="user" /><br />
Password: <input type="password" name="password" /> <br /><br />
<input type="submit" name="submit" value="Log In"/>
</form>

<?php
    require_once("footer.php");
?>
