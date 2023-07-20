<?php
    session_start();
    include("db.php");
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }


$sess_username = $_SESSION["username"];
$sql = "SELECT * FROM users WHERE username = '$sess_username'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id=$row["id"];
    $useremail=$row["email"];
  }
} else {
    $userid="112";
    $username ="Jhon Doe";
    $useremail="mailid@domain.com";
}
?>