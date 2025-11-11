<?php

  $server   = 'localhost';
  $username = 'root';
  $password = 'velu@1234';
  $db_name  = 'travel';
  
  $conn = new mysqli($server, $username, $password, $db_name);
  
  if ($conn->connect_error) {
      die('connection  failed'.$conn->connect_error);
  }

?>