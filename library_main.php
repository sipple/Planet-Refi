<?php


function logout()
{
    if ($_SESSION['loggedIn'] == 1)
    {
        //session variable is registered, the user is ready to logout 
        session_unset(); 
        session_destroy(); 
    }
}

function Login($username, $userpassword)
{
    $success = false;
    
    // Check the username and password
    $results = @mysql_query("SELECT password FROM users WHERE username='" . $username . "'");
    
    $resultsArray = mysql_fetch_assoc($results);
    $storedPassword = $resultsArray['password'];
    // If the password does not match, close the db connection
    if ($storedPassword == md5($userpassword))
    {
        $_SESSION['loggedIn'] = 1;
        $_SESSION['user'] = $username;
        $success = true;
    }
    
    return $success;
}


function Register($username, $regkey, $userpassword)
{
    $success = false;
    if (Login($username, $regkey))
    {
        $sql = "UPDATE users SET password = '" . md5($userpassword) . "' WHERE username = '" . $username . "'";
        $success = true;
    }
    
    return $success;
}


function LoadNavBar()
{
    if (IsLoggedIn())
    {
        print("Welcome back ". $_SESSION['user'] . ". To add an update to the timline, visit your <a href=\"profile.php\">profile</a>.  Or if you're done, <a href=\"logout.php\">logout</a>");
    }
    else
        print('If you are a member, please <a href="login.php">login</a>.');
    
    
    print($sidebar);
    
}

function IsLoggedIn()
{
    if ($_SESSION['loggedIn'] == 1) 
        return true;
    else
        return false;
}

?>