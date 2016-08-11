<?php // Example 26-1: functions.php
  $dbhost  = 'localhost';    
  $dbname  = '';   //create dbname
  $dbuser  = '';   // create dbuser
  $dbpass  = '';   // create db password
  $appname = "Events Center"; // not necessary. only if u want to create one
  $welcomenote = "Welcome";  // not necessary. only if u want to create one


  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($connection->connect_error) die($connection->connect_error);

  function createTable($name, $query)
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

  function showProfile($user)
  {

    //change it to ID.jpg
    if (file_exists("$user.jpg"))

      //to show image after logging
      //echo "<img src='$user.jpg' style='float:left;'>";

    $result = queryMysql("SELECT * FROM Profiles WHERE user='$user'");

  //to fix use next 2 lines. eliminate while
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if ($result){
    //while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
        //{
      //$row = $result->fetch_array(MYSQLI_ASSOC);

      //to show value from text after logging in
      echo stripslashes($row['EventType']) . "<br style='clear:left;'><br>";
      echo stripslashes($row['Address']) . "<br style='clear:left;'><br>";
      echo stripslashes($row['Time']) . "<br style='clear:left;'><br>";
      echo stripslashes($row['MoreInfo']) . "<br style='clear:left;'><br>";
      echo stripslashes($row['State']) . "<br style='clear:left;'><br>";
      echo stripslashes($row['ZIP']) . "<br style='clear:left;'><br>";
      echo stripslashes($row['City']) . "<br style='clear:left;'><br>";
      echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
      echo "<img src='$user.jpg' style='float:left;'>";
      //change to "<img src='$ID.jpg' style='float:left;'>";
    }
  }
?>
