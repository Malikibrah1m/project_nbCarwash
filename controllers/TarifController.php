<?php

class TarifController extends BaseController
{
    private Transaksi $model;

    public function __construct()
    {
        session_start();
        $this->model = new Transaksi();
    }

    public function getIndex()
    {
        $data = $this->model->rawQuery("SELECT transactions.*, wash_types.name as wash_type_name FROM transactions LEFT JOIN wash_types ON wash_types.id = transactions.wash_type_id")->get();

        return $this->view('admin.tarif', ['transaksi' => $data]);
    }
    
    public function getEdit()
    {
        $id = $this->get('id');
        $this->model->rawQuery("UPDATE FROM `transactions` WHERE id = '$id'");

        //return $this->view("")
        // $this->model->rawQuery("UPDATE FROM transactions WHERE id = '$id'");
    }

    public function  insertpost(){
        $_POST = ('id');
        $_POST = ('keterangan');
        $_POST = ('wash_type_name');
        $_POST = ('total');
    }
}