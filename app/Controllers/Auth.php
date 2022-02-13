<?php namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{   

    # INDEX
    # LOGIN
    # LOGOUT 
    #===================================

    private $auth = '' ;
    public function __construct(){
        $this->auth = new UsersModel();      
    }
  
    // show login form
    public function index()    {  
        $session = session();  
        $session->setFlashdata('msg', '');
        if(session('npm') == ""){
            return view('login');             
        }else{
            return redirect()->to('/home'); //redirect dashboard
            
        }
    }      

    //check user is exist or not
    public function login(){
        if(session('npm') != ""){
            return redirect()->to('/home'); //redirect dashboard            
        }
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = array('username'=>$username,'password'=>md5($password) );   

        $login =  $this->auth->where($data)->first();
        $session = session(); 
        
        if($login){
            $check = $this->auth->getUserRole($data);
            var_dump($check);
            $ses_data = [
                'npm'       => $check['npm'],
                'username'  => $check['username'],
                'nama'     => $check['nama'],
                'status'    => $check['status'],
                'role'    => $check['role'],
                'logged_in' => TRUE
            ];
            $session->set($ses_data);
            

            // remember me
            if(!empty($this->request->getVar("remember"))) {
                setcookie ("loginId", $username, time()+ (10 * 365 * 24 * 60 * 60));  
                setcookie ("loginPass", $password,  time()+ (10 * 365 * 24 * 60 * 60));
            }else {
                setcookie ("loginId",""); 
                setcookie ("loginPass","");
            }

            return redirect()->to('/'); //redirect dashboard
        }else{
            $session->setFlashdata('msg', ' <strong>Invalid User!</strong> Periksa username dan password anda.');
            return view('login');
        }
    }

    // logout
    public function logout()
    {
        $session = session();
        $session->destroy();
        header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        return redirect()->to('/login');
    }
}
