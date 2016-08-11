<?php // Example 26-8: manageevents.php
  require_once 'header.php';
 
  if (!$loggedin) die();

  echo "<br ><ul class='menu1'>" .
        "<li><a href='viewall.php'>View all Events</a></li>" .
        "<li><a href='addevents.php'>Add Events</a></li>" .
        "<li><a href='delete.php'>Delete Events</a></li><br>";
?>