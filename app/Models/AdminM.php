<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminM extends Model
{
    
    Public $user_login_id, $user_id, $username, $password, $last_login_time, $new_password,$last_login_ip, $default_password_change, $password_change_time, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $db, $conn;

    function __construct(){
        $this->user_login_id = "";
        $this->user_id = 0;
        $this->username = "";
        $this->password = "";
        $this->last_login_time = NULL;
        $this->last_login_ip = "";
        $this->default_password_change = 0;
        $this->password_change_time = NULL;
        $this->is_active = 1;
        $this->created_by = 0;
        $this->updated_by = 0;
        $this->table_name = "user_login";
        $this->db = \Config\Database::connect();
        // $this->conn = $this->db->connect();
    }

    function Loginsert(){
            $user_id                     = $this->user_id;
            $username                    = $this->username;
            $password                    = $this->generate_password($this->password);
            $last_login_time             = $this->last_login_time;
            $last_login_ip               = $this->last_login_ip;
            $default_password_change     = $this->default_password_change;
            $password_change_time        = $this->password_change_time;
            $is_active                   = $this->is_active;
            $created_by                  = $this->created_by;
        
        $Qry = "INSERT INTO ".$this->table_name." (user_id, username, password, last_login_time, last_login_ip, default_password_change, password_change_time, is_active, created_by) VALUES ($user_id, $username, $password, $last_login_time, $last_login_ip, $default_password_change, $password_change_time, $is_active, $created_by)";
        $pQuery= $this->db->query($Qry);
        // $row = $pQuery->getRowArray();
        // print_r($row);exit;
        $this->db->close();
        return true;
    }
    
    function Logupdate() {
            $user_login_id               = $this->user_login_id;
            $user_id                     = $this->user_id;
            $username                    = $this->username;
            $password                    = $this->generate_password($this->password);
            $is_active                   = $this->is_active;
            $updated_by                  = $this->updated_by;

        $Qry = "UPDATE ".$this->table_name." SET user_id=:user_id, username='$username', password='$password',  is_active='$is_active', updated_by='$updated_by' WHERE user_id='$user_id'";
        $pQuery= $this->db->query($Qry);
        // $row = $pQuery->getRowArray();
        // print_r($row);exit;
        $this->db->close();
        return true;
    }
    
    function Logdelete() {

            $user_login_id    = $this->user_login_id;
            $is_active         = 2;
            $updated_by        = $this->updated_by;

        $Qry = "UPDATE ".$this->table_name." SET is_active='$is_active', updated_by='$updated_by' WHERE user_login_id='$user_login_id'";
        $pQuery= $this->db->query($Qry);
        // $row = $pQuery->getRowArray();
        // print_r($row);exit;
        $this->db->close();
        $last_query = $pQuery->getQuery();;
        return $last_query;
    }
    
    function remove() {

            $user_id    = $this->user_id;
            $is_active  = 2;
            $updated_by = $this->updated_by;

        $Qry = "UPDATE ".$this->table_name." SET is_active='$is_active', updated_by='$updated_by' WHERE user_id='$user_id'";
        $pQuery= $this->db->query($Qry);
        // $row = $pQuery->getRowArray();
        // print_r($row);exit;
        $this->db->close();
        return true;
    }

    function get($Request) {
        $output = [];
        $is_active = 2;

        if(!empty($Request)){
            $query = "SELECT user_id,username,password,last_login_time ,last_login_ip,default_password_change,user_id_id FROM ".$this->table_name." WHERE is_active < '$is_active'";  
            if (isset($Request->search->value)) {
                $data['search_value'] = '%'.$Request->search->value.'%';
                $query .= " AND (user_id LIKE :search_value";
                $query .= " OR username LIKE :search_value";
                $query .= " OR password LIKE :search_value";
                $query .= " OR last_login_time LIKE :search_value";
                $query .= " OR last_login_ip LIKE :search_value";
                $query .= " OR default_password_change	 LIKE :search_value)";
            } 
            if (isset($Request->order) && $Request->order['0']->column > 0) {
                $query .= " ORDER BY ".$Request->order['0']->column." ".$Request->order['0']->dir;
            } else {
                $query .= ' ORDER BY username asc ';
            }
            if ($Request->length != -1) {
                $query .= ' LIMIT ' . $Request->start. ', ' . $Request->length;
            }
        }else{
            $query = "SELECT * FROM ".$this->table_name." WHERE is_active < '$is_active'";    
        }
        $pQuery = $this->db->query($query);
        $results = $pQuery->getResultArray();
        // print_r($row);exit;
        $this->db->close();
        if(isset($row) && count($row)>0) {
            foreach($results as $row) {
                $output[] = [
                    'user_login_id'             => $row['user_login_id'],
                    'user_id'                   => $row['user_id'],
                    'username'                  => $row['username'],
                    'password'                  => $row['password'],
                    'last_login_time'           => $row['last_login_time'],
                    'last_login_ip'             => $row['last_login_ip'],
                    'default_password_change'   => $row['default_password_change']
                ];
            }
        }
        return $output;
    }

    function check() {

            $user_id   = $this->user_id;
            $is_active = 1;

        $pQuery = $$this->db->query("SELECT user_login_id FROM ".$this->table_name." WHERE user_id = '$user_id' AND is_active= '$is_active'");
        $row = $pQuery->getRowArray();
        $this->db->close();
        if(isset($row) && count($row)>0) {
            $this->user_login_id = $row['user_login_id'];
            return true;
        } else 
            return false;
    }

    function check_username() {
        
        $username  = $this->username;
        $is_active = 1;

        $pQuery = $this->db->query("SELECT user_login_id FROM ".$this->table_name." WHERE username = '$username' AND is_active='$is_active'");
        $row = $pQuery->getRowArray();
        // print_r($row);exit;
        $this->db->close();
        if(isset($row) && count($row)>0) {
            $this->user_login_id = $row['user_login_id'];
            return true;
        } else 
            return false;
    }

    function get_total_count(){
        $stmt = $this->conn->prepare("SELECT * FROM ".$this->table_name." WHERE is_active < 2");
        $stmt->execute();
        $results = $stmt->fetchAll();
        $count = $stmt->rowCount();
        $stmt->closeCursor();
        return $count;
    }

    function validate_login() {

        $username  = $this->username;
        $is_active = 1;
        
        $pQuery = $this->db->query("SELECT user_login_id, ".$this->table_name.".user_id, name, email_id, mobile_no, username,user_type.user_type, password, default_password_change FROM ".$this->table_name." INNER JOIN user ON (".$this->table_name.".user_id=user.user_id) INNER JOIN user_type ON (user.user_type_id=user_type.user_type_id) WHERE username = '$username' AND ".$this->table_name.".is_active='$is_active'");
        $row = $pQuery->getRowArray();
        // print_r($row);exit;
        $this->db->close();
        if(isset($row) && count($row)>0) {
            if($this->validate($this->password, $row['password'])) {
                if($row['default_password_change']==1) {
        
                    date_default_timezone_set("Asia/Calcutta");
                    $user_login_id = $row['user_login_id'];
                    $last_login_time = date('Y-m-d H:i:s');

                    $sql = "UPDATE ".$this->table_name." SET last_login_time ='$last_login_time' WHERE user_login_id='$user_login_id'";
                    $pQuery= $this->db->query($sql);
                    $this->db->close();
                    
                    session_start();
                    $_SESSION["dk_session_status"]     = true;
                    $_SESSION["dk_user_id"]            = $row['user_id'];
                    $_SESSION["dk_user_login_id"]      = $row['user_login_id'];
                    $_SESSION["dk_name"]               = $row['name'];
                    $_SESSION["dk_email_id"]           = $row['email_id'];
                    $_SESSION["dk_mobile_no"]          = $row['mobile_no'];
                    $_SESSION["dk_user_type"]          = $row['user_type'];
                    $_SESSION["dk_username"]           = $row['username'];
                    // print_r($_SESSION);exit;
                    return true;
                } else {
                    throw new \Exception('Please change your default password', 402);
                }
            } else {
                throw new Exception("Invalid Password",401);
            }
        } else {
            throw new Exception('User does not exists', 401);
        }
    }

    function validate_user() {

            $username  = $this->username;
            $is_active = 1;

        $stmt = $this->conn->prepare("SELECT user_login_id, ".$this->table_name.".user_id, name, email_id, mobile_no, username,user_type.user_type, password, default_password_change FROM ".$this->table_name." INNER JOIN user ON (".$this->table_name.".user_id=user.user_id) INNER JOIN user_type ON (user.user_type_id=user_type.user_type_id) WHERE username = '$username' AND ".$this->table_name.".is_active='$is_active'");
        $count = $stmt->rowCount();
        $row = $stmt->fetch();
        $stmt->closeCursor();
        if($count>0) {
            if($this->validate_password($this->password, $row['password'])) {
                return $row['user_id'];
            } else {
                throw new Exception("Invalid Password");
            }
        } else {
            throw new Exception("User does not exist");
        }
    }

    function modify_password() {
        $data = [
            'user_id'                     => $this->user_id,
            'password'                    => $this->generate_password($this->password),
            'is_active'                   => $this->is_active,
            'updated_by'                  => $this->updated_by
        ];
        $sql = "UPDATE ".$this->table_name." SET password=:password,  is_active=:is_active, updated_by=:updated_by WHERE user_id=:user_id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($data);
        $stmt->closeCursor();
        return true;
    }

}

