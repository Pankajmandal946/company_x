<?php

// namespace App\Modules\Admin\Models;

// class UserModel
namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class UserModel extends Model
{
    public function getUsers()
    {
        return [
            UserEntity::of('PL0001', 'Mufid Jamaluddin'),
            UserEntity::of('PL0002', 'Andre Jhonson'),
            UserEntity::of('PL0003', 'Indira Wright'),
        ];
    }

    public function check_login()
    {
        $username = session()->get('user')->username ?? false;
        if (isset($username) && is_string($username)) {
            return true;
        }
        return false;
    }
}