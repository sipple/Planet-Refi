<?php

include_once('library_main.php');

print "{ \"dateTimeFormat\":\"iso8601\",  \"events\": "
      . str_replace("\"false\"","false", json_encode(GetTimelineEvents()))
      . "}";

function GetTimelineEvents()
{
    $dbh = SqlConnect();
    
    $stmt = $dbh->prepare("SELECT from_unixtime(entrydate,
                          get_format(datetime, 'ISO')) AS start,
                          CONCAT(p.firstname, ': ', title) AS title,
                          description,
                          'false' AS durationEvent,
                          CONCAT('viewprofile.php?user=', u.username) AS link
                          FROM timeline t
                          JOIN users u ON t.userid = u.userid
                          JOIN profiles p ON p.userid = u.userid");
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    if ($stmt->execute())
        return $stmt->fetchAll();
    else
        return '';
}

?>
