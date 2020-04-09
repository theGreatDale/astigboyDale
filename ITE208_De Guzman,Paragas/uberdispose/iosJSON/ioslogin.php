<?php

header('Content-Type: application/json');
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

        //FILTER DATABASE WITH USERNAME AND PASSWORD FROM THE POST REQUEST
        $selectUserSQL = "SELECT * FROM tblusers WHERE username='". $username ."' AND password='". $password ."' AND status='Activated'";
 
        //EXECUTE QUERY AND COUNT ROW RESULTS
        $sqlLoginResult = $connection->query($selectUserSQL);

        try {
            if ($sqlLoginResult->num_rows > 0) {
                while ($rows[] = $sqlLoginResult->fetch_assoc()) {
                    $arrayLoginResult = array('LoginResult' => $rows);
                }
                echo json_encode('Succesfully Login');
            } else {
                echo 'Invalid Username or Password';
            }
        } catch (Exception $e) {
            echo 'Invalid Username or Password';
        } finally {
            //CLOSE CONNECTION
            mysqli_close($connection);
        }
    }
