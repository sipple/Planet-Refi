<h2><?=$firstname?>'s Profile</h2>

<div>
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
    if($twittername != '') print('Follow on <a href="http://twitter.com/' . $twittername . '">twitter</a>');
?><br />
<?php
    if($housephoto != '') print('<div style="width:55%; overflow: hidden; float:left;"><img  style="max-width:600px;" src="' . $housephoto . '" /></div>');
?>
</div>
<div style="float:left; width:45%;">
    <?php
        $results = GetProfileEvents($_GET['user']);
        print '<ul>';
        foreach ($results as $event)
        {
            print '<li><b>' . $event['date'] . ':</b> ' . $event['title'] . '</li>';
        }
        print '</ul>';
    
    ?>
</div>
</div>
<p>See the <a href="viewprofile.php">list</a> of contributors</p>
