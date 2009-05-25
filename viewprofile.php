<?php

    $pageTitle = "Planet Money Refinance Timline";
    require_once('header.php');
    
    $firstname = $lastname = $city = $state = $purchaseprice = $purchasedate =
    $mortgagebalance = $housephoto = $twittername;
    
    if ($_GET['user'] != '')
    {
        GetViewProfileInfo($_GET['user']);
        include_once('template_profile.php');
    }
    else
        include_once('template_profilelist.php');
?>
                   

<?php
    require_once("footer.php");
?>

<?php

    function GetViewProfileInfo($username)
    {
        $profileRow = GetProfileRow($username);
        
        $GLOBALS['firstname'] = $profileRow['firstname'];
        $GLOBALS['lastname'] = $profileRow['lastname'];
        $GLOBALS['city'] = $profileRow['city'];
        $GLOBALS['state'] = $profileRow['state'];
        $GLOBALS['purchaseprice'] = $profileRow['purchaseprice'];
        $GLOBALS['purchasedate'] = date("m/d/Y", $profileRow['purchasedate']);
        $GLOBALS['mortgagebalance'] = $profileRow['mortgagebalance'];
        $GLOBALS['housephoto'] = $profileRow['housephoto'];
        $GLOBALS['twittername'] = $profileRow['twittername'];
    }

?>