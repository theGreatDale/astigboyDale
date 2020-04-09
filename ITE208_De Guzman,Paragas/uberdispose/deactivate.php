<?php

include 'connection.php';

//CREATE CONNECTION
$connection = new mysqli($HostName, $HostUser, $HostPassword, $DatabaseName);
if ($connection->connect_error) {
    die('Connection Failed: '.$connection->connect_error);
}
$id = $_GET['deactivate'];
$sql_query = "SELECT * FROM tblcollectors where id='$id'";
$result = mysqli_query($connection, $sql_query);

$row = mysqli_fetch_array($result);
$owner = $row['owner'];
if (mysqli_query($connection, "UPDATE tblcollectors SET status = 'Deactivated' where id ='$id'")) {
    (mysqli_query($connection, "UPDATE tblusers SET status = 'Deactivated' where owner ='$owner' "));
    echo "<script>alert('Collector Deactivated'); window.location.href = 'view_data.php';</script>";
}
