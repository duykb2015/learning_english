<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use Exception;

class User extends BaseController
{
    public function index()
    {
        return view('User/inforUser/Login');
    }
    public function Infor()
    {
        return view('User/inforUser/Profile');
    }
    public function Result()
    {
        return view('User/Results/readingResult');
    }
    public function userlogin()
    {
        $username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$inputs = array(
			'username' => $username,
			'password' => $password
		);

		//load validation service
		$validation = service('validation');
		$validation->setRules(
			[
				'username' => 'required',
				'password' => 'required|min_length[3]'
			],
			//Custom error message
			customValidationErrorMessage()
		);

		//if something wrong, redirect to login page and show error message
		if (!$validation->run($inputs)) {
			$error_msg = $validation->getErrors();
			return redirectWithMessage(site_url('User/Login'), $error_msg);
		}

		//Get info user
		$userModel = new UserModel;
		$user = $userModel->where('username', $username)->first();
		if (!$user) {
			return redirectWithMessage(site_url('User/Login'), WRONG_LOGIN_INFO_MESSAGE);
		}

		$pass = $user['password'];
		$authPassword = md5((string)$password) === $pass;
		if (!$authPassword) {
			return redirectWithMessage(site_url('User/Login'), WRONG_LOGIN_INFO_MESSAGE);
		}

		$sessionData = [
			'id' 	   => $user['id'],
			'username'     => $user['username'],
			'email'=>$user['email'],
			'first_name'	   => $user['first_name'],
			'last_name'	   => $user['last_name'],
		];

		$is_update = $userModel->update($user['id'], ['last_login_at' => Time::now()]);
		if (!$is_update) {
			return redirectWithMessage(site_url('User/Login'), UNEXPECTED_ERROR_MESSAGE);
		}
		//create new session and start to work
		session()->set($sessionData);
		return redirect()->to('User/Infor');
    }
    public function Register()
    {
        return view('User/inforUser/Register');
    }
	public function save()
	{
		$username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
		$email=$this->request->getPost('email');
		$firstname = $this->request->getPost('first_name');
        $lastname = $this->request->getPost('last_name');
	
        $datas = [
			'username'       =>  $username,
            'password'    =>md5((string) $password),
			'email'    =>  $email,
            'first_name' => $firstname,
            'last_name'        =>  $lastname,
          
        ];
      	// Khởi tạo model
        $userModel = new UserModel;
        // //Thêm dữ liệu
        $isInsert = $userModel->insert($datas);
        if (!$isInsert) {
            throw new Exception(UNEXPECTED_ERROR_MESSAGE);
        }
        return redirect()->to('User/Login');
	}
    function logout()
	{
		session()->destroy();
		return redirect()->to('User/Login/');
	}
}
