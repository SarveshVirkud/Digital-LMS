<?php
$name=filter_input(INPUT_POST,'name');
$email=filter_input(INPUT_POST,'email');
$pwd=filter_input(INPUT_POST,'pass');
$dept=filter_input(INPUT_POST,'department');
$disp = "Go Back!";
if(empty($name))
{
  alert("Name Cannot be empty!");
  die($disp);
}
if(empty($email))
{
  alert("Email cannot be empty!");
  die($disp);
}
if(empty($pwd))
{
  alert("Password cannot be empty!");
  die($disp);
}
if(empty($dept))
{
  alert("Department cannot be empty!");
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

$sql1="Insert into users values('$name','$email','$pwd','$dept')";
if ($conn->query($sql1) === TRUE) {
    alert("Success!");
    alert("Login Now!");
} else {
    alert("Faliure in insertion!");
    alert("Email already used!");
}
$conn->close();

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>
