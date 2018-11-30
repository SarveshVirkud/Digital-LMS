<?php
$b_name=filter_input(INPUT_POST,'name');
$email=filter_input(INPUT_POST,'BID');
$date=filter_input(INPUT_POST,'date');
$disp="Go Back!";
if(empty($b_name))
{
  alert("Name of book Cannot be empty!");
  die($disp);
}
if(empty($email))
{
  alert("Email cannot be empty!");
  die($disp);
}
if(empty($date))
{
  alert("Date cannot be empty!");
  die($disp);
}
$servername = "localhost";
$username = "root";
$password = "";
$dbnm="lms";

$conn = new mysqli($servername, $username, $password,$dbnm);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//alert("Connected successfully");
$sql2="Create or replace trigger t1 after insert on issue for each row begin select BAdd from books where BName='$b_name' and ISBN='$email' end";


$sql1="Insert into issue values('$b_name','$email','$date')";
$resultset=$conn->query($sql1);
if ($conn->query($sql1) === TRUE) {
    alert("Success!");
} else {
    alert("Faliure in insertion!");
}
$sqll="Select BAdd from books where BName='$b_name'";
$resultset=$conn->query($sqll);
if (mysqli_num_rows($resultset) > 0)
{
    $row = mysqli_fetch_assoc($resultset);
    $BPath=$row["BAdd"];
    echo"<a href='download.php?dow=$BPath'>Download</a></td>";
}
$conn->close();

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>
