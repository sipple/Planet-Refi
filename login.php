<?php
    require_once('header.php');
?>

<?=$error?>
<form id="login" action="login.php" method="post">
Username: <input type="text" name="user" />
Password: <input type="password" name="password" /> <br /><br />
<input type="submit" name="submit" value="Log In"/>
</form>
