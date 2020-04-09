<?php

require_once '../iosOperations/addrequestoperation.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!verifyRequiredParams(array('request', 'time', 'restaurant', 'status', 'location', 'collectorname'))) {
        //getting values
        $request = $_POST['request'];
        $time = $_POST['time'];
        $restaurant = $_POST['restaurant'];
        $status = $_POST['status'];
        $location = $_POST['location'];
        $collectorname = $_POST['collectorname'];
        //creating db operation object
        $db = new addrequest();

        //adding user to database
        $result = $db->createrequest($request, $time, $restaurant, $status, $location, $collectorname);

        //making the response accordingly
        if ($result == USER_CREATED) {
            $response['error'] = false;
            $response['message'] = 'Request for collection is successfully initiated';
        } elseif ($result == USER_ALREADY_EXIST) {
            $response['error'] = true;
            $response['message'] = 'Existing Request for specific time.';
        } elseif ($result == USER_NOT_CREATED) {
            $response['error'] = true;
            $response['message'] = 'Some error occurred';
        }
    } else {
        $response['error'] = true;
        $response['message'] = 'Required parameters are missing';
    }
} else {
    $response['error'] = true;
    $response['message'] = 'Invalid request';
}

function verifyRequiredParams($required_fields)
{
    //Getting the request parameters
    $request_params = $_REQUEST;

    //Looping through all the parameters
    foreach ($required_fields as $field) {
        //if any requred parameter is missing
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            //returning true;
            return true;
        }
    }

    return false;
}

echo json_encode($response);
