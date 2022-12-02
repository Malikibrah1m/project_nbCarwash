<?php

class TransaksiController extends BaseController
{
    private Transaction $model;

    public function __construct()
    {
        $this->model = new Transaction();
    }

    public function getIndex()
    {
        $data = $this->model->rawQuery("SELECT transactions.*, wash_types.name as wash_type_name FROM transactions LEFT JOIN wash_types ON wash_types.id = transactions.wash_type_id")->get();

        return $this->view('admin.transaksi', ['transaksi' => $data]);
    }
}
