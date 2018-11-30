<?php
include('db.php');


$qry = "select * from books";
$res=$dbc->query($qry);
 if($dbc->query($qry)==True)
        {
            //echo "Done!";
        }
        else
        {
            die('Error');
        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <title>Add Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<a href="upload.php">Add new Document</a><br><br>

<table class="data-table" border="1">
		<caption class="title">Book Available</caption>
		<thead>
			<tr>
				<th>ISBN</th>
				<th>BName</th>
        <th>BAuthor</th>
        <th>Price</th>
        <th>Category</th>
        <th>Path</th>
        <th>Download</th>
			</tr>
		</thead>
		<tbody>
<?php

while($row=@mysqli_fetch_array($res))
{
    $BID=$row['ISBN'];
    $BName=$row['BName'];
    $BAuthor=$row['Author'];
     $Price=$row['Price'];
     $Category=$row['Category'];
    $BPath=$row['BAdd'];
    //echo $BID. " " . $BName. "<a href='download.php?dow=$BPath'>Download</a><br>";
    echo "<tr><td>$BID</td>
              <td>$BName</td>
              <td>$BAuthor</td>
              <td>$Price</td>
              <td>$Category</td>
              <td>$BPath</td>
              <td><a href='download.php?dow=$BPath'>Download</a></td>
          </tr>";
}
?>
</body>
</html>
