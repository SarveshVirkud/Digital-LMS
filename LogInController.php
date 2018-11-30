<?php
$email=filter_input(INPUT_POST,'email');
$pwd=filter_input(INPUT_POST,'pass');
$disp="Go Back!";
if(empty($email))
{
  alert("Username Empty!");
  die($disp);
}
if(empty($pwd))
{
  alert("Password Empty!");
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
if($email=="admin@mail.com")
    {
      if($pwd=="admin")
      {
        header("Location: admin.php");
      }
    }
$sql1="Select email,password from users";
$rs=$conn->query($sql1);
if (mysqli_num_rows($rs) > 0) {
  while($row = mysqli_fetch_assoc($rs)){
    if($row["email"]==$email)
    {
      if($row["password"]==$pwd){
        alert("Login Success!");
        header("Location: index.html");
    }

    }
    else{
      alert("Wrong username or passowrd!");
    }
}
else
{
  alert("Wrong username or passowrd!");
}
}
$conn->close();
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>
