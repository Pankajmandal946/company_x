<?php namespace App\Controllers;
// require_once '../model/user_type.php';
use \App\Models\UserTypeM;
print_r($user_type);exit;
class UserTypeC extends BaseController{

    // public function User_type()
    // {
    //     try {
    //         if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST') {
    //             $json = file_get_contents('php://input');
    //             if(isset($json) && !empty($json)) {
    //                 $request = json_decode($json);
    //                 if(isset($request) && !empty($request)) {
    //                     if(isset($request->action)) {
    //                         $user_type = new UserTypeM();
    //                         print_r($user_type);exit;
    //                         if($request->action=='add') {
    //                             $user_type->user_type   = $request->user_type;
    //                             $user_type->sort_code   = $request->sort_code;
    //                             if($user_type->check() === false) {
    //                                 $user_type->insert();
    //                                 $response = [
    //                                     'success' => 1,
    //                                     'code' => 200,
    //                                     'msg' => 'User Type successfully added!'
    //                                 ];
        
    //                                 http_response_code(200);
    //                                 echo json_encode($response);
    //                             } else {
    //                                 throw new Exception('User Type Already Exists',400);
    //                             }
    //                         } else {
    //                             throw new Exception('Invalid action type',400);
    //                         }
    //                     } else {
    //                         throw new Exception('action key missing in request body',400);
    //                     }
                        
    //                 } else {
    //                     throw new Exception('Invalid JSON',400);
    //                 }
    //             } else {
    //                 throw new Exception('Request body missing',400);
    //             }
    //         } else {
    //             throw new Exception('Invalid Request METHOD - METHOD must be POST',400);
    //         }
    //     }catch(PDOException $e){
    //         $response =[
        
    //             'success' => 0,
    //             'code' => $e->getCode(),
    //             'msg' => $e->getMessage()
    //         ];
    //           http_response_code(500);
    //          echo json_encode($response);
        
    //     }catch(Exception $e) {
    //         $response = [
    //             'success' => 0,
    //             'code' => $e->getCode(),
    //             'msg' => $e->getMessage(),
    //         ];
    //         // http_response_code($e->getCode());
    //         echo json_encode($response);
    //     }
    // }

    // public function User_type_update()
    // {
    //     try {
    //         if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST') {
    //             $json = file_get_contents('php://input');
    //             if(isset($json) && !empty($json)) {
    //                 $request = json_decode($json);
    //                 if(isset($request) && !empty($request)) {
    //                     if(isset($request->action)) {
    //                         $user_type = new UserTypeM();
    //                         print_r($user_type);exit;
    //                         if($request->action=='update') {
    //                             // print_r($request);exit;
    //                             $user_type->user_type_id  = $request->user_type_id;
    //                             $user_type->user_type     = $request->user_type;
    //                             $user_type->user_sort     = $request->sort_code;
    //                             $user_type->update();
    //                                 $response = [
    //                                     'success' => 1,
    //                                     'code' => 200,
    //                                     'msg' => 'User Type  Update Successfully!'
    //                                 ];
                            
    //                                 http_response_code(200);
    //                                 echo json_encode($response);
    //                         } else {
    //                             throw new Exception('Invalid action type',400);
    //                         }
    //                     } else {
    //                         throw new Exception('action key missing in request body',400);
    //                     }
                        
    //                 } else {
    //                     throw new Exception('Invalid JSON',400);
    //                 }
    //             } else {
    //                 throw new Exception('Request body missing',400);
    //             }
    //         } else {
    //             throw new Exception('Invalid Request METHOD - METHOD must be POST',400);
    //         }
    //     }catch(PDOException $e){
    //         $response =[
        
    //             'success' => 0,
    //             'code' => $e->getCode(),
    //             'msg' => $e->getMessage()
    //         ];
    //           http_response_code(500);
    //          echo json_encode($response);
        
    //     }catch(Exception $e) {
    //         $response = [
    //             'success' => 0,
    //             'code' => $e->getCode(),
    //             'msg' => $e->getMessage(),
    //         ];
    //         // http_response_code($e->getCode());
    //         echo json_encode($response);
    //     }
    // }

