<?php

include_once('library_main.php');

print(json_encode(GetTimelineEvents()));

function GetTimelineEvents()
{
    $dbh = SqlConnect();
    
    $stmt = $dbh->prepare("SELECT username, entrydate, title, description
                          FROM timeline t
                          JOIN users u ON t.userid = u.userid");
    
    if ($stmt->execute())
        return $stmt->fetchAll();
    else
        return '';
}

?>
