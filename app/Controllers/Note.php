<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
class Note extends BaseController{
    private $user;
    private $sn;
    public function __construct()
    {
        $this->user=new User();
        $this->sn=session();
    }
    public function index(){
        return view('mainpage');
    }
    public function auth(){
        return view('Pages/auth');
    }
    public function register(){
        $rdata['username']=$this->request->getVar('name');
        $rdata['name']=$this->request->getVar('surname');
        $rdata['surname']=$this->request->getVar('username');
        $rdata['password']=$this->request->getVar('password');
        $rdata['mail']=$this->request->getVar('mail');
        $stmt=$this->user->register(
            $rdata['username'],
            $rdata['name'],
            $rdata['surname'],
            $rdata['password'],
            $rdata['mail']
        );

        if ($stmt) {
            $sessiondata=[
                'username'=>$rdata['username'],
                'name'=>$rdata['name'],
                'surname'=>$rdata['surname'],
                'mail'=>$rdata['mail']
            ];
            $this->sn->set($sessiondata);
            return view('pages/main');
        }
        else{
            echo "kayıt başarısız";
            $this->sn->destroy();
        }
    }
    public function login(){
        $ldata['username']=$this->request->getVar('username');
        $ldata['password']=$this->request->getVar('password');
        $stmt=$this->user->login($ldata['username'],$ldata['password']);
         if ($stmt) {
             foreach ($stmt as $data) {
                $sessiondata=array(
                    'username'=>$data['username'],
                    'password'=>$data['password'],
                    'mail'=>$data['mail']
                );
             }
             // $this->sn->set('username',$ldata['username']);
             $this->sn->set($sessiondata);
             return view('pages/main',$stmt);
         }
         else{
             session_destroy();
             return redirect()->to('/auth');
         }
    }
    public function selectUser(){
        $sdata=$this->request->getVar('user');
        $select=$this->user->selectData($sdata);
        print_r($select);
       
    }
    public function logOut(){
        $this->sn->destroy();
        return redirect()->to('/auth');
    }
}