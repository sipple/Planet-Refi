<h2><?=$firstname?>'s Profile</h2>

<p>Name: <?=$firstname?> <?=$lastname?> <br />
Location: <?=$city?>, <?=$state?> <br />
Home purchased for $<?=$purchaseprice?> on <?=$purchasedate?> <br />
Asking banks to refinance $<?=$mortgagebalance?> worth of mortgage<br/>
<?php
    if($twittername != '') print('Follow them on <a href="http://twitter.com/' . $twittername . '">twitter</a>');
?><br />
<?php
    if($housephoto != '') print('<img src="' . $housephoto . '" />');
?>
<p>See the <a href="viewprofile.php">list</a> of contributors</p>
