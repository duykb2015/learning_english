<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Database\Migrations\QuestionAudio;
use App\Models\AdminModel;
use App\Models\QuestionAnswerModel;
use App\Models\QuestionAudioModel;
use App\Models\QuestionGroupModel;
use App\Models\QuestionImageModel;
use App\Models\QuestionModel;
use CodeIgniter\I18n\Time;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Login extends BaseController
{
	public function index()
	{
		$reader = IOFactory::createReader("Xlsx");
		$spreadSheet = $reader->load(UPLOAD_PATH . '/exam1.xlsx');

		$sheetData = $spreadSheet->getActiveSheet()->rangeToArray('B2:J103');

		
		

		// die('SUGOIIIIII!!');

		$part6 = array_chunk(array_slice($sheetData, 64, 12), 3);

		$part7_1 = array_chunk(array_slice($sheetData, 73, 15), 5);
		$part7_2 = array_chunk(array_slice($sheetData, 88, 12), 3);

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
