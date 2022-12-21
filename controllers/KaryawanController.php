<?php
class KaryawanController extends BaseController
{
    public function __construct()
    {
        session_start();
        if (!$_SESSION['user']) {
            return header("location: " . BASE_URL);
        }
    }

    public function getIndex()
    {
     return $this->view('admin.employee');
        
    }

    public function deleteHapus()
    {
        $id = $this->get('id');
        $this->model->rawQuery("DELETE FROM `employee` WHERE id = '$id'");
        $url = BASE_URL . 'employee';
        header("Location: $url");
        // $this->model->rawQuery("DELETE FROM employee WHERE id = '$id'");
    }

    public function getData_trans()
    {
        

}
}