<?php
    print('<h3>Timeline Contributors</h3>');
    DisplayProfileList();
?>


<?php

    function DisplayProfileList()
    {
        $profileRows = GetProfileList();
        
        print('<ul>');
        foreach ($profileRows as $row)
            print('<li><a href="viewprofile.php?user=' . $row['username'] . '">' . $row['firstname'] . '</a></li>');
        
        print('</ul>');
    }

?>