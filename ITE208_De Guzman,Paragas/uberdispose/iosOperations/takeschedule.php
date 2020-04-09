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
        $restaurant = mysqli_real_escape_string($connection, $_POST['restaurant']);
        $location = mysqli_real_escape_string($connection, $_POST['location']);
        $collector = mysqli_real_escape_string($connection, $_POST['collector']);
        $mark = mysqli_real_escape_string($connection, $_POST['mark']);
        $date = mysqli_real_escape_string($connection, $_POST['date']);
        $time = mysqli_real_escape_string($connection, $_POST['time']);
        $time2 = mysqli_real_escape_string($connection, $_POST['time2']);
        $price = mysqli_real_escape_string($connection, $_POST['price']);
        $loadgarbage = mysqli_real_escape_string($connection, $_POST['loadgarbage']);
        //FILTER DATABASE WITH USERNAME AND PASSWORD FROM THE POST REQUEST
        $updatesql = "INSERT into tblrequestrestaurant(restaurant,location,collector,mark,date,time,price,time2,loadgarbage) values ('$restaurant','$location','$collector','$mark','$date','$time','$price','$time2','$loadgarbage')";

        try {
            if (mysqli_query($connection, $updatesql)) {
                echo json_encode('You have succesfully requested collection for this collector!');
            } else {
                echo json_encode('Something went wrong!');
            }
        } catch (Exception $e) {
            echo "$e";
        } finally {
            //CLOSE CONNECTION
            mysqli_close($connection);
        }
    }
