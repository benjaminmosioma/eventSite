<?php // Example 26-8: manageevents.php
  require_once 'header.php';
 
  if (!$loggedin) die();

  echo "<br ><ul class='menu1'>" .
        "<li><a href='viewall.php'>View all Events</a></li>" .
        "<li><a href='addevents.php'>Add Events</a></li>" .
        "<li><a href='delete.php'>Delete Events</a></li><br>";


  echo "<div class='main'><h3>Your Events</h3>";


//echo "This is line " . __LINE__ . " of file " . __FILE__; 


  //$result = queryMysql("SELECT * FROM Profiles WHERE user='$user'");
 
  // if (isset($_POST['ID']) and isset($_POST['EventType']) and isset($_POST['Address']) and isset($_POST['Time'])
  //    and isset($_POST['MoreInfo']) and isset($_POST['State']) and isset($_POST['ZIP']) and isset($_POST['City']) 
  //     and isset($_POST['text'])){
    
   if (! empty($_POST)){
     //echo "This is line " . __LINE__ . " of file " . __FILE__;
    //$ID = sanitizeString($_POST['ID']);
    $EventType = sanitizeString($_POST['EventType']);
    $Address = sanitizeString($_POST['Address']);
    $Time = sanitizeString($_POST['Time']);
    $MoreInfo = sanitizeString($_POST['MoreInfo']);
    $State = sanitizeString($_POST['State']);
    $ZIP = sanitizeString($_POST['ZIP']);
    $City = sanitizeString($_POST['City']);
    $text = sanitizeString($_POST['text']);
    $text = preg_replace('/\s\s+/', ' ', $text);
    

    // if ($result->num_rows)
    //      queryMysql("UPDATE profiles SET text='$text' where user='$user'");
    // else queryMysql(

    //insert data
     $sql = "INSERT INTO Profiles (user, EventType, Address, Time, MoreInfo, 
      State, ZIP, City, text)VALUES('$user', '$EventType', 
      '$Address', '$Time', '$MoreInfo', '$State', '$ZIP', '$City',  '$text')";

    $insert = $connection->query($sql);

    if ($insert){
      echo "<font color ='green'>Event succesfully saved</font>";

    }else{
      echo "<font color ='red'>Event was not saved</font>";
    }

  }


  // else
  // {
  //   if ($result->num_rows)
  //   {
  //     $row  = $result->fetch_array(MYSQLI_ASSOC);
  //     $text = stripslashes($row['text']);
  //   }
  //   else $text = "";
  // }

  // $text = stripslashes(preg_replace('/\s\s+/', ' ', $text));
    //echo "This is line " . __LINE__ . " of file " . __FILE__;
  if (isset($_FILES['image']['name']))
  {
    $saveto = "$user.jpg"; //Try ID.jpg to save image to ID
    move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
    $typeok = TRUE;

    switch($_FILES['image']['type'])
    {
      case "image/gif":   $src = imagecreatefromgif($saveto); break;
      case "image/jpeg":  // Both regular and progressive jpegs
      case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
      case "image/png":   $src = imagecreatefrompng($saveto); break;
      default:            $typeok = FALSE; break;
    }

    if ($typeok)
    {
      list($w, $h) = getimagesize($saveto);

      $max = 400;
      $tw  = $w;
      $th  = $h;

      if ($w > $h && $max < $w)
      {
        $th = $max / $w * $h;
        $tw = $max;
      }
      elseif ($h > $w && $max < $h)
      {
        $tw = $max / $h * $w;
        $th = $max;
      }
      elseif ($max < $w)
      {
        $tw = $th = $max;
      }

      $tmp = imagecreatetruecolor($tw, $th);
      imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
      imageconvolution($tmp, array(array(-1, -1, -1),
        array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
      imagejpeg($tmp, $saveto);
      imagedestroy($tmp);
      imagedestroy($src);
    }
  }


  echo <<<_END
    <form method='post' action='addevents.php' enctype='multipart/form-data'>
    <h3>Enter or edit event details and/or upload an flyer</h3>
    
    <span class='fieldname'>Event Type</span>
    <input type='text' maxlength='40' name='EventType'><span id='info'></span><br>
    <span class='fieldname'>Address</span>
    <input type='text' maxlength='40' name='Address'><br>
    <span class='fieldname'>Time</span>
    <input type='text' maxlength='40' name='Time'><br>
    <span class='fieldname'>More Info</span>
    <input type='text' maxlength='40' name='MoreInfo'><br> 
    <span class='fieldname'>State</span>
    <input type='text' maxlength='40' name='State'><br>
    <span class='fieldname'>ZIP</span>
    <input type='text' maxlength='40' name='ZIP'><br>
    <span class='fieldname'>City</span>
    <input type='text' maxlength='40' name='City'><br>
    <span class='fieldname'>Text</span>
    <textarea name='text' cols='21' rows='3'></textarea><br>

_END;
?>

    Image: <input type='file' name='image' size='30'>
    <input type='submit' value='Save Event'>
    </form></div><br>
  </body>
</html>

