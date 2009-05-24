<?php
    require_once('header.php');
    
    $firstname = $lastname = $city = $state = $purchaseprice = $purchasedate =
    $mortgagebalance = $housephoto = $twittername;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        $error = SetProfileInfo();
    
    GetProfileInfo();
    
?>

<?=$error?>
<form id="profile" action="profile.php" method="post">
First Name: <input type="text" name="firstname" value="<?=$firstname?>" /> Last Name: <input type="text" name="lastname" value="<?=$lastname?>" /><br />
City <input type="text" name="city" value="<?=$city?>" /> State: <input type="text" name="state" value="<?=$state?>" /> <br />
Purchase Price: <input type="text" name="purchaseprice" value="<?=$purchaseprice?>"/> <br />
Purchase Date: <input type="text" name="purchasedate" value="<?=$purchasedate?>"/> <br />
Mortgage Balance/Amount to Refinance: <input type="text" name="mortgagebalance" value="<?=$mortgagebalance?>"/> <br />
House Photo (url): <input type="text" name="housephoto" value="<?=$housephoto?>"/> <br />
Twitter Username: <input type="text" name="twittername" value="<?=$twittername?>"/> <br />
<input type="submit" name="submit" value="Save"/>
</form>

<?php
    
    function GetProfileInfo()
    {
        if ($_SESSION['loggedIn'] == 1)
        {
            $profileRow = GetProfileRow($_SESSION['user']);
            
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
    }
    
    function SetProfileInfo()
    {
        if (!SubmitProfileRow($_SESSION['user'], $_POST['firstname'], $_POST['lastname'],
                         $_POST['city'], $_POST['state'], $_POST['purchaseprice'],
                         strtotime($_POST['purchasedate']), $_POST['mortgagebalance'],
                         $_POST['housephoto'], $_POST['twittername']))
        
            $error = 'There was an error submitting your changes. Please try again.';
        
        return $error;
    }

?>