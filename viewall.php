<?php // Example 26-8: viewall.php


  require_once 'header.php';
 
  if (!$loggedin) die();

echo "<br ><ul class='menu1'>" .
        "<li><a href='viewall.php'>View all Events</a></li>" .
        "<li><a href='addevents.php'>Add Events</a></li>" .
        "<li><a href='delete.php'>Delete Events</a></li><br>";

         $result = queryMySQL("SELECT * FROM Profiles
        WHERE user='$user'");  
        
      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Zero items were found
        </span><br><br>";
      }
      else
        //From this point on
      {

        echo "This are your events.<br><br>";

        echo "This is line " . __LINE__ . " of file " . __FILE__.'<br>'; 
      while ($row  = $result->fetch_array(MYSQL_ASSOC)) {
        
      
        //$row  = $result->fetch_array(MYSQL_ASSOC);

        // echo $EventType = stripslashes($row['EventType']); <br>
        // echo $Address = stripslashes($row['Address']);
        // echo $Time = stripslashes($row['Time']);
        // echo $MoreInfo = stripslashes($row['MoreInfo']);
        // echo $State = stripslashes($row['State']);
        // echo $ZIP = stripslashes($row['ZIP']);
        // echo $City = stripslashes($row['City']);
        // echo $text = stripslashes($row['text']);
      	
      echo "<img src='$user.jpg' style='float:left;'><br>";
      echo stripslashes($row['EventType']) . "<br style='clear:none;'><br>";
      echo stripslashes($row['Address']) . "<br style='clear:none;'><br>";
      echo stripslashes($row['Time']) . "<br style='clear:none;'><br>";
      echo stripslashes($row['MoreInfo']) . "<br style='clear:none;'><br>";
      echo stripslashes($row['State']) . "<br style='clear:none;'><br>";
      echo stripslashes($row['ZIP']) . "<br style='clear:none;'><br>";
      echo stripslashes($row['City']) . "<br style='clear:none;'><br>";
      echo stripslashes($row['text']) . "<br style='clear:none;'><br><br><br>";
      //echo "<img src='$user.jpg' style='float:left;'>";
      //change to "<img src='$ID.jpg' style='float:left;'>";
       }
   }



//showProfile($user);

?>