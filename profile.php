<?php

    $pageTitle = "Planet Money Refinance Timeline";
    require_once('header.php');
    
    $firstname = $lastname = $city = $state = $purchaseprice = $purchasedate =
    $mortgagebalance = $secondmortgage = $housephoto = $twittername;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $error = SetProfileInfo();
    }
    
    GetProfileInfo();
    
?>

<?=$error?>
<form id="profile" class="submitform" action="profile.php" method="post">
<table>
<tr><td>First Name</td><td><input type="text" name="firstname" value="<?=$firstname?>" /></td><td>Last Name</td><td><input type="text" name="lastname" value="<?=$lastname?>" /></td></tr>
<tr><td>City</td><td><input type="text" name="city" value="<?=$city?>" /></td><td> State</td><td><input type="text" name="state" value="<?=$state?>" /></td></tr>
<tr style="height:10px;"></tr>
<tr><td>Purchase Price</td><td><input type="text" name="purchaseprice" value="<?=$purchaseprice?>"/></td><td>Purchase Date</td><td><input type="text" name="purchasedate" value="<?=$purchasedate?>"/></td></tr>
<tr><td>Total Refinance Amount</td><td><input type="text" name="mortgagebalance" value="<?=$mortgagebalance?>"/></td><td>Second Mortgage Balance</td><td><input type="text" name="secondmortgage" value="<?=$secondmortgage?>"/></td></tr>
<tr style="height:10px;"></tr>
<tr><td>House Photo (url)</td><td><input type="text" name="housephoto" value="<?=$housephoto?>"/></td><td>Twitter Username</td><td><input type="text" name="twittername" value="<?=$twittername?>"/></td></tr>
<tr><td></td><td></td><td></td><td><input type="submit" name="submit" value="Save" style="float:right;"/></td></tr>
</table>
</form>

<?php
    require_once("footer.php");
?>

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
            $GLOBALS['secondmortgage'] = $profileRow['secondmortgage'];
        }
    }
    
    function SetProfileInfo()
    {
        if (!SubmitProfileRow($_SESSION['user'], $_POST['firstname'], $_POST['lastname'],
                         $_POST['city'], $_POST['state'], str_replace(',','',$_POST['purchaseprice']),
                         strtotime($_POST['purchasedate']), str_replace(',','',$_POST['mortgagebalance']),
                         str_replace(',','',$_POST['secondmortgage']), $_POST['housephoto'], $_POST['twittername']))
        
            $error = 'There was an error submitting your changes. Please try again.';
        
        return $error;
    }

?>
