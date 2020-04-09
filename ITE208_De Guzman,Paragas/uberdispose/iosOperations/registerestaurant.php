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
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $restaurant = mysqli_real_escape_string($connection, $_POST['restaurant']);
        $owner = mysqli_real_escape_string($connection, $_POST['owner']);
        $location = mysqli_real_escape_string($connection, $_POST['location']);

        $type = mysqli_real_escape_string($connection, $_POST['type']);
        //FILTER DATABASE WITH USERNAME AND PASSWORD FROM THE POST REQUEST
        $insertcollectorsql = "INSERT into tblusers(username,password,type,owner,status) values ('$username','$password','$type','$owner','Activated')";
        $insert2restaurantsql = "INSERT into tblrestaurant(restaurantname,owner,location) values ('$restaurant','$owner','$location')";

        $insert2 = $connection->query($insert2restaurantsql);
        try {
            if (mysqli_query($connection, $insertcollectorsql)) {
                echo json_encode('Succesfully Registered Restaurant!');
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
