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
        $collector = mysqli_real_escape_string($connection, $_POST['collectorname']);
        $restaurant = mysqli_real_escape_string($connection, $_POST['restaurant']);
        $rating = mysqli_real_escape_string($connection, $_POST['rating']);
        $feedback = mysqli_real_escape_string($connection, $_POST['feedback']);
        //FILTER DATABASE WITH USERNAME AND PASSWORD FROM THE POST REQUEST
        $selectUserSQL = "INSERT into tblrating(rating,collectorname,restaurant,feedback) values ('$rating','$collector','$restaurant','$feedback')";

        //EXECUTE QUERY AND COUNT ROW RESULTS

        //CLOSE CONNECTION

        try {
            if (mysqli_query($connection, $selectUserSQL)) {
                $sql_query = "SELECT SUM(rating) as value_sum FROM tblrating where collectorname='$collector'";
                $result = mysqli_query($connection, $sql_query);
                $countquery = "SELECT * from tblrating where collectorname='$collector'";
                $result2 = mysqli_query($connection, $countquery);
                $row = mysqli_fetch_array($result);
                $count = mysqli_num_rows($result2);
                $rating = $row['value_sum'];
                $total = ($rating / $count);
                $updatequery = "UPDATE tblcollectors set rating='$total' where collectorname = '$collector'";

                try {
                    if (mysqli_query($connection, $updatequery)) {
                        echo json_encode('Success');
                    } else {
                        echo json_encode('Something Went Wrong! Data Cannot Be Added');
                    }
                } catch (Exception $e) {
                    echo "$e";
                } finally {
                    //CLOSE CONNECTION
                    mysqli_close($connection);
                }
            } else {
                echo json_encode('Something went wrong!');
            }
        } catch (Exception $e) {
            echo "$e";
        }
    }
