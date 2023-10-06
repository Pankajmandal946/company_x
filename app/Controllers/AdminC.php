<?php

namespace App\Controllers;
// require_once '../model/AdminM.php';
use App\Models\AdminM;

class AdminC extends BaseController
{
    public function Login()
    {
        return view("login");
    }
    public function Error()
    {
        return view("errors/html/error404");
    }

    public function Logout() 
    {
        session_start();
        session_destroy();
        header('location: http://localhost/pankaj/compny_x/Login'); die();
    }
}
