<?php

namespace App\Controllers;

// new \App\Models
use CodeIgniter\Controller;
use App\Models\UserModel;
namespace App\Controllers;

class admin extends BaseController
{
    private $userModel;
    protected $session;
    protected $request;

    /**
     * Constructor.
     */
    public function __construct()
    {
        helper(['form', 'url']);
        $this->userModel = new UserModel();
        $this->session = session();
        $this->request =  \Config\Services::Request();
    }

    public function index()
    {
        if (!$this->userModel->check_login()) {
            return self::Login();
        }
        $data = [
            'username' => $this->session->get('user')->username,
        ];
        echo view('admin/render/header', $data);
        echo view('admin/render/sidebar', $data);
        echo view('admin/index', $data);
        echo view('admin/render/footer', $data);
    }

    // public function Login()
    // {
    //     print_r("abc");exit;
    //     if ($this->request->getPost()) {
    //         if ($user = $this->userModel->Login($username = $this->request->getPost('username'), $password = $this->request->getPost('password'))) {
    //             $this->session->set('user', $user);
    //             $this->session->setFlashData('message', 'Welcome back');
    //             return redirect()->to('dashboard')->withCookies();
    //         } else {
    //             $this->session->setFlashData('message', 'Login Failed');
    //         }
    //     }
    //     $data['message'] = $this->session->getFlashData('message');
    //     $data['username'] = form_input('username', $username ?? '', 'class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username..."');
    //     $data['password'] = form_input('password', $password ?? '', 'class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"', 'password');
    //     return view('login', $data);
    // }
}