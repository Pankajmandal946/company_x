<?php require_once '../config/DBConnection.php';

class User{
    public $table_name,$user_id, $name, $email_id, $mobile_no, $user_type_id,$user_designation_id,$seniority_by_years,$father_name,$email_personal,$mobile_2,$address,$pincode, $login_access, $is_active, $created_by,$created_on, $updated_by, $updated_on, $db, $conn;
    function __construct(){
        $this->user_id = 0;
        $this->name = "";
        $this->email_id = "";
        $this->mobile_no = "";
        $this->user_type_id = 0;
        $this->user_designation_id = 0;
        $this->seniority_by_years = 0;
        $this->father_name = "";
        $this->email_personal = "";
        $this->mobile_2 = "";
        $this->address = "";
        $this->pincode = 0;
        $this->login_access = 0;
        $this->is_active = 1;
        $this->created_by = 0;
        $this->updated_by = 0;
        $this->table_name = 'user';
        $this->db = new DBConnection();
        $this->conn = $this->db->connect();
    }

    function insert(){
        $data = [
            'name'                  => $this->name,
            'email_id'              => $this->email_id,
            'mobile_no'             => $this->mobile_no,
            'user_type_id'          => $this->user_type_id,
            'user_designation_id'   => $this->user_designation_id,
            'seniority_by_years'    => $this->seniority_by_years,
            'father_name'           => $this->father_name,
            'email_personal'        => $this->email_personal,
            'mobile_2'              => $this->mobile_2,
            'address'               => $this->address,
            'pincode'               => $this->pincode,
            'login_access'          => $this->login_access,
            'is_active'             => $this->is_active,
            'created_by'            => $this->created_by
        ];
        $sql = "INSERT INTO ".$this->table_name."(name, email_id, mobile_no, user_type_id, user_designation_id, seniority_by_years, login_access, is_active,father_name,email_personal,mobile_2,address,pincode, created_by) VALUES (:name, :email_id, :mobile_no, :user_type_id, :user_designation_id, :seniority_by_years, :login_access, :is_active, :father_name,:email_personal,:mobile_2,:address,:pincode, :created_by)";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($data);
        $this->user_id = $this->conn->lastInsertId();
        $stmt->closeCursor();
        return true;
    }

    function update() {

        $data = [
            'user_id'               => $this->user_id,
            'name'                  => $this->name,
            'email_id'              => $this->email_id,
            'mobile_no'             => $this->mobile_no,
            'user_type_id'          => $this->user_type_id,
            'user_designation_id'   => $this->user_designation_id,
            'seniority_by_years'    => $this->seniority_by_years,
            'father_name'           => $this->father_name,
            'email_personal'        => $this->email_personal,
            'mobile_2'              => $this->mobile_2,
            'address'               => $this->address,
            'pincode'               => $this->pincode,
            'login_access'          => $this->login_access,
            'is_active'             => $this->is_active,
            'updated_by'            => $this->updated_by,
        ];
        $sql = "UPDATE ".$this->table_name." SET name=:name, email_id=:email_id, mobile_no=:mobile_no, user_type_id=:user_type_id, user_designation_id=:user_designation_id,  seniority_by_years=:seniority_by_years, father_name=:father_name, email_personal=:email_personal, mobile_2=:mobile_2, address=:address, pincode=:pincode, login_access=:login_access, is_active=:is_active, updated_by=:updated_by WHERE user_id=:user_id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($data);
        $stmt->closeCursor();
        return true;
    }

    function delete() {
        $data = [
            'user_id'           => $this->user_id,
            'is_active'         => 2,
            'updated_by'        => $this->updated_by
        ];
        $sql = "UPDATE ".$this->table_name." SET is_active=:is_active, updated_by=:updated_by WHERE user_id=:user_id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute($data);
        $last_query = $stmt->queryString;
        $stmt->closeCursor();
        return $last_query;
    }

