<?php
    $pageTitle = "Planet Money Race to Refinance";
    require_once("header.php");
?>
<div>
<div class="contributorcontainer">
<p><strong>Contributors</strong></p>
<div class="contributor">
    <?php
        $profileRow = GetProfileRow('saalon');
        $firstname = $profileRow['firstname'];
        $username = $profileRow['username'];
        $housephoto = $profileRow['housephoto'];
        
        print('<a href="viewprofile.php?user=' . $username . '">' . $firstname . '</a><br />');
        print('<a href="viewprofile.php?user=' . $username . '"><img src="' . $housephoto . '" width="250"/></a>');
    
    ?>
</div>

<div class="contributor">
        <?php
        $profileRow = GetProfileRow('meghan_e');
        $firstname = $profileRow['firstname'];
        $username = $profileRow['username'];
        $housephoto = $profileRow['housephoto'];
        
        print('<a href="viewprofile.php?user=' . $username . '">' . $firstname . '</a><br />');
        print('<a href="viewprofile.php?user=' . $username . '"><img src="' . $housephoto . '" width="250"/></a>');
    
    ?>
</div>

<div class="contributor">
        <?php
        $profileRow = GetProfileRow('nosretap');
        $firstname = $profileRow['firstname'];
        $username = $profileRow['username'];
        $housephoto = $profileRow['housephoto'];
        
        print('<a href="viewprofile.php?user=' . $username . '">' . $firstname . '</a><br />');
        print('<a href="viewprofile.php?user=' . $username . '"><img src="' . $housephoto . '" width="250"/></a>');
    
    ?>
</div>
</div>

<div>
    <span style="font-size:small;"><p>Welcome to the refinance timeline. This is the ongoing timeline of three regular people,
connected only by their love of <b>NPR's <a href="http://npr.org/money">Planet Money</a></b>,  who are
trying to refinance their mortgage. Mortgage rates are low, but credit is tight. If they're
lucky, they'll manage to save some money on their home.</P>

<p>The timeline below is easy to use. Just put your mouse over either band and click and drag to the left or right.
The story begins on January 12, 2009 with Noel's first attempt to refinance.</p>

<p>Wish us luck.</p></span>
<div id="pmtimeline" style="font-size:small;"></div>
<noscript>
This page uses Javascript to show you a Timeline. Please enable Javascript in your browser to see the full page. Thank you.
</noscript>
</div>
</div>
<?php
    require_once("footer.php");
?>
