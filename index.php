<?php
    $pageTitle = "Planet Money Race to Refinance";
    require_once("header.php");
?>

<p>Welcome to the refinance timeline. This is the ongoing timeline of three regular people,
connected only by their love of <b>NPR's <a href="http://npr.org/money">Planet Money</a></b>,  who are
trying to refinance their mortgage. Mortgage rates are low, but credit is tight. If they're lucky,
their refinance will be more interesting than every other banking transaction in history. If they're
very lucky, they'll manage to save some money on their home in the process.</P>

<p>The timeline below is easy to use. Just put your mouse over the either band and click and drag to the left or right.
The story begins on January 12, 2009 with Noel's first attempt to refinance.</p>

<p>Wish us luck.</p>

<div id="pmtimeline"></div>
<noscript>
This page uses Javascript to show you a Timeline. Please enable Javascript in your browser to see the full page. Thank you.
</noscript>

<h3>Your contributors:</h3>

<div id="leftcontrib" style="width:33%; height: 250px; float:left; border: dotted black 1px; padding-top:5px;  text-align:center; margin-bottom: 30px;">
    <?php
        $profileRow = GetProfileRow('saalon');
        $firstname = $profileRow['firstname'];
        $username = $profileRow['username'];
        $housephoto = $profileRow['housephoto'];
        
        print('<a href="viewprofile.php?user=' . $username . '">' . $firstname . '</a><br /><br />');
        print('<a href="viewprofile.php?user=' . $username . '"><img src="' . $housephoto . '" width="250"/></a>');
    
    ?>
</div>

<div id="centercontrib" style="width:33%; height: 250px; float:left;border: dotted black 1px; padding-top:5px;  text-align:center; margin-bottom: 30px;">
        <?php
        $profileRow = GetProfileRow('meghan_e');
        $firstname = $profileRow['firstname'];
        $username = $profileRow['username'];
        $housephoto = $profileRow['housephoto'];
        
        print('<a href="viewprofile.php?user=' . $username . '">' . $firstname . '</a><br /><br />');
        print('<a href="viewprofile.php?user=' . $username . '"><img src="' . $housephoto . '" width="250"/></a>');
    
    ?>
</div>

<div id="rightcontrib" style="width:33%; height: 250px; float:left;border: dotted black 1px; padding-top:5px; text-align:center; margin-bottom: 30px;">
        <?php
        $profileRow = GetProfileRow('nosretap');
        $firstname = $profileRow['firstname'];
        $username = $profileRow['username'];
        $housephoto = $profileRow['housephoto'];
        
        print('<a href="viewprofile.php?user=' . $username . '">' . $firstname . '</a><br /><br />');
        print('<a href="viewprofile.php?user=' . $username . '"><img src="' . $housephoto . '" width="250"/></a>');
    
    ?>
</div>
<br /><br /><br />
<?php
    require_once("footer.php");
?>
