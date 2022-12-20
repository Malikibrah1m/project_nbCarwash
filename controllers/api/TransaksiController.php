<?php

use Carbon\Carbon;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TransaksiAPIController extends ApiController
{

    private $trans;
    public function __construct()
    {
        $this->trans = new Transaksi();
    }
    public function postInsert()
    {
        header('Content-Type: application/json');
        $headers = getallheaders();
        if (!isset($headers['Authorization'])) {
            $this->errorResponse("Oopss.. Anda harus login terlebih dahulu", 401);
            exit();
        }
        list(, $token) = explode(' ', $headers['Authorization']);
        try {
            JWT::decode($token,  new Key($_ENV['ACCESS_TOKEN_SECRET'], 'HS256'));
            $json = file_get_contents('php://input');
            $input = json_decode($json);
            try {
                $date = Carbon::now()->format('Y-m-d');
                $time = Carbon::now()->format('H:i');
                $name = $input['name'];
                $time = $input['time'];
                $no_hp = $input['no_hp'];
                $wash_type_id = $input['wash_type_id'];
                $merk_model = $input['merk_model'];
                $plate_number = $input['plate_number'];
                $total = $input['total'];
                $id = $date . '-' . str_replace('_', ' ', strtolower($name)) . '-' . $time;
                $this->trans->rawQuery("INSERT INTO `transactions`(`id`, `name`, `plate_number`, `no_hp`, `merk_model`, `wash_type_id`, `time`, `total`, `date`) VALUES ('$id','$name','$plate_number','$no_hp','$merk_model','$wash_type_id','$time','$total]','$date')")->get();
                new Exception("Oppsss.. ada error");
            } catch (Exception $e) {
                $this->errorResponse($e->getMessage(), 401);
            }
            new Exception("Token Error");
        } catch (Exception $e) {
            $this->errorResponse($e->getMessage(), 401);
        }
    }
}
