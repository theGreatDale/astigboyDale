<?php include 'myheader.php'; ?>  

<?php
include 'connection.php';
$connection = new mysqli($HostName, $HostUser, $HostPassword, $DatabaseName);
if ($connection->connect_error) {
    die('Connection Failed: '.$connection->connect_error);
}

    $id = $_GET['delete'];

    $getcollectorquery = "SELECT * FROM tblcollectors WHERE id = '$id'";
    $results = mysqli_query($connection, $getcollectorquery);
    if (mysqli_num_rows($results) == 1) {
        $row = mysqli_fetch_array($results);
        $owner = $row['owner'];
        $deletequery = mysqli_query($connection, "delete from tblusers where owner ='$owner'");
    }
    $deletequery = mysqli_query($connection, "delete from tblcollectors where id ='$id'");

     echo "<script>alert('DATA DELETED'); window.location.href = 'view_data.php';</script>";

?>

