<?php

class TransaksiController extends BaseController
{
    private Transaksi $model;

    public function __construct()
    {
        session_start();
        $this->model = new Transaksi();
    }

    public function getIndex()
    {
       
        return $this->view('admin.transaksi');
    }
    public function deleteHapus()
    {
        $id = $this->get('id');
        $this->model->rawQuery("DELETE FROM `transactions` WHERE id = '$id'");
        $url = BASE_URL . 'transaksi';
        header("Location: $url");
        // $this->model->rawQuery("DELETE FROM transactions WHERE id = '$id'");
    }

    public function getData_trans()
    {
        $listData = $this->model->rawQuery("SELECT transactions.*, wash_types.name as wash_type_name FROM transactions LEFT JOIN wash_types ON wash_types.id = transactions.wash_type_id")->get();
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
