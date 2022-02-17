<?php namespace App\Models;

use CodeIgniter\Model;

class User extends Model{
    protected $table="users";
    protected $primaryKey="username";

    protected $allowedFields=[
        'username','name','surname','password','mail'
    ];

    public function register($a,$b,$c,$d,$e){
        $query=$this->db->query("Insert into users (username,name,surname,password,mail) values
        ('$a','$b','$c','$d','$e')");
        return $query;
    }
    public function login($a,$b){
        $query=$this->db->query("Select * from users where username='$a' and password='$b'");
        return $query->getResultArray();
    }
    public function selectData($a){
        $query=$this->db->query("Select * from users where username='$a'");
        return $query->getResultArray();
    }
}