    function get($Request = []) {
        $output = [];
        $data = [
            'is_active' => 2
        ];
        if(!empty($Request)){
            $query = "SELECT u.user_id, u.name, u.email_id, u.mobile_no, u.father_name,u.email_personal, u.user_designation_id, u.seniority_by_years,u.mobile_2,u.address,u.pincode,u.user_type_id, u.login_access, ut.user_type, ul.username,ud.user_designation FROM ".$this->table_name." u 
            INNER JOIN user_type ut ON (u.user_type_id=ut.user_type_id)
            LEFT JOIN user_designation ud ON (u.user_designation_id=ud.user_designation_id)
            LEFT JOIN user_login ul ON (u.user_id=ul.user_id) WHERE u.is_active < :is_active";  

            if (isset($Request->search->value) && $Request->search->value != '' ) {
                $data['search_value'] = '%'.$Request->search->value.'%';
                $query .= " AND (u.user_id LIKE :search_value";
                $query .= " OR u.name LIKE :search_value";
                $query .= " OR u.email_id LIKE :search_value";
                $query .= " OR u.mobile_no LIKE :search_value)";
            } 
            if($this->user_id>0) {
                $data['user_id'] = $this->user_id;
                $query .= " AND u.user_id = :user_id";
            }
            if (isset($Request->order) && $Request->order['0']->column > 0) {
                $query .= " ORDER BY ".$Request->order['0']->column." ".$Request->order['0']->dir;
            } else {
                $query .= ' ORDER BY u.email_id asc';
            }
            if (isset($Request->length) && $Request->length != -1) {
                $query .= ' LIMIT ' . $Request->start. ',' . $Request->length;
            }
        }else{
            if($this->user_id>0) {
                $data = [
                    'user_id' => $this->user_id
                ];
                $query = "SELECT u.user_id, u.name, u.email_id, u.mobile_no, u.father_name,u.email_personal, u.user_designation_id,u.seniority_by_years,u.mobile_2,u.address,u.pincode,u.user_type_id, u.login_access, ut.user_type, ul.username,ud.user_designation FROM ".$this->table_name." u 
                INNER JOIN user_type ut ON (u.user_type_id=ut.user_type_id)
                LEFT JOIN user_designation ud ON (u.user_designation_id=ud.user_designation_id)
                LEFT JOIN user_login ul ON (u.user_id=ul.user_id) WHERE user_id = :user_id";
            } else {
                $query = "SELECT u.user_id, u.name, u.email_id, u.mobile_no, u.father_name,u.email_personal, u.user_designation_id,u.seniority_by_years,u.mobile_2,u.address,u.pincode,u.user_type_id, u.login_access, ut.user_type, ul.username,ud.user_designation FROM ".$this->table_name." u 
                INNER JOIN user_type ut ON (u.user_type_id=ut.user_type_id)
                LEFT JOIN user_designation ud ON (u.user_designation_id=ud.user_designation_id)
                LEFT JOIN user_login ul ON (u.user_id=ul.user_id) WHERE u.is_active < :is_active";
            }
            if($this->user_type_id>0) {
                $data['user_type_id']   = $this->user_type_id;
                $data['is_active']      = 1;
                $query = "SELECT u.user_id, u.name, u.email_id, u.mobile_no, u.father_name, u.email_personal, u.user_designation_id,u.seniority_by_years,u.mobile_2,u.address,u.pincode,u.user_type_id, u.login_access, ut.user_type, ul.username,ud.user_designation FROM ".$this->table_name." u 
                INNER JOIN user_type ut ON (u.user_type_id=ut.user_type_id)
                LEFT JOIN user_designation ud ON (u.user_designation_id=ud.user_designation_id)
                LEFT JOIN user_login ul ON (u.user_id=ul.user_id) WHERE u.is_active = :is_active AND u.user_type_id=:user_type_id";
            }
        }
        $stmt = $this->conn->prepare($query);
        // $last_query = $stmt->queryString;
        // $debug_query = $stmt->_debugQuery();
        // echo $debug_query;exit;
        $stmt->execute($data);
        $results = $stmt->fetchAll();
        $count = $stmt->rowCount();
        
        $stmt->closeCursor();
        if($count>0) {
            foreach($results as $row) {
                $output[] = [
                    'user_id'               => $row['user_id'],
                    'username'              => $row['username'],
                    'name'                  => $row['name'],
                    'email_id'              => $row['email_id'],
                    'mobile_no'             => $row['mobile_no'],
                    'user_type_id'          => $row['user_type_id'],
                    'login_access'          => $row['login_access'],
                    'user_type'             => $row['user_type'],
                    'user_designation_id'   => $row['user_designation_id'],
                    'seniority_by_years'    => $row['seniority_by_years'],
                    'user_designation'      => $row['user_designation'],
                    'father_name'           => $row['father_name'],
                    'email_personal'        => $row['email_personal'],
                    'mobile_2'              => $row['mobile_2'],
                    'address'               => $row['address'],
                    'pincode'               => $row['pincode']
                ];
            }
        }
        return $output;
    }

    function check() {
        $data = [
            'user_id'   => $this->user_id,
            'is_active' => 1
        ];
        $stmt = $this->conn->prepare("SELECT user_id FROM ".$this->table_name." WHERE user_id = :user_id AND is_active=:is_active");
        $stmt->execute($data);
        $count = $stmt->rowCount();
        $row = $stmt->fetch();
        $stmt->closeCursor();
        if($count>0) {
            $this->user_id = $row['user_id'];
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