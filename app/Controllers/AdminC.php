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
}
