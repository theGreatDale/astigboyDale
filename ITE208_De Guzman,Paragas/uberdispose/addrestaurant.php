<?php


if (isset($_POST['submit'])) {
}

$username = $_POST['txtusername'];
$password = $_POST['txtpassword'];
$restaurant = $_POST['txtrestaurant'];
$owner = $_POST['txtowner'];
$location = $_POST['txtlocation'];

$con = mysqli_connect('localhost', 'root', '', 'db_uberdispose');
    $queryadd = "INSERT into tblrestaurant(restaurantname,location,owner) values ('$restaurant','$location','$owner')";
    $res1 = mysqli_query($con, $queryadd);

    $queryaddacc = "INSERT into tblusers(username,password,type,owner,status) values ('$username','$password','Restaurant','$owner','Activated')";
    $res2 = mysqli_query($con, $queryaddacc);
    echo "<script>alert('DATA ADDED'); window.location.href = 'view_data.php';</script>";
