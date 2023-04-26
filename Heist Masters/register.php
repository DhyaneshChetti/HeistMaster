<?php
 $username=$_POST['username'];
 $email=$_POST['email'];
 $password=$_POST['password'];
include'conn.php';
  if($conn->connect_error)
  {
    die('Connection Failed:'.$conn->connect_error);
  }
  else
  {
    $password=md5($password);
    $smt=$conn->prepare("insert into user_data (username,email,password) values(?,?,?)");
    $smt->bind_param("sss",$username,$email,$password);
    $smt->execute();
    $smt->close();
    $conn->close();
    echo'<script>alert("Registered Succesfully")</script>';
    echo'<script>window.location.href="index.html"</script>';
  }
?>

