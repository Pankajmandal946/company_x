<?php namespace App\Controllers;

use \App\Models\AdminM;
// require_once '../model/AdminM.php';
class ValidateLogin extends BaseController
{

    public function Login()
    {
        return view("login");
    }

    public function VLogin()
    {
        try {
            $json = file_get_contents('php://input');
            if (isset($json) && !empty($json)) {
                $request = json_decode($json);
                // print_r($request);die();
                $user_login = new AdminM();
                if (isset($request->activity) && $request->activity == 'login') {
                    $user_login->username = $request->username;
                    $user_login->password = $request->password;
                    $user_login->password = $request->password;
                    $user_login->password = $request->password;
                    if ($user_login->validate_login()) {
                        $response = [
                            'success' => 1,
                            'code' => 200,
                            'msg' => 'Valid Login Details!'
                        ];
        
                        http_response_code(200);
                        echo json_encode($response);
                    } else {
                        throw new Exception('Please post request in json format or it can not be blank', 400);
                    }
                } else {
                    throw new Exception('Please post request in json format or it can not be blank', 400);
                }
            } else {
                throw new Exception('Please post request in json format or it can not be blank', 400);
            }
        } catch (\PDOException $e) {
            $response = [
        
                'success' => 0,
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            ];
            http_response_code(500);
            echo json_encode($response);
        } catch (\Exception $e) {
            $response = [
                'success' => 0,
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            ];
            http_response_code($e->getCode());
            echo json_encode($response);
        }
    }

    public function ModfiPasswrd()
    {
        try {
            $json = file_get_contents('php://input');
            if (isset($json) && !empty($json)) {
                $request = json_decode($json);
                // print_r($request);die();
                $user_login = new AdminM();
                if (isset($request->activity) && $request->activity == 'modify_password') {
                    @session_start();
                    $user_login->username = $_SESSION['dk_username'];
                    $user_login->password = $request->current_password;
                    if ($user_login->validate_user()>0) {
                        $user_login->user_id = $_SESSION['dk_user_id'];
                        $user_login->password = $request->new_password;
                        if ($user_login->modify_password()) {
                            $response = [
                                'success' => 1,
                                'code' => 200,
                                'msg' => 'Password Modifyed successfully'
                            ];
                
                            http_response_code(200);
                            echo json_encode($response);
                        } else {
                            throw new Exception('Fail To Modify Password', 400);
                        }
                    } else {
                        throw new Exception('Invaild Username or Password', 400);
                    }
                } else {
                    throw new Exception('Please post request in json format or it can not be blank', 400);
                }
            } else {
                throw new Exception('Please post request in json format or it can not be blank', 400);
            }
        } catch (\PDOException $e) {
            $response = [
        
                'success' => 0,
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            ];
            http_response_code(500);
            echo json_encode($response);
        } catch (\Exception $e) {
            $response = [
                'success' => 0,
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            ];
            http_response_code($e->getCode());
            echo json_encode($response);
        }
    }

    public function ChangPasswrd()
    {
        try {
            $json = file_get_contents('php://input');
            if (isset($json) && !empty($json)) {
                $request = json_decode($json);
                // print_r($request);die();
                $user_login = new AdminM();
                if (isset($request->activity) && $request->activity == 'change_password') {
                    $user_login->username = $request->default_username;
                    $user_login->password = $request->current_password;
                    $user_id = $user_login->validate_user();
                    if ($user_id>0) {
                        $user_login->user_id = $user_id;
                        $user_login->password = $request->new_password;
                        if ($user_login->change_password()) {
                            $response = [
                                'success' => 1,
                                'code' => 200,
                                'msg' => 'Defualt Password changed successfully'
                            ];
                
                            http_response_code(200);
                            echo json_encode($response);
                        } else {
                            throw new \Exception('Fail To Modify Password', 400);
                        }
                    } else {
                        throw new \Exception('Invaild Username or Password', 400);
                    }
                } else {
                    throw new Exception('Please post request in json format or it can not be blank', 400);
                }
            } else {
                throw new Exception('Please post request in json format or it can not be blank', 400);
            }
        } catch (\PDOException $e) {
            $response = [
        
                'success' => 0,
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            ];
            http_response_code(500);
            echo json_encode($response);
        } catch (\Exception $e) {
            $response = [
                'success' => 0,
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            ];
            http_response_code($e->getCode());
            echo json_encode($response);
        }
    }
}
