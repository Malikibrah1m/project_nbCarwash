<?php

use Carbon\Carbon;

class AdminController extends BaseController
{
    public function __construct()
    {
        session_start();
        // if (!session_name('user')) {
        //     return header("location: ".BASE_URL);
        // }

        if (!$_SESSION['user']) {
            return header("location: ".BASE_URL);
        }
    }
    public function getIndex()
    { 
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $profit = new Profit();
        $profitPerBulan = $profit->rawQuery("select sum(for_owner) as totalPerBulan from profits where month(date) = $month && year(date) = $year")->get();
        while ($row = $profitPerBulan->fetch_assoc()) {
            $data['profitPerbulan'] = $row['totalPerBulan'];
        }
        // $data 
        // print_r($data);

        return $this->view('admin.index',$data);
    }

    public function getData_tahunan()
    {
        $year = Carbon::now()->format('Y');
        $date = Carbon::now()->format('Y-m-d');
        $trans = new Transaksi();
        $listTrans = $trans->rawQuery("select count(*) as y,DATE_FORMAT(date,'%b') as x from transactions where YEAR(date) = $year group by month(date)")->get();
        $data = [];
        if ($listTrans->num_rows > 0) {
            while ($row = $listTrans->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = [];
        }
        echo json_encode($data);
    }
}
