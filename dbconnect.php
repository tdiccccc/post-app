<?php
  try {
    $db = new PDO('mysql:host=localhost;dbname=post', 'root','root');
  } catch (PDOException $e) {
    echo 'DB接続エラー' . $e -> getMessage();
  }
?>