<?php
class Users
{
    private $employee_id;
    private $fullname;
    private $alamat_lengkap;
    private $jenis_kelamin;
    private $no_hp;
    private $password;
    private $role;

    function set_login_data($employee_id, $password)
    {
        $this->employee_id = $employee_id;
        $this->password = $password;
    }

    function get_employee_id(){
        return $this->employee_id;
    }

    function get_password(){
        return $this->password;
    }

}
