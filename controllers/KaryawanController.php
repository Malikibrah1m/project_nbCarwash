<?php

use Illuminate\Support\Arr;

class KaryawanController extends BaseController
{
    private Employee $model;

    public function __construct()
    {
        session_start();
        if (!$_SESSION['user']) {
            return header("location: " . BASE_URL);
        }
    }

    public function getIndex()
    {
        $user = new User;
        $user = $user->where(condition: array('role'=> 'admin'), separator: '!= ')->get();
     return $this->view(template: 'admin.employee',data: array ('user'=>$user));
        
    }
    
    
    }