    // public function User_type_delete()
    // {
    //     try {
    //         if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST') {
    //             $json = file_get_contents('php://input');
    //             if(isset($json) && !empty($json)) {
    //                 $request = json_decode($json);
    //                 if(isset($request) && !empty($request)) {
    //                     if(isset($request->action)) {
    //                         $user_type = new UserTypeM();
    //                         print_r($user_type);exit;
    //                         if($request->action=='delete') {
    //                             $user_type->user_type_id = $request->user_type_id;
    //                             $user_type->delete();
    //                             $response = [
    //                                 'success' => 1,
    //                                 'code' => 200,
    //                                 'msg' => 'User Type Successfully deleted!',
    //                             ];
                            
    //                             http_response_code(200);
    //                             echo json_encode($response);
    //                         } else {
    //                             throw new Exception('Invalid action type',400);
    //                         }
    //                     } else {
    //                         throw new Exception('action key missing in request body',400);
    //                     }
                        
    //                 } else {
    //                     throw new Exception('Invalid JSON',400);
    //                 }
    //             } else {
    //                 throw new Exception('Request body missing',400);
    //             }
    //         } else {
    //             throw new Exception('Invalid Request METHOD - METHOD must be POST',400);
    //         }
    //     }catch(PDOException $e){
    //         $response =[
        
    //             'success' => 0,
    //             'code' => $e->getCode(),
    //             'msg' => $e->getMessage()
    //         ];
    //           http_response_code(500);
    //          echo json_encode($response);
        
    //     }catch(Exception $e) {
    //         $response = [
    //             'success' => 0,
    //             'code' => $e->getCode(),
    //             'msg' => $e->getMessage(),
    //         ];
    //         // http_response_code($e->getCode());
    //         echo json_encode($response);
    //     }
    // }

    public function User_type_get()
    {
        try {
            if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST') {
                $json = file_get_contents('php://input');
                if(isset($json) && !empty($json)) {
                    $request = json_decode($json);
                    if(isset($request) && !empty($request)) {
                        if(isset($request->action)) {
                            $user_type = new UserTypeM();
                           
                            if($request->action=='get') {
                                $result = [];
                                if(isset($request->user_type_id) && $request->user_type_id>0) {
                                    $user_type->user_type_id = $request->user_type_id;
                                }
                                $results = $user_type->get($request);
                                if(isset($request->start)) {
                                    $i = $request->start;
                                } else {
                                    $i=0;
                                    $request->draw=0;
                                }
                                foreach($results as $res) {
                                   
                                    ++$i;
                                    $result [] = [
                                        "s_no"       =>  $i,
                                        'user_type_id'  => $res['user_type_id'],
                                        "user_type" =>  $res["user_type"],
                                        "sort_code" =>  $res["sort_code"],
                                        "sort_order" => $res["sort_order"],
                                        "action"     => "<a class='edit cursor-pointer' data-id='".$res['user_type_id']."' data-utype='".$res['user_type']."' data-scode='".$res['sort_code']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>&nbsp;&nbsp;&nbsp;
                                        <a class='delete cursor-pointer text-danger' data-id='".$res['user_type_id']."'><i class='fa fa-trash' aria-hidden='true'></i></a>"
                                    ];
                                }
                                $response = [
                                    'draw'              => intval($request->draw),
                                    'recordsTotal'      => count($results),
                                    'recordsFiltered'   => $user_type->get_total_count(),
                                    'success'           => 1,
                                    'code'              => 200,
                                    'msg'               => 'User Type Fetch Successfully!',
                                    'data'              => $result,
                                ];
                                http_response_code(200);
                                echo json_encode($response);
                            } else {
                                throw new Exception('Invalid action type',400);
                            }
                        } else {
                            throw new Exception('action key missing in request body',400);
                        }
                        
                    } else {
                        throw new Exception('Invalid JSON',400);
                    }
                } else {
                    throw new Exception('Request body missing',400);
                }
            } else {
                throw new Exception('Invalid Request METHOD - METHOD must be POST',400);
            }
        }catch(PDOException $e){
            $response =[
        
                'success' => 0,
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            ];
              http_response_code(500);
             echo json_encode($response);
        
        }catch(Exception $e) {
            $response = [
                'success' => 0,
                'code' => $e->getCode(),
                'msg' => $e->getMessage(),
            ];
            // http_response_code($e->getCode());
            echo json_encode($response);
        }
    }
}

?>