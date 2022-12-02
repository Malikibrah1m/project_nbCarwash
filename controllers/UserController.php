<?php

class UserController extends BaseController
{
    private $user;
    function __construct()
    {
        $this->user = new User;
        session_start();
    }

    public function getData_list()
    {
        header('Content-Type: application/json');
        $user = $this->user->all();
        $data = [];
        if ($user->num_rows > 0) {
            while ($row = $user->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            echo "0 results";
        }
        // print_r($data);
        echo json_encode($data);
    }
}
