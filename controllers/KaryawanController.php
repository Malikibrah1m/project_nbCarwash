<?php

use Carbon\CarbonImmutable;

class KaryawanController extends BaseController
{
    private Employee $model;

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
    public function getUsers_data()
    {
        header('Content-Type: application/json');
        $users = $this->users->all();
        $data = [];
        if ($users->num_rows > 0) {
            while ($row = $users->fetch_assoc()) {
                $data[] = $row;
            }
        }
        // print_r($data);
        echo json_encode(array('data' => $data));
    }

    public function postInsert()
    {
        $now = CarbonImmutable::now();
        $nama = $this->post('nama');
        $email = $this->post('email');
        $password = $this->post('password');
        $process = $this->Users->rawQuery("INSERT INTO `spends`(`id`, `nama`, `email`,'password') VALUES ('$nama','$email','$password')")->get();
        if ($process) {
            echo json_encode(array('message' => 'success'));
        }
    }
    public function deleteDelete()
    {
        $id = $this->get('id');
        $process = $this->pengeluaran->rawQuery("DELETE FROM `spends` WHERE id = '$id'");
        echo json_encode(array('message' => 'Data berhasil dihapus'));
    }
    
    }