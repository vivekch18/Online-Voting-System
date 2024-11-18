<?php
$connect = mysqli_connect("localhost","root","","votings") or dir("connection failed!");

if($connect)
{
    echo "Successfully connected with database";
}
else
{
    echo "Not connected with database";
}
?>