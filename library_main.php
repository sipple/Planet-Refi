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

function GetProfileRow($username)
{   
    $dbh = SqlConnect();
    
    $stmt = $dbh->prepare('SELECT username, firstname, lastname, city, state,
                            purchaseprice, purchasedate, mortgagebalance, secondmortgage,
                            housephoto, twittername FROM profiles p
                            JOIN users u ON p.userid = u.userid
                            WHERE u.username = :username');
    
    $stmt->bindParam(':username', $username);
    
    if ($stmt->execute())
        $row = $stmt->fetch();
    else
        $row = null;
    
    return $row;

}

function GetProfileEvents($username)
{
        $dbh = SqlConnect();
    
    $stmt = $dbh->prepare("SELECT from_unixtime(entrydate,
                          get_format(date, 'USA')) AS date,
                          title,
                          description
                          FROM timeline t
                          JOIN users u ON t.userid = u.userid 
                          JOIN profiles p ON p.userid = u.userid
                          WHERE u.username = :username
                          ORDER BY entrydate ASC");
    
    $stmt->bindParam(':username', $username);
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    if ($stmt->execute())
        return $stmt->fetchAll();
    else
        return '';
}

function GetProfileList()
{
    $dbh = SqlConnect();
    
    $stmt = $dbh->prepare('SELECT p.firstname, u.username FROM profiles p
                            JOIN users u ON p.userid = u.userid');
    
    if ($stmt->execute())
        $rows = $stmt->fetchAll();
    else
        $rows = null;
    
    return $rows;
}

function SubmitProfileRow($username, $firstname, $lastname, $city, $state,
                          $purchaseprice, $purchasedate, $mortgagebalance,
                          $secondmortgage, $housephoto, $twittername)
{
    $success = false;
    
    $dbh = SqlConnect();
    
    $stmt = $dbh->prepare('UPDATE profiles p, users u
                          SET p.firstname = :firstname,
                          p.lastname = :lastname, p.city = :city, p.state = :state,
                          p.purchasedate = :purchasedate, p.purchaseprice = :purchaseprice,
                          p.mortgagebalance = :mortgagebalance, p.secondmortgage = :secondmortgage,
                          p.housephoto = :housephoto, p.twittername = :twittername
                          WHERE p.userid = u.userid AND
                          u.username = :username');
    
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':purchaseprice', $purchaseprice);
    $stmt->bindParam(':purchasedate', $purchasedate);
    $stmt->bindParam(':mortgagebalance', $mortgagebalance);
    $stmt->bindParam(':secondmortgage', $secondmortgage);
    $stmt->bindParam(':housephoto', $housephoto);
    $stmt->bindParam(':twittername', $twittername);
    
    if ($stmt->execute())
        $success = true;   
    
    return $success;
}

function SubmitTimelineEntry($username, $title, $description, $entrydate)
{
    $success = false;
    
    $dbh = SqlConnect();
    
    $stmt = $dbh->prepare('INSERT INTO timeline 
                          (userid, profileid,  title, description,  entrydate)
                          VALUES ( (SELECT userid FROM users u WHERE username = :username),
                          (SELECT p.profileid FROM profiles p JOIN users u ON p.userid = u.userid WHERE u.username = :username),
                          :title,
                          :description,
                          :entrydate)');
    
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':entrydate', $entrydate);
    
    if ($stmt->execute())
        $success = true;
    
    return $success;
}

function LoadNavBar()
{
    if (IsLoggedIn())
    {
        print("Welcome back ". $_SESSION['user'] . ". Add an update to the <a href=\"updatetimeline.php\">timeline</a>, edit your <a href=\"profile.php\">profile</a>,  or <a href=\"logout.php\">logout</a>");
    }
    else
        print('If you\'re a contributor, feel free to <a href="login.php">login</a>. If you want to play, <a href="mailto:planetrefi@daemonsong.com">drop us a line.</a>');
        
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
    $dbfilename = '../../planetrefidb.txt';
    $dbfile     = fopen($dbfilename, "r");
    $dbuser     = trim(fgets($dbfile));
    $dbpassword = trim(fgets($dbfile));
    $dbhost     = trim(fgets($dbfile));
    $dbname     = trim(fgets($dbfile));
    
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpassword, array(PDO::ATTR_PERSISTENT => true));
    
    return $dbh;
}

function SqlDisconnect($dbh)
{
    $dbh = null;
}

?>
