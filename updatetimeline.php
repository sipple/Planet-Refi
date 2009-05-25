<?php

    $pageTitle = "Planet Money Refinance Timeline";
    require_once('header.php');

    $datenow = date('m/d/Y');

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $error = UpdateTimeline();
    }

?>


<form id="timeline" class="submitform" action="updatetimeline.php" method="post">
<table>
<tr><td>Event Date</td><td><input type="text" name="eventdate" value="<?=$datenow?>"/></td></tr>
<tr><td>Title</td><td><input type="text" name="title" /></td></tr>
<tr><td>Description</td><td><input type="textarea" name="description" /></td></tr>
<tr><td><input type="submit" name="submit" value="Save" style="float:right;"/></td></tr>
</table>
</form>


<?php
    require("footer.php");
?>

<?php
    
    function UpdateTimeline()
    {
        if (!SubmitTimelineEntry($_SESSION['user'], $_POST['title'], $_POST['description'], strtotime($_POST['eventdate'])))
            $error = 'There was an error submitting your changes. Please try again.';
        
        return $error;
    }

?>
