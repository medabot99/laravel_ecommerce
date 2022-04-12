<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $name;
    public $role;
    public $username;
    public $email;
    public $phone;
    public $address;
    public $password;

    public function __construct($name, $role, $username, $email, $phone, $address, $password){

        $this->name = $name;
        $this->role = $role;
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->password = $password;

    }

    public function model(array $row)
    {
        return new User([
            'name' => $row[$this->name],
            'role_id' => $this->role,
            'username' => $row[$this->username],
            'email' => $row[$this->email],
            'phone' => $row[$this->phone],
            'address' => $row[$this->address],
            'password' => bcrypt($this->password)
        ]);
    }
}
