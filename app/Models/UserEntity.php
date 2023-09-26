<?php
// namespace App\Modules\Admin\Models;

// class UserEntity

namespace App\Models;

use CodeIgniter\Model;

class UserEntity extends Model
{
    protected $record_id;
    protected $name;

    public function __construct()
    {

    }

    public static function of($urecord_id, $uname)
    {
        $user = new UserEntity();
        $user->setrecord_id($urecord_id);
        $user->setName($uname);

        return $user;
    }

    // public function login($username, $password)
    // {
    //     print_r("abc");exit;
    //     $db = db_connect();

    //     $user = $db->table('user_login')->where(['userName' => $username, 'password' => $password])->get()->getRow();
    //     $lastLogin = $db->table('user_login')->update(['last_login_time' => time()], ['record_id' => $user->record_id]);
    //     return $user ?? false;
    // }

    public function newRecord($data)
    {
        $db = db_connect();
        $array = [
            'name' => $data['name'],
            'position' => $data['position'],
            'start_date' => $data['start_date'],
            'salary' => $data['salary'],
            'office' => $data['office'],
            'age' => $data['age'],
            'status' => '1',

        ];
        $result = $db->table('st_table_record')->insert($array);
        if ($result) {
            return session()->setFlashData('message', 'Insert successfull');
        } else {
            return session()->setFlashData('message', 'Insert failed');
        }
    }
}