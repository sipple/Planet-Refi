<?php
    require_once('header.php');
    
    $firstname = $lastname = $city = $state = $purchaseprice = $purchasedate =
    $mortgagebalance = $housephoto = $twittername;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if ($_GET['type'] == 'timeline')
            $this;
        else
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
<tr><td>Refinance Amount</td><td><input type="text" name="mortgagebalance" value="<?=$mortgagebalance?>"/></td></tr>
<tr style="height:10px;"></tr>
<tr><td>House Photo (url)</td><td><input type="text" name="housephoto" value="<?=$housephoto?>"/></td><td>Twitter Username</td><td><input type="text" name="twittername" value="<?=$twittername?>"/></td></tr>
<tr><td></td><td></td><td></td><td><input type="submit" name="submit" value="Save" style="float:right;"/></td></tr>
</table>
</form>

<hr>
    
<form id="timeline" class="submitform" action="profile.php?type=timeline" method="post">
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