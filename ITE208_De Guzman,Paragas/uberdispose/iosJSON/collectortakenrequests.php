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
        $collector = mysqli_real_escape_string($connection, $_POST['collector']);

        //FILTER DATABASE WITH USERNAME AND PASSWORD FROM THE POST REQUEST
        $selectUserSQL = "SELECT * FROM tblcollectorsrequest WHERE collectorname='".$collector."' AND mark='Taken' ORDER BY date ASC";

        //EXECUTE QUERY AND COUNT ROW RESULTS
        $sqlLoginResult = $connection->query($selectUserSQL);

        try {
            if ($sqlLoginResult->num_rows > 0) {
                while ($rows[] = $sqlLoginResult->fetch_assoc()) {
                    $arrayLoginResult = array('CollectorTakenRequests' => $rows);
                    $json = json_encode($arrayLoginResult);
                }

                echo $json;
            }
        } catch (Exception $e) {
            echo "$e";
        } finally {
            //CLOSE CONNECTION
            mysqli_close($connection);
        }
    }
