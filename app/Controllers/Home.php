<?php

namespace App\Controllers;
use SYSTEMPATH\Session;

class Home extends BaseController
{
    public function Home()
    {
        return view("include/header")
            . view("include/navbar")
            . view("include/sidebar")
            . view("home")
            . view("include/footerJs")
            . view("include/footer");
    }

    public function Logout() 
    {
        session_start();
        session_destroy();
        header('location: http://localhost/pankaj/compny_x/Login'); die();
    }
    
}
