<?php // Example 26-7: search.php
  require_once 'header.php';
  echo "<div class='main'><h3>Please enter details to search events</h3>";
  $error = $EventType = $ZIP = $State = "";

  if (isset($_POST['EventType']))
  {


 echo "This is line " . __LINE__ . " of file " . __FILE__;

    $EventType = sanitizeString($_POST['EventType']);
    $State = sanitizeString($_POST['State']);
    $ZIP = sanitizeString($_POST['ZIP']);
    $City = sanitizeString($_POST['City']);
    
    if ($EventType == "" && $State == "" && $ZIP == "")
        $error = "Fill in required fields. <br>";
    else
    {
      $result = queryMySQL("SELECT * FROM Profiles
        WHERE EventType='$EventType' and State='$State' and ZIP ='$ZIP'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Zero items were found
        </span><br><br>";
      }
      else
        //From this point on
      {

        echo "Your search returned this items.<br><br>";

        echo "This is line " . __LINE__ . " of file " . __FILE__;

        $row  = $result->fetch_array(MYSQL_ASSOC);

        $EventType = stripslashes($row['EventType']);



        //echo $result;
        //$_SESSION['user'] = $user;
        //$_SESSION['pass'] = $pass;

        //Add details to events.php to show logged on user events
        //die("Your search returned this items.<br><br>");
      }

    }
  }

  echo <<<_END
    <form method='post' action='search.php'>$error
    <span class='fieldname'>Event Type</span>
    <input type='text' maxlength='40' name='EventType'><span id='info'></span><br>
    <span class='fieldname'>State</span>
    <input type='text' maxlength='40' name='State'><br>
    <span class='fieldname'>ZIP</span>
    <input type='text' maxlength='40' name='ZIP'><br>
    <span class='fieldname'>City</span>
    <input type='text' maxlength='40' name='City'><br>
_END;
?>

    <br>
    <span class='fieldname'>&nbsp;</span>
    <input style="color:black;" type='submit' value='Search'>
    </form><br></div>
  </body>
</html>
