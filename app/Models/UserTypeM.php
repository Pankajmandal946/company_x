<?php
// require_once '../config/DBConnection.php';
namespace App\Models;

use CodeIgniter\Model;

class UserTypeM extends Model
{

    Public $user_type_id, $user_type, $sort_code, $sort_order, $is_active, $created_by, $created_on, $updated_by, $updated_on, $table_name, $db, $conn;

    function __construct(){
        $this->user_type_id = "";
        $this->user_type = "";
        $this->sort_code = "";
        $this->sort_order = 0;
        $this->is_active = 1;
        $this->created_by = 0;
        $this->updated_by = 0;
        $this->table_name = "user_type";
        $this->db = \Config\Database::connect();
    }

    public function u_typeinsert(){
            $user_type     = $this->user_type;
            $sort_code     = $this->sort_code;
            $sort_order    = $this->sort_order;
            $is_active     = $this->is_active;
            $created_by    = $this->created_by;

        $Qry = "INSERT INTO ".$this->table_name." (user_type, sort_code, sort_order, is_active, created_by) VALUES('$user_type', '$sort_code', '$sort_order', '$is_active', '$created_by')";
        $pQuery= $this->db->query($Qry);
        // $row = $pQuery->getRowArray();
        // print_r($row);exit;
        $this->db->close();
        return true;
    }

    // Update 
    public function u_typeupdate(){

            $user_type_id = $this->user_type_id;
            $user_type = $this->user_type;
            $sort_code = $this->user_sort;
            $is_active = $this->is_active;
            $created_by = $this->created_by;
           
        // print_r($data);exit;
        $Qry = "UPDATE ".$this->table_name." SET user_type = '$user_type', sort_code = '$sort_code', is_active = '$is_active', created_by = '$created_by' WHERE user_type_id = '$user_type_id' AND is_active = '$is_active'";
        $pQuery= $this->db->query($Qry);
        // $row = $pQuery->getRowArray();
        // print_r($row);exit;
        $this->db->close();
        return true;
    }


    //Delete
    public function u_typedelete(){

            $user_type_id  = $this->user_type_id;
            $is_active     = 2;
            $updated_by    = $this->updated_by;

        $sql = "UPDATE ".$this->table_name." SET is_active = '$is_active', updated_by = '$updated_by' WHERE user_type_id = '$user_type_id'";
        $pQuery= $this->db->query($sql);
        // $row = $pQuery->getRowArray();
        // print_r($row);exit;
        $this->db->close();
        return true;
    }

    
    // Get
    public function get($Request = []){
        $output = [];
        $is_active  = 2;

        if(!empty($Request)){
            $query = "SELECT user_type_id,user_type, sort_code, sort_order FROM ".$this->table_name." WHERE is_active < '$is_active'";

            if (isset($Request->search->value)) {
                $data['search_value'] = '%'.$Request->search->value.'%';
                $query .= " AND (user_type LIKE :search_value";
                $query .= " OR sort_code LIKE :search_value";
                $query .= " OR sort_order LIKE :search_value)";
            } 
            if (isset($Request->order) && $Request->order['0']->column > 0) {
                $query .= " ORDER BY ".$Request->order['0']->column." ".$Request->order['0']->dir;
            } else {
                $query .= ' ORDER BY user_type asc ';
            }
            if (isset($Request->length) && $Request->length != -1) {
                $query .= ' LIMIT ' . $Request->start. ', ' . $Request->length;
            }

        }else{
            $query = "SELECT * FROM ".$this->$table_name." WHERE is_active < '$is_active'";
        }

        $pQuery= $this->db->query($query);
        $row = $pQuery->getRowArray();
        print_r($row);exit;
        // print_r($row);exit;
        $this->db->close();
        // $stmt = $this->conn->prepare($query);
        // $stmt->execute($data);
        // $last_query = $stmt->queryString;
        // $debug_query = $stmt->_debugQuery();
        // $results = $stmt->fetchAll();
        // $count = $stmt->rowCount();
        // $stmt->closeCursor();

        if($count > 0){
            foreach($results as $row){
                $output[] = [
                    'user_type_id' => $row['user_type_id'],
                    'user_type' => $row['user_type'],
                    'sort_code' => $row['sort_code'],
                    'sort_order' => $row['sort_order']
                ];
            }
        }
        return $output;



    }

    // Check
    public function check() {

        $data = [
            'user_type'   => $this->user_type,
            'is_active'     => 1,
        ];
        $stmt = $this->conn->prepare("SELECT user_type_id FROM ".$this->table_name." WHERE user_type = :user_type AND is_active=:is_active");
        $stmt->execute($data);
        $count = $stmt->rowCount();
        if($count>0) {
            $row = $stmt->fetch();
            $this->user_type_id = $row['user_type_id'];
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





}

?>