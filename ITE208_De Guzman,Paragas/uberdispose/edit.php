<?php include 'myheader.php'; ?>  
<?php

include 'connection.php';
$connection = new mysqli($HostName, $HostUser, $HostPassword, $DatabaseName);
if ($connection->connect_error) {
    die('Connection Failed: '.$connection->connect_error);
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $username = $_POST['txtusername'];
    $password = $_POST['txtpassword'];
    $collectorname = $_POST['txtcollectorname'];
    $owner = $_POST['txtowner'];
    $location = $_POST['txtlocation'];
    $mission = $_POST['txtmission'];
    $vision = $_POST['txtvision'];
    $bir = $_POST['txtbir'];
    $tin = $_POST['txttin'];
    $barangay = $_POST['txtbarangay'];
}
if (mysqli_query($connection, "UPDATE tblcollectors SET mission='$mission',vision='$vision',collectorname='$collectorname',location='$location',owner='$owner',bir='$bir',barangay='$barangay',tin='$tin' where id ='$id' ")) {
    if (mysqli_query($connection, "UPDATE tblusers SET username='$username',password='$password' where owner ='$owner' ")) {
        echo "<script>alert('DATA UPDATED'); window.location.href = 'view_data.php';</script>";
    }
}
