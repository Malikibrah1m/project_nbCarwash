<?php

use Carbon\Carbon;

class KeuntunganController extends BaseController
{

    private $profit;
    public function __construct()
    {
        session_start();
        if (!$_SESSION['user']) {
            return header("location: " . BASE_URL);
        }
        $this->profit = new Profit;
    }

    public function getIndex()
    {
        return $this->view('admin.jumlah_keuntungan');
    }

    public function getSelected_date()
    {
        $date = $this->get('date');
        $data = $this->profit->where(array('date' => $date))->get();
        if ($data->num_rows < 5) {
            http_response_code(404);
            echo json_encode(array('data'=>[]));
        }
    }

    public function getShow_data()
    {
        $date = $this->get('date');
        $profit = $this->profit->where(array('date' => $date))->get();
        header('Content-Type: application/json');
        $data = [];
        if ($profit->num_rows > 0) {
            while ($row = $profit->fetch_assoc()) {
                $data[] = $row;
            }
        }
        // print_r($data);
        echo json_encode(array('data' => $data));
    }

    public function postInsert()
    {
        $sesi = $this->post('daytime');
        $date = $this->get('date');
        $now = Carbon::now();
        switch ($sesi) {
            case 'Sesi 1':
                $sql = "SELECT SUM(total) as total FROM transactions WHERE HOUR(time) BETWEEN 8 AND 11 AND date = '$date'";
                break;
            case 'Sesi 2':
                $sql = "SELECT SUM(total) as total FROM transactions WHERE HOUR(time) BETWEEN 11 AND 16 AND date = '$date'";
                break;
            case 'Sesi 3':
                $sql = "SELECT SUM(total) as total FROM transactions WHERE HOUR(time) BETWEEN 14 AND 16 AND date = '$date'";
                break;
            case 'Sesi 4':
                $sql = "SELECT SUM(total) as total FROM transactions WHERE HOUR(time) BETWEEN 16 AND 19 AND date = '$date'";
                break;
            case 'Sesi 5':
                $sql = "SELECT SUM(total) as total FROM transactions WHERE HOUR(time) BETWEEN 19 AND 22 AND date = '$date'";
                break;
            default:
                $sql = '';
                break;
        }
        $check = $this->profit->rawQuery("SELECT * FROM `profits` WHERE `date` = '$date' && `daytime` = '$sesi'")->get();
        $profit = $this->profit->rawQuery($sql)->get();

        $id = str_replace(' ', '-', strtolower($sesi)) . '-' . $date;
        if ($profit->num_rows > 0) {
            while ($row = $profit->fetch_assoc()) {
                $total = $row;
            }
        }
        if ($check->num_rows == 1) {
            http_response_code(400);
            echo json_encode(array('message' => "Data di sesi tersebut sudah terdata"));
        } else {

            // print_r($total['total']);
            $total = $total['total'];
            $for_owner = $total * 0.5;
            $for_employee = $for_owner * 0.35;
            $for_cash = $for_employee * 0.15;
            // echo "INSERT INTO `profits` VALUES ('$id','$date','$total','$sesi','$for_employee','$for_cash','$for_owner'";
            $insert = $this->profit->rawQuery("INSERT INTO `profits`(`id`, `date`, `total`, `daytime`, `for_employee`, `for_cash`, `for_owner`) VALUES ('$id','$date','$total','$sesi','$for_employee','$for_cash','$for_owner')")->get();
            if ($insert) {
                echo json_encode(array('message' => "Data berhasil dimasukkan"));
            }
        }
    }

    public function postInsert_karyawan()
    {
        $user_id = $this->post('user_id');
        $date = $this->post('date');
        $daytime = $this->post('daytime');
        $id = $user_id . '-' . $date . '-' . str_replace(' ', '-', strtolower($daytime));
        // $check = Employee::where('id', '=', $id)->where('date', '=', $request->input('date'))->where('user_id', '=', $request->input('user_id'))->count();
        // echo $date;
        $employee = new Employee;
        $check = $employee->rawQuery("SELECT * FROM `employees` WHERE `user_id` = '$user_id' && `date` = '$date' && `id` = '$id'")->get();
        if ($check->num_rows != 0) {
            http_response_code(302);
            echo json_encode(array('message'=>'Data telah ada'));
        } else {

            // $input = array(
            //     'id' => $id,
            //     'user_id' => $request->input('user_id'),
            //     'date' => $request->input('date'),
            //     'time' => $request->input('daytime'),
            // );
            // Employee::create($input);
            $employee->rawQuery("INSERT INTO `employees`(`id`, `user_id`, `date`, `time`) VALUES ('$id','$user_id','$date','$daytime')");
            echo json_encode(array('message'=>'Success'));
        }
    }

    public function getData_profit()
    {
        $employee = new Employee;
        $date = $this->get('date');
        $employee = $employee->rawQuery("SELECT `date`,users.name as name,`time`,`total_fee` FROM `employees` JOIN users ON employees.user_id = users.id where `date` ='$date'")->get();
        if ($employee->num_rows > 0) {
            while ($row = $employee->fetch_assoc()) {
                $data[] = $row;
            }
        }
        echo json_encode(array('data'=>$data));
    }
    
    public function postTotal_fee()
    {
        $employee = new Employee;
        $array = ['Sesi 1', 'Sesi 2', 'Sesi 3', 'Sesi 4', 'Sesi 5'];
        for ($i = 0; $i < count($array); $i++) {
            $date = $this->post('date');
            // $totalsesi = '';
            // $totalsesi = Profit::where('date', '=', $request->input('date'))->where('daytime', '=', $array[$i])->first();
            $totalsesi = $this->profit->rawQuery("SELECT total FROM profits WHERE daytime = '$array[$i]' AND date = '$date'")->get();
            while ($row = $totalsesi->fetch_assoc()) {
                $totalTransaksi = $row;
            }
            // $countSchedule = Employee::where('date', '=', $request->input('date'))->where('time', '=', $array[$i])->count();
            $countSchedule = $employee->rawQuery("SELECT count(id) as total FROM employees WHERE time = '$array[$i]' AND date = '$date'")->get();
            while ($row = $countSchedule->fetch_assoc()) {
                $hitungJadwal = $row;
            }
            // print_r($hitungJadwal['total']);
            if ($hitungJadwal['total'] != 0) {
                $fee = $totalTransaksi['total'] / $hitungJadwal['total'];
                $employee->rawQuery("UPDATE employees SET total_fee = '$fee' WHERE time = '$array[$i]' AND date = '$date'");
                // Employee::where('date', '=', $request->input('date'))->where('time', '=', $array[$i])->update(['total_fee' => $fee]);
            }
        }
    }
}
