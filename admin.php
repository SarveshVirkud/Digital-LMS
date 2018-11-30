<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LMS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="style.css" rel="stylesheet">
    <meta charset="utf-8" />
    <title>Upload Documents</title>

    <style>
* {`
    box-sizing: border-box;
}

input[type=text], select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" data-spy="affix">
	<div class="container-fluid">
		<a class=navbar-brand href="#"><h3>SNR</h3></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.html">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="search.php">Search</a>
				</li>
				<!--<li class="nav-item">
					<a class="nav-link" href="index.html">About</a>
				</li>-->
				<li class="nav-link dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#222">About</a>
					<ul id="abt" class="dropdown-menu">
						<li>
							<a href="index.html">Services</a>
						</li>
						<li>
								<a href="new2.html">Books</a>
							</li>

						<li>
							<a href="new3.html">About Us</a>
						</li>
						<li>
							<a href="#bottom">Contact Us</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="Identity/login.html">Admin Login</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<?php
include('db.php');

if(isset($_POST['submit']))
{
    $BName=$_POST['BName'];
    $AName=$_POST['AName'];
    $ISBN=$_POST['ISBN'];
    $Price=$_POST['Price'];
    $Category=$_POST['Category'];
    $BFile=$_FILES['BFile']['name'];
    $tmp_nameF=$_FILES['BFile']['tmp_name'];
    $BCover=$_FILES['BCover']['name'];
    $tmp_nameC=$_FILES['BCover']['tmp_name'];

    if($BName && $AName && $ISBN && $Category && $BFile && $BCover)
    {
        $LocationF="Books/$BFile";
        $LocationC="BCovers/$BCover";

        move_uploaded_file($tmp_nameF,$LocationF);
        move_uploaded_file($tmp_nameC,$LocationC);
        //echo "$Location";
       // $qry="Insert into books values(5,'$BName','$LocationF') ";
        $qry="Insert into books values($ISBN,'$BName','$AName',$Price,'$Category','$LocationF','$LocationC') ";

        if($dbc->query($qry)==True)
        {
            alert("Done!");
        }
        else{
            echo"Goddd No No god no!";
        }
        alert("Book Added");
       // header('Location:admin.php');
    }
    else
    {
        die("Please Choose a file");
    }
}
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>

    <form action="admin.php" method="post" enctype="multipart/form-data">
    
<div class="container">
  <form action="action_page.php">
    <div class="row">
      <div class="col-25">
        <label for="BName">Book Name:</label>
      </div>
      <div class="col-75">
        <input type="text" name="BName">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="AName">Author Name:</label>
      </div>
      <div class="col-75">
        <input type="text" name="AName">
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="ISBN">ISBN:</label>
      </div>
      <div class="col-75">
        <input type="text" name="ISBN">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Price">Price:</label>
      </div>
      <div class="col-75">
        <input type="text" name="Price">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Category">Category</label>
      </div>
      <div class="col-75">
        <select id="category" name="Category">
            <option value="Fiction">Fiction</option>
            <option value="Novels">Novels</option>
            <option value="Comedy">Comedy</option>
            <option value="Biography">Biography</option>
            <option value="Engg">Engg</option>
            </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="PDF">Select PDF:</label>
      </div>
      <div class="col-75">
        <input type="file" name="BFile">
      </div>
    </div>
    
     <div class="row">
      <div class="col-25">
        <label for="Image">Select Image:</label>
      </div>
      <div class="col-75">
        <input type="file" name="BCover">
      </div>
    </div>
    <div class="row">
<input type="submit" name="submit" value="Upload">
    </div>
  </form>
</div>
</form>
</body>
</html>
