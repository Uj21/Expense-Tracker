<?php
include("auth_session.php");
$update = false;
$del = false;
$expenseamount = "";
$expensedate = date("Y-m-d");
$expensetype = "";
$expensename ="";

if (isset($_POST['add'])) {
    $expenseamount = $_POST['expenseamount'];
    $expensedate = $_POST['expensedate'];
    $expensetype = $_POST['expensetype'];
    $expensename = $_POST['expensename'];

    $expenses = "INSERT INTO expenses (id, expense,expensedate,expensetype,expensename) VALUES ('$id', '$expenseamount','$expensedate','$expensetype','$expensename')";
    $result = mysqli_query($con, $expenses) or die("Something Went Wrong!");
    header('location: addexpense.php');
}
if (isset($_POST['delete'])) {

    $sql = "DELETE FROM expenses WHERE id = '$id' and expense_id='$eid'";
    if (mysqli_query($con, $sql)) {
        echo "Records were updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    header('location: addexpense.php');
}

$exp_fetched = mysqli_query($con, "SELECT * FROM expenses WHERE id = '$id'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expense Tracker App</title>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" 
        rel="stylesheet">
    
<style>

*{
    margin:0;
    font-family: 'Titillium Web', sans-serif;
}

body
{
    background:#F0F3F4;
    color:#7B7F9D;
    background-image:url('https://salestrip.com/wp-content/uploads/2020/04/trackexpenses.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}

.title{
    width: 500px;
    color:#d66c10;
    margin:3% auto;
  position:relative;
  left:-85px;
  top:20px;
}

.content{
    width: 580px;
    margin: 0 auto;
     background-color:transparent;
    padding: 3%;
    padding-left: 6%;
  border: 2px solid white;
  border-radius: 25px;
  color:rgb(1, 0, 0);
}

.secondTitle{
    text-align:left;
    margin: 2% 0;
    font-weight: 100;
}

.form{
    padding: 5px;
}

.formLine{
    color:black;
    display: inline-flex;
    padding: 5px 0px;
}

.left{
    float: left;
}
.type
{
  color:#0b567d;
}
.right{
    float:right;
    margin-right: 100px;
}

input, select{
    width: 130px;
    margin-left: 10px;
}

/* table style */
table{
    width: 100%;
}

thead{
    background-color:#0b567d;
    line-height: 30px;
}

/* Button */

button{
    width: 200px;
    color:#fff; 
    padding: 10px;
    text-align: center;
    font-size: 1.1em;
    line-height: 20px;
    background-color: #7B7F9D;
    border-radius: 5px;
    margin: 14px 25%;
    cursor: pointer;
}

a{
    text-decoration: underline;
    cursor: pointer;
}
</style>
</head>
<body>
    <header>
        <h1 class="title">EzXpense</h1>
    </header>
    
    <section class="content">
        <h3 class="secondTitle">Add a new item: </h3>
        <div class="form">
            <form id="expForm" action="" method="POST">
                <div class="formLine left">
                    <span for="type">Type:</span>
                    <input type="text" value="<?php echo $expensetype; ?>" name="expensetype" id="expensetype" required>
                    <!-- <select id="type">
                        <option value="chooseOne">Choose one...</option>
                        <option value="Card" name="expensetype" id="expensetype1" value="Cash" <?php echo ($expensetype == 'Cash') ? 'checked' : '' ?>>Card </option>
                        <option value="Cash">Cash</option>
                        <option value="Cryptocoin">UPI</option>
                        <option value="Other">Other</option>
                    </select> -->
                </div>
                <div class="formLine right">
                    <span for="name">Name:</span>
                    <input type="text" value="<?php echo $expensename; ?>" name="expensename" id="expensename" required>
                </div>

                <div class="formLine left">
                    <span for="date">Date:</span>
                    <input type="date" value="<?php echo $expensedate; ?>" name="expensedate" id="expensedate" required>
                </div>
                <div class="formLine right">
                    <span for="amount">Amount:</span>
                    <input type="text" value="<?php echo $expenseamount; ?>" id="expenseamount" name="expenseamount" required >
                </div>
                <button type="submit" name="add" class="buttonSave">Add a new expense</button>
            </form>
        </div>
    </section>
    <section class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="expenseTable">
            <?php $count=1; while ($row = mysqli_fetch_array($exp_fetched)) { ?>
            <tr>
                                    <td><?php echo $row['expensetype']; ?></td>
                                    <td><?php echo $row['expensename']; ?></td>
                                    <td><?php echo $row['expensedate']; ?></td>
                                    <td><?php echo $row['expense']; ?></td>
                                
                                    <td >
                                        <a href="addexpense.php?delete=<?php $eid = $row['expense_id']; ?>" >Delete</a>
                                    </td>
                                </tr>
                                <?php $count++; } ?>
            </tbody>
        </table>
    </section>
    <script src="app.js"></script>
      
</body>
</html>