<!DOCTYPE html>
<html>
  <head>
    <title>Setting up database</title>
  </head>
  <body>

    <h3>Setting up...</h3>

<?php // Example 26-3: setup.php
  require_once 'functions.php';

  createTable('events',
              'user VARCHAR(16),
              pass VARCHAR(40),
              pass2 VARCHAR(40),
              INDEX(user(6))');

  createTable('Messages', 
              'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              auth VARCHAR(16),
              recip VARCHAR(16),
              pm CHAR(1),
              time INT UNSIGNED,
              message VARCHAR(4096),
              INDEX(auth(6)),
              INDEX(recip(6))');

  createTable('Friends',
              'user VARCHAR(16),
              friend VARCHAR(16),
              INDEX(user(6)),
              INDEX(friend(6))');

  createTable('Profiles',
              //user VARCHAR(16),
              //INDEX(ZIP(6)),
              'ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              user VARCHAR(16),
              EventType VARCHAR(16),
              Address VARCHAR(16),
              Time VARCHAR(16),
              MoreInfo VARCHAR(16),
              State VARCHAR(16),
              ZIP VARCHAR(16),
              City VARCHAR(16),
              text VARCHAR(4096),
              INDEX(user(6))');

  // createTable('Events', 
  //             'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  //             FirstName VARCHAR(16),
  //             LastName VARCHAR(16),
  //             Username VARCHAR(16),
  //             City VARCHAR(16),
  //             State VARCHAR(16),
  //             Email VARCHAR(16),
              
  //             INDEX(state(6))'); 

  
  
  

?>

    <br>...done.
  </body>
</html>
