<?php

class TransaksiController extends BaseController
{
<<<<<<< HEAD
    private Transaksi $model;

    public function __construct()
    {
        $this->model = new Transaksi();
=======
    private Transaction $model;

    public function __construct()
    {
        $this->model = new Transaction();
>>>>>>> 1a9c8787c7d6a1e098ad4581f33f143b18c7813e
    }

    public function getIndex()
    {
        $data = $this->model->rawQuery("SELECT transactions.*, wash_types.name as wash_type_name FROM transactions LEFT JOIN wash_types ON wash_types.id = transactions.wash_type_id")->get();

        return $this->view('admin.transaksi', ['transaksi' => $data]);
    }
}
