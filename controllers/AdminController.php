<?php
class AdminController extends BaseController
{
    public function __construct()
    {
        session_start();
        // if (!session_name('user')) {
        //     return header("location: ".BASE_URL);
        // }

        if (!$_SESSION['user']) {
            return header("location: ".BASE_URL);
        }
    }
    public function getIndex()
    {
        // print_r($_SESSION['user']['email']);
        return $this->view('admin.index');
    }
}
