<?php

class RekapController extends BaseController
{
    use LoginCheck;
    public function getIndex()
    {
        return $this->view('admin.rekap');
    }

    public function getRekap_data()
    {
        header('Content-Type: application/json');
        $keuntungan = new Profit();
        $rekap = $keuntungan->all();
        $data = [];
        if ($rekap->num_rows > 0) {
            while ($row = $rekap->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            echo "0 results";
        }
        // print_r($data);
        echo json_encode(array('data'=>$data));
    }

    public function export()
    {
        
    }
}
