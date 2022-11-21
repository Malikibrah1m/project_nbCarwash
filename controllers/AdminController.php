<?php
class AdminController extends BaseController
{
    public function __construct()
    {
        session_start();
    }
    public function getIndex()
    {
        // print_r($_SESSION['user']['email']);
        return $this->view('admin.index');
    }
}
