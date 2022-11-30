<?php
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
            echo json_encode(array('message' => 'error...'));
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

        $id = str_replace(' ','-',strtolower($sesi)).'-'.$date;
        if ($profit->num_rows > 0) {
            while ($row = $profit->fetch_assoc()) {
                $data[] = $row;
            }
        } 
        echo json_encode(array('data' => $data));
        // $for_owner = $profit[0]->total * 0.5;
        // $for_employee = $for_owner * 0.35;
        // $for_cash = $for_employee * 0.15;

    }
}
