<?php
    require_once('header.php');
    
    if ($_POST["registerUser"] != "")
    {
        $username = $_POST["registerUser"];
        $userpassword = $_POST["registerNewPassword"];
        $confirmpassword = $_POST["registerConfirmPassword"];
        if ($userpassword == $confirmpassword)
        {
            if (Register($username, $regkey, $userpassword))
                $message = 'Great, you\'ve been registered. Head to your <a href="profile.php">profile page</a> to get started.';
        }
    }
?>

In order to register as a member of the Planet Money Refinance timeline you must be given a username and registration key.<br />

If you don't have one, you probably aren't going to get one, so you might as well just head to the <a href="index.php">main page</a> and enjoy the cool timeline.<br />

Or perhaps you're here to crack my server. In which case, godspeed. To me, not you, 'cause you'll probably succeed.

<hr />

<?=$error?>
<?php
    if ($message == '')
    print('<form id="login" action="login.php" method="post"> Username: <input type="text" name="registerUser" /> <br />
    Registration Key: <input type="text" name="registerRegKey" /> <br />
    New Password: <input type="password" name="registerNewPassword" /><br />
    Confirm New Password: <input type = "password" name="registerConfirmPassword" /><br /><br/>
    <input type="submit" name="submit" value="Register"/>
    </form>"');
    else
        print($message);
?>