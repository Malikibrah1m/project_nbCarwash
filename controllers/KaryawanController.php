<?php

class KaryawanController extends BaseController
{
    private Employee $model;

    public function __construct()
    {
        session_start();
        $this->model = new Employee();
    }

    public function getIndex()
    {
     return $this->view('admin.employee');
        
    }
    public function deletehapus()
    {
        $id = $this->get('id');
        $this->model->rawQuery("Delete FROM 'employee' WHERE id = '$id'" );
        $url = BASE_URL . 'employee';
        header("Location: $url");
    }
    public function getData_trans()
    {
        $listData = $this->model->rawQuery("SELECT employee.*,employees.name as employee_name FROM employee LEFT JOIN employee on employee.id = employee.employees")->get();
        $data = [];
        if ($listData->num_rows > 0) {
            while ($row = $listData->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = [];
        }
        echo json_encode(array('data'=>$data));
        }
    }