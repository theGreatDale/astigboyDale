<?php

class addrequest
{
    private $conn;

    //Constructor
    public function __construct()
    {
        require_once dirname(__FILE__).'/Constants.php';
        require_once dirname(__FILE__).'/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    //Function to create a new user
    public function createrequest($request, $time, $restaurant, $status, $location, $collectorname)
    {
        if (!$this->isUserExist($request, $time, $restaurant, $status)) {
            $stmt = $this->conn->prepare('INSERT INTO tblrequest (request, time, restaurant,status,location,collectorname) VALUES (?, ?, ?, ?, ?,?)');
            $stmt->bind_param('ssssss', $request, $time, $restaurant, $status, $location, $collectorname);
            if ($stmt->execute()) {
                return USER_CREATED;
            } else {
                return USER_NOT_CREATED;
            }
        } else {
            return USER_ALREADY_EXIST;
        }
    }

    private function isUserExist($time)
    {
        $stmt = $this->conn->prepare('SELECT time FROM tblrequest WHERE time = ?');
        $stmt->bind_param('s', $time);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0;
    }
}
