<?php namespace App\Controllers;

class UserController extends BaseController {
	public function register(): string {
		$data = [
			'errors' => null,
			'user' => null,
		];

		if ($this->request->getMethod(true) === 'POST') {
			$user = $this->request->getPost('user');
			$data['user'] = $user;

			$userModel = model('App\Models\UserModel');
			if ($userModel->save($user) === false) {
				$data['errors'] = $userModel->errors();
			}
		}

		return view('user/register', $data);
	}
}
