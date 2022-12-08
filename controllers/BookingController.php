<?php

use Carbon\Carbon;

class BookingController extends BaseController
{

    private $booking;
    public function __construct()
    {
        $this->booking = new Booking();
    }

    public function getIndex()
    {
        $status = $this->booking->rawQuery("SELECT COUNT(*) from bookings WHERE is_valid = 'true'")->get();
        // $status = $this->booking->mysql()->query("SELECT COUNT('id') as count from bookings WHERE is_valid = 'true'");
        // print_r($status->fetch_row());
        return $this->view('booking', array('status' => $status->fetch_row()));
    }

    public function postInsert()
    {
        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->format('H:i');
        $name = $this->post('name');
        $time = $this->post('time');
        $wash_type_id = $this->post('wash_type_id');
        $merk_model = $this->post('merk_model');
        $plate_number = $this->post('plate_number');
        $total = $this->post('total');
        $id = $date . '-' . str_replace('_',' ',strtolower($name)) . '-' . $time;
        $this->booking->rawQuery("INSERT INTO `bookings`(`id`, `name`, `no_hp`, `is_valid`, `plate_number`, `merk_model`, `wash_type_id`, `time`, `total`, `date`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]'");
    }
}
