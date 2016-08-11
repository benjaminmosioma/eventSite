<?php // Example 26-9: events.php
  require_once 'header.php';

  if (!$loggedin) die();

  echo "<br ><ul class='menu1'>" .
        "<li><a href='viewall.php'>View all Events</a></li>" .
        "<li><a href='addevents.php'>Add Events</a></li>" .
        "<li><a href='delete.php'>Delete Events</a></li><br>";

  echo "<div class='main'>";

  if (isset($_GET['view']))
  {
    $view = sanitizeString($_GET['view']);
    
    if ($view == $user) $name = "Your";
    else                $name = "$view's";
    
    echo "<h3>$name Events</h3>";
    //showProfile($view);
    //echo "<a class='button' href='messages.php?view=$view'>" .
        // "View $name messages</a><br><br>";
    die("</div></body></html>");
  }

  // if (isset($_GET['add']))
  // {
  //   $add = sanitizeString($_GET['add']);

  //   $result = queryMysql("SELECT * FROM friends WHERE user='$add' AND friend='$user'");
  //   if (!$result->num_rows)
  //     queryMysql("INSERT INTO friends VALUES ('$add', '$user')");
  // }
  // elseif (isset($_GET['remove']))
  // {
  //   $remove = sanitizeString($_GET['remove']);
  //   queryMysql("DELETE FROM friends WHERE user='$remove' AND friend='$user'");
  // }

  // $result = queryMysql("SELECT user FROM events ORDER BY user");
  // $num    = $result->num_rows;

  // echo "<h3>Other events</h3><ul>";

  // for ($j = 0 ; $j < $num ; ++$j)
  // {
  //   $row = $result->fetch_array(MYSQLI_ASSOC);
  //   if ($row['user'] == $user) continue;
    
  //   echo "<li><a href='events.php?view=" .
  //     $row['user'] . "'>" . $row['user'] . "</a>";
  //   $follow = "follow";

  //   $result1 = queryMysql("SELECT * FROM friends WHERE
  //     user='" . $row['user'] . "' AND friend='$user'");
  //   $t1      = $result1->num_rows;
  //   $result1 = queryMysql("SELECT * FROM friends WHERE
  //     user='$user' AND friend='" . $row['user'] . "'");
  //   $t2      = $result1->num_rows;

  //   if (($t1 + $t2) > 1) echo " &harr; is a mutual friend";
  //   elseif ($t1)         echo " &larr; you are following";
  //   elseif ($t2)       { echo " &rarr; is following you";
  //     $follow = "recip"; }
    
  //   if (!$t1) echo " [<a href='events.php?add="   .$row['user'] . "'>$follow</a>]";
  //   else      echo " [<a href='events.php?remove=".$row['user'] . "'>Unfollow</a>]";
  // }
?>

    </ul></div>
  </body>
</html>
