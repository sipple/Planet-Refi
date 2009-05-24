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
    $dbh = SqlConnect();
    
    $stmt = $dbh->prepare("SELECT password FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);

    $stmt->execute();
    
    if ($stmt->execute())
    {
        $row = $stmt->fetch();
        $storedPassword = $row['password'];
        if ($storedPassword == md5($userpassword))
        {
            $_SESSION['loggedIn'] = 1;
            $_SESSION['user'] = $username;
            $success = true;
        }
    }
    
    return $success;
}


function Register($username, $regkey, $userpassword)
{
    $success = false;
    $dbh = SqlConnect();
    
    if (Login($username, $regkey))
    {
        $stmt = $dbh->prepare("UPDATE users SET password = :userpassword WHERE username = :username");
        $stmt->bindParam(':userpassword', md5($userpassword));
        $stmt->bindParam(':username', $username);
        if ($stmt->execute())
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

function SqlConnect()
{
    $dbfilename='../../planetrefidb.txt';
    $dbfile = fopen($dbfilename, "r");
    $dbuser=trim(fgets($dbfile));
    $dbpassword=trim(fgets($dbfile));
    $dbhost=trim(fgets($dbfile));
    $dbname=trim(fgets($dbfile));
    
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpassword, array(PDO::ATTR_PERSISTENT => true));
    
    return $dbh;
}

function SqlDisconnect($dbh)
{
    $dbh = null;
}

?>