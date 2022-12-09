<?php

use Carbon\Carbon;

class BookingAPIController extends ApiController
{
    private $booking;
    public function __construct()
    {
        session_start();
        $booking = new Booking();
        $this->booking = $booking;
    }

    public function getIndex()
    {
        $date = Carbon::now()->format('Y-m-d');
        $listData = $this->booking->rawQuery("SELECT bookings.id,bookings.name AS costumer_name,no_hp,plate_number,merk_model,wash_types.name,time,total,date FROM `bookings` JOIN wash_types on wash_type_id = wash_types.id where date = '$date'")->get();
        $data = [];
        if ($listData->num_rows > 0) {
            while ($row = $listData->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = "0 results";
        }
        // $data = $this->get('id');
        // $data = $_GET['id'];
        // echo json_encode(array('data' => $data));
        return $this->succesResponse($data);
    }

    public function getDetail()
    {
        $id = $this->get('id');
        $dataDetail = $this->booking->where(array('id'=>$id))->get();
        if ($dataDetail->num_rows > 0) {
            while ($row = $dataDetail->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = "0 results";
        }
        $id = $data[0]['id'];
        $sqlInsert = "INSERT INTO 
        `transactions`(`id`, `name`, `plate_number`, `no_hp`, `merk_model`, `wash_type_id`, `time`, `total`, `date`, `note`, `created_at`, `updated_at`) 
        VALUES ('$id','$data[0]['name']','$data[0]['id']','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]')";
        $trans = new Transaksi();
        // $trans->rawQuery();
        echo json_encode(array('data' => $data[0]['id']));
    }
}
