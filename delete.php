<?php
include("auth_session.php");

if (isset($_POST['delete'])) {
    $eid = $_GET['delete'];

    $sql = "DELETE FROM expenses WHERE expense_id='$eid'";
    if (mysqli_query($con, $sql)) {
        echo "Records were updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    header('location: addexpense.php');
}

?>