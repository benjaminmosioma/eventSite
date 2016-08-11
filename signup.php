<?php // Example 26-5: signup.php
  require_once 'header.php';

  echo <<<_END
  <script>
    function checkUser(user)
    {
      if (user.value == '')
      {
        O('info').innerHTML = ''
        return
      }

      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "checkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              O('info').innerHTML = this.responseText
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }
  </script>
  <div class='main'><h3>Please enter your details to sign up</h3>
_END;
//if user, pass and pass2 is empty error out
  $error = $user = $pass = $pass2 = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);

    $pass = sanitizeString($_POST['pass']);

    $pass2 = sanitizeString($_POST['pass2']);
    
    //user has to be btn 4 chars and 12, Contain uppercase lowercase and number
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{4,12}$/', $user)) 
      $error = "<span class='error'>The username does not meet the requirements!
        </span><br><br>";

        

    else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', $pass)) 
  
      $error = "<span class='error'>The password does not meet the requirements!
        </span><br><br>";

    else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', $pass2)) 
  
      $error = "<span class='error'>The password does not meet the requirements!
        </span><br><br>";



    else if($pass != $pass2)
      $error = "<span class='error'>Error. Password did not match</span><br><br>";

      //echo "This is line " . __LINE__ . " of file " . __FILE__;
      //exit;
    
    else if ($user == "" || $pass == "" || $pass2 == "")
      $error = "Not all fields were entered<br><br>";
    
    else
    {
      //create query called results that check in events table for users who match the user input
      $result = queryMysql("SELECT * FROM events WHERE user='$user'");

      //if user allready exists in bd, error out
      if ($result->num_rows)
        $error = "That username already exists<br><br>";

      //Encrypt password and save into db if user is not already taken
      else
      {
        $pass = md5($pass);
        $pass2 = md5($pass2);
        queryMysql("INSERT INTO events VALUES('$user', '$pass', '$pass2')");
        die("<h4>Account created</h4>Please Log in.<br><br>");
      }
    }
  
  }

  echo <<<_END
    <form method='post' action='signup.php'>$error
    <span class='fieldname'>Username</span>
    <input type='text' maxlength='40' name='user' value='$user'
      onBlur='checkUser(this)'><span id='info'></span><br>
    <span class='fieldname'>Password</span>
    <input type='password' maxlength='40' name='pass'
      value='$pass'><br>
      <span class='fieldname'>Re-enter password</span>
    <input type='password' maxlength='40' name='pass2'
      value='$pass2'><br>
_END;
?>

    <span class='fieldname'>&nbsp;</span>
    <input style="color:black;"type='submit' value='Sign up'>
    </form></div><br>
  </body>
</html>
