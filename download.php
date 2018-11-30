<?php
include('db.php');

if(isset($_GET['dow']))
{
    $BPath=$_GET['dow'];

    $res=mysql_query("select * from books where BPath='$BPath'");

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($BPath).'"');
    header('Content-Length: ' . filesize($BPath));
    readfile($BPath);
}
?>