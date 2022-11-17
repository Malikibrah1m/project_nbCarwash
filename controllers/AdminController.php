<?php
class AdminController extends BaseController
{
    use LoginCheck;
    public function getIndex()
    {
        // print_r($_SESSION['user']['email']);
        return $this->view('admin.index');
    }
}
