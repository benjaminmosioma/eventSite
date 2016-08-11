<?php // Example 26-7: login.php
  require_once 'header.php';
  echo "<div class='main'><h3>Please enter your details to log in</h3>";
  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = md5(sanitizeString($_POST['pass']));
    
    if ($user == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else
    {
      //$pass = md5('$pass');
      $result = queryMySQL("SELECT user,pass FROM events
        WHERE user='$user' AND pass='".$pass."'");

      if ($result->num_rows == 0)
      {
       
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";


      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass; 

        //Add details to events.php to show logged on user events
        die("You are now logged in. Please <a href='events.php?view=$user'>" .
            "click here</a> to continue.<br><br>");
      }
    }
  }


  echo <<<_END
    <form method='post' action='login.php'>$error
    <span class='fieldname'>Username</span><input type='text'
      maxlength='40' name='user' value='$user'><br>
    <span class='fieldname'>Password</span><input type='password'
      maxlength='16' name='pass' value='$pass'>
_END;
?>

    <br>
    <span class='fieldname'>&nbsp;</span>
    <input style="color:black;" type='submit' value='Login'>
    </form><br></div>
  </body>
</html>
