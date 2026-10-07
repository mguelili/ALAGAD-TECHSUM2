<?php
namespace App\Controllers;
use App\Models\UserModel;
class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')) return redirect()->to('/tasks');
        $errors=[]; $username='';
        if (strtolower($this->request->getMethod())==='post') {
            $username=trim((string)$this->request->getPost('username'));
            if (!$this->validate(['username'=>'required|max_length[50]','password'=>'required'])) $errors=$this->validator->getErrors();
            else {
                $user=(new UserModel())->where('username',$username)->first();
                if ($user && password_verify((string)$this->request->getPost('password'),$user['password'])) {
                    session()->regenerate(); session()->set(['logged_in'=>true,'user_id'=>$user['id'],'username'=>$user['username']]);
                    return redirect()->to('/tasks')->with('success','You are now logged in.');
                }
                $errors['credentials']='Incorrect username or password.';
            }
        }
        return view('layout/header',['title'=>'Login']).view('auth/login',['errors'=>$errors,'username'=>$username]).view('layout/footer');
    }
    public function logout(){ session()->destroy(); return redirect()->to('/')->with('success','You have been logged out.'); }
}
