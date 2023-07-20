<?php
include 'db.php';

$user = $_POST['user'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$comments = $_POST['comments'];

$query = "insert into userinfodata(user, email, mobile, comments)
value('$user', '$email', '$mobile', '$comments' )";

mysqli_query($con,$query);
header('location:dashboard.php');
?>

