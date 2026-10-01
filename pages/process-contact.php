<?php

require_once "../php/database.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];


  $sql = "INSERT INTO contact(name, email, subject, message )
  VALUES(?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);

  mysqli_stmt_bind_param(
    $stmt,
    "ssss",
    $name,
    $email,
    $subject,
    $message
  );

  mysqli_stmt_execute($stmt);

  echo "";

}

?>