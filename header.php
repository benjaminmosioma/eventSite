<?php // Example 26-2: header.php
  session_start();

  echo "<!DOCTYPE html>\n<html><head>";

  require_once 'functions.php';
  
  $userstr = ' Guest';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " $user";
  }
  else $loggedin = FALSE;

  echo "<title>Welcome$userstr</title><link rel='stylesheet' " .
       "href='styles.css' type='text/css'>"                     .
       "</head><body><center><canvas id='logo' width='624' "    .
       "height='96'>$welcomenote</canvas></center>"             .
       "<div class='welcomenote'>$welcomenote$userstr</div>"            .
       "<script src='javascript.js'></script>";

  

  if ($loggedin)
  {
    echo "<br ><ul class='menu'>" .
         "<li ><a href='events.php?view=$user'>Home</a></li>" .
         "<li><a href='events.php'>Manage Events</a></li>"         .
         //"<li><a href='friends.php'>Friends</a></li>"         .
         //"<li><a href='messages.php'>Messages</a></li>"       .
            
         //"<li><a href='manageeventsGood.php'>Manage Events</a></li>"    .

         "<li><a href='logout.php'>Log out</a></li></ul><br>";
  }
  else
  {
    echo 
      "<br><ul class='menu'>" .
          "<li><a href='index.php'>Home</a></li>"                .
          "<li><a href='signup.php'>Sign up</a></li>"            .
          "<li><a href='login.php'>Log in</a></li>"              .
          "<li><a href='search.php'>View Events</a></li></ul><br>".
          "<span class='info'>&#8658; Log in to add events or " .
          "click <a href='search.php'>HERE</a> to search events without loging in.</span><br><br>"

          ;

  }

  

?>
