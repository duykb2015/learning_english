<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\I18n\Time;

class Login extends BaseController
{
	public function index()
	{

		return view('Admin/Login/index');
	}

	public function authLogin()
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
			return redirectWithMessage(site_url('admin-login'), $error_msg);
		}

		//Get info user
		$adminModel = new AdminModel();
		$user = $adminModel->where('username', $username)->first();
		if (!$user) {
			return redirectWithMessage(site_url('admin-login'), WRONG_LOGIN_INFO_MESSAGE);
		}

		$pass = $user['password'];
		$authPassword = md5((string)$password) === $pass;
		if (!$authPassword) {
			return redirectWithMessage(site_url('admin-login'), WRONG_LOGIN_INFO_MESSAGE);
		}

		$sessionData = [
			'id' 	       => $user['id'],
			'adminName'    => $user['username'],
			'level'	       => $user['level'],
			'isAdminLogin' => true,
		];

		$is_update = $adminModel->update($user['id'], ['last_login_at' => Time::now()]);
		if (!$is_update) {
			return redirectWithMessage(site_url('admin-login'), UNEXPECTED_ERROR_MESSAGE);
		}

		//create new session and start to work
		session()->set($sessionData);
		return redirect()->to('/dashboard');
	}


	/**
	 * Used to logout the user.
	 * 
	 */
	function logout()
	{
		session()->destroy();
		return redirect()->to('admin-login');
	}
}
