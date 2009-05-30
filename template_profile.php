<h2><?=$firstname?>'s Profile</h2>

<p>Name: <?=$firstname?> <?=$lastname?> <br />
Location: <?=$city?>, <?=$state?> <br />
Home purchased for $<?=$purchaseprice?> on <?=$purchasedate?> <br />
<?php
    if($mortgagebalance != '' && $mortgagebalance != 0)
    {
        print('Asking banks to refinance $' . $mortgagebalance);

        if($secondmortgage != '' && $secondmortgage != 0)
            print(' of which $' . $secondmortgage . ' is a second mortgage');
        else
            print (' worth of mortgage');
        
        print('.<br/>');
    }
?>
<?php
    if($twittername != '') print('Follow them on <a href="http://twitter.com/' . $twittername . '">twitter</a>');
?><br />
<?php
    if($housephoto != '') print('<img src="' . $housephoto . '" />');
?>
<p>See the <a href="viewprofile.php">list</a> of contributors</p>
