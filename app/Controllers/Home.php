<?php

namespace App\Controllers;
use SYSTEMPATH\Session;

class Home extends BaseController
{
    public function Home()
    {
        return view("home");
    }
    
    public function User()
    {
        return view("user");
    }

    public function UserType()
    {
        return view("user_type");
    }

}
