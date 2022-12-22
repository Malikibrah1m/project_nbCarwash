<?php

use Carbon\Carbon;

class AkunController extends BaseController
{
    public function __construct()
    {
        session_start();
        if (!$_SESSION['user']) {
            return header("location: " . BASE_URL);
        }
    }
    public function getIndex()
    {
        return $this->view('admin.pengaturan-akun');
    }
    public function postUpdate()
    {
        $user = new User;
        $timestamp = Carbon::now()->toDateTimeString();
        $email = $this->post('email');
        $pass = $this->post('password');
        $id = $this->post('id');
        if ($pass == '') {
            $result = $user->rawQuery("UPDATE `users` SET `email`='$email',`updated_at`='$timestamp' WHERE id = '$id'")->get();
        } else {
            $result = $user->rawQuery("UPDATE `users` SET `email`='$email', `password`='$pass',`updated_at`='$timestamp' WHERE id = '$id'")->get();
        }
        return header("location: " . BASE_URL);
        
    }
}
