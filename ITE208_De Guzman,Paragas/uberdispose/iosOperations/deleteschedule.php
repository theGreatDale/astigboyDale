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
        $id = mysqli_real_escape_string($connection, $_POST['id']);
        //FILTER DATABASE WITH USERNAME AND PASSWORD FROM THE POST REQUEST
        $delete = "DELETE from tblrequestrestaurant WHERE id='$id'";

        try {
            if (mysqli_query($connection, $delete)) {
                echo json_encode('Schedule Succesfully Deleted!');
            } else {
                echo json_encode('Something Went Wrong! Data Cannot Be Deleted');
            }
        } catch (Exception $e) {
            echo "$e";
        } finally {
            //CLOSE CONNECTION
            mysqli_close($connection);
        }
    }
