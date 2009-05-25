<?php

    $firstname = $lastname = $city = $state = $purchaseprice = $purchasedate =
    $mortgagebalance = $housephoto = $twittername;
    
    if ($_GET['user'] != '')
    {
        require_once('header.php');
        GetViewProfileInfo($_GET['user']);
    }
    else
        header(index.php);
?>

<h2><?=$_GET['user']?>'s Profile</h2>

Name: <?=$firstname?> <?=$lastname?> <br />
Location: <?=$city?>, <?=$state?> <br />
Home purchased for $<?=$purchaseprice?> on <?=$purchasedate?> <br />
Asking banks to refinance $<?=$mortgagebalance?> worth of mortgage<br/>
<?php if($twittername != '') print('Follow them on <a href="http://twitter.com/' . $twittername . '">twitter</a>');?>  <br />
<?php if($housephoto != '') print('<img src="' . $housephoto . '" />');?>                       

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