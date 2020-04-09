<?php

session_start();
$errors = array();
include 'connection.php';

//CREATE CONNECTION
$connection = new mysqli($HostName, $HostUser, $HostPassword, $DatabaseName);
if ($connection->connect_error) {
    die('Connection Failed: '.$connection->connect_error);
}
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($username)) {
        array_push($errors, 'Username is required');
    }
    if (empty($password)) {
        array_push($errors, 'Password is required');
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM tblusers WHERE username='$username' AND password='$password'";
        $results = mysqli_query($connection, $query);

        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_array($results);
            $logintype = $row['type'];
            $_SESSION['type'] = $row['type'];
            $_SESSION['username'] = $username;
            $_SESSION['success'] = 'You are now logged in';
            header('location: index.php');
        } else {
            array_push($errors, 'Wrong username/password combination');
        }
    }
}
