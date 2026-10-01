<?php
require_once "../php/database.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  //Get student info 
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $nationality = $_POST['nationality'];
  $religion = $_POST['religion'];

  //Get academics info 
  $class = $_POST['class'];
  $previousSchool = $_POST['previousSchool'];

  //Get  Parent / Guardian Information
  $guardianName = $_POST['guardianName'];
  $relationship = $_POST['relationship'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  //Get Emergency Contact
  $emergencyName = $_POST['emergencyName'];
  $emergencyPhone = $_POST['emergencyPhone'];

  //Get Documents
  $photo = $_FILES['photo'];
  $documents = $_FILES['documents'];

  $status = "pending";

  $photoPath = "../uploads/" . $photo['name'];
  move_uploaded_file($photo['tmp_name'], $photoPath);

  $documentPath = "../document/" .$documents['name'];
  move_uploaded_file($documents['tmp_name'], $documentPath);

  echo "<h1>Form Submitted Successfully!</h1> ";
  echo "<p>Thank You " . $firstName  . " " . $lastName . ".</p>";
  echo "<p> We will conact you when application has been reviewed. </p>";



  $sql = "INSERT INTO admission(
    firstName,
    lastName,
    dob,
    gender,
    nationality,
    religion,
    class,
    previousSchool,
    guardianName,
    relationship,
    phone,
    email,
    address,
    emergencyName,
    emergencyPhone,
    photo,
    documents,
    status
)
VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
  $stmt,
  "ssssssssssssssssss",
  $firstName,
  $lastName,
  $dob,
  $gender,
  $nationality,
  $religion,
  $class,
  $previousSchool,
  $guardianName,
  $relationship,
  $phone,
  $email,
  $address,
  $emergencyName,
  $emergencyPhone,
  $photoPath,
  $documentPath,
  $status
);

mysqli_stmt_execute($stmt);

echo "Application saved successfully!";


}

?>