/*
if(isset($row) && count($row)>0) {
    if($this->validate($this->password, $row['password'])) {
        if($row['default_password_change']==1) {

            date_default_timezone_set("Asia/Calcutta");
            $user_login_id = $row['user_login_id'];
            $last_login_time = date('Y-m-d H:i:s');
            // $data = [
            //     'user_login_id'               => $row['user_login_id'],
            //     'last_login_time'             => date('Y-m-d H:i:s')
            // ];
            $sql = "UPDATE ".$this->table_name." SET last_login_time ='$last_login_time' WHERE user_login_id='$user_login_id'";
            $pQuery= $this->db->query($sql);
            // $this->db->close();
            
            session_start();
            $_SESSION["dk_session_status"]     = true;
            $_SESSION["dk_user_id"]            = $row['user_id'];
            $_SESSION["dk_user_login_id"]      = $row['user_login_id'];
            $_SESSION["dk_name"]               = $row['name'];
            $_SESSION["dk_email_id"]           = $row['email_id'];
            $_SESSION["dk_mobile_no"]          = $row['mobile_no'];
            $_SESSION["dk_user_type"]          = $row['user_type'];
            $_SESSION["dk_username"]           = $row['username'];

            return true;
        } else {
            print_r("abc");exit;
            throw new \Exception('Please change your default password', 402);
        }
    } else {
        throw new \Exception("Invalid Password",401);
    }
} else {
    throw new Exception('User does not exists', 401);
}
*/ 