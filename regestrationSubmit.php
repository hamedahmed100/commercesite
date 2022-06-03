<?php
require_once('config/database.php');
if(isset($_POST['create'])){
  $database = new Database();
  $conn = $database->getConnection();
  $fullname = $_POST['fullname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $guardian = $_POST['guardian'];
  $governorate = $_POST['governorate'];
  $stage = $_POST['stages'];
  $group = $_POST['groups'];
  $query="INSERT INTO students(fullname,phonenumber,email,guardianphonenumber,governorate,stageid,groupid) 
      VALUES('$fullname','$phone','$email','$guardian','$governorate',$stage,$group)";
  try {
      $stmt = $conn->prepare($query);
      // execute query
      $stmt->execute();
      header("Location:success.php");
      die();
  } catch (Exception $ex) {
      header("Location:notFound.php");
  }
}
