<?php

    //CHECK IF REQUEST METHOD IS POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //INCLUDE DATABASE CONNECTION FILE
        include 'connection.php';

        //CREATE CONNECTION
        $connection = new mysqli($HostName, $HostUser, $HostPassword, $DatabaseName);
        if ($connection->connect_error) {
            die('Connection Failed: '.$connection->connect_error);
        }

        //FETCH ALL POST DATA AND ASSIGN TO THEIR RESPECTIVE VARIABLES
        $time = mysqli_real_escape_string($connection, $_POST['time']);
        $price = $_POST['price'];
        $time2 = mysqli_real_escape_string($connection, $_POST['time2']);
        $date = mysqli_real_escape_string($connection, $_POST['date']);
        $owner = mysqli_real_escape_string($connection, $_POST['owner']);
        $collectorname = mysqli_real_escape_string($connection, $_POST['collector']);
        $location = mysqli_real_escape_string($connection, $_POST['location']);
        $rating = mysqli_real_escape_string($connection, $_POST['rating']);
        //FILTER DATABASE WITH USERNAME AND PASSWORD FROM THE POST REQUEST
        $insertcollectorsql = "INSERT into tblcollectorsrequest(date,time,time2,collectorname,rating,location,mark,price) values ('$date','$time','$time2','$collectorname','$rating','$location','Available','$price')";

        try {
            if (mysqli_query($connection, $insertcollectorsql)) {
                echo json_encode('Succesfully added a Schedule for collection!');
            } else {
                echo json_encode('Something Went Wrong! Data Cannot Be Added');
            }
        } catch (Exception $e) {
            echo "$e";
        } finally {
            //CLOSE CONNECTION
            mysqli_close($connection);
        }
    }
