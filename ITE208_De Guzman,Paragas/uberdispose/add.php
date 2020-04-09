<?php

include 'connection.php';

$connection = new mysqli($HostName, $HostUser, $HostPassword, $DatabaseName);
        if ($connection->connect_error) {
            die('Connection Failed: '.$connection->connect_error);
        }
if (isset($_POST['submit'])) {
}

$username = $_POST['txtusername'];
$password = $_POST['txtpassword'];
$collector = $_POST['txtcollector'];
$owner = $_POST['txtowner'];
$location = $_POST['txtlocation'];
$mission = $_POST['txtmission'];
$vision = $_POST['txtvision'];
$tin = $_POST['txttinnum'];
$bir = $_POST['txtbir'];
$barangay = $_POST['txtbarangay'];

    $queryadd = "INSERT into tblcollectors(mission,vision,collectorname,status,location,owner,tin,bir,barangay) values ('$mission','$vision','$collector','Deactivated','$location','$owner','$tin','$bir','$barangay')";
    $res1 = mysqli_query($connection, $queryadd);

    $queryaddacc = "INSERT into tblusers(username,password,type,owner,status) values ('$username','$password','Collector','$owner','Deactivated')";
    $res2 = mysqli_query($connection, $queryaddacc);
    echo "<script>alert('DATA ADDED'); window.location.href = 'view_data.php';</script>";
