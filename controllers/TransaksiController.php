<?php

class TransaksiController extends BaseController
{
    public function __construct()
    {
        $this->model = new Transaksi();
    }

    public function getIndex()
    {
        $data = $this->model->rest();

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
