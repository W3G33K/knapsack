<?php namespace App\Filters;

use App\Entities\User;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class TransformUserDataFilter implements FilterInterface {
	/**
	 * @inheritDoc
	 */
	public function before(RequestInterface $request): void {
		$userData = $request->getPost('user');
		if (is_array($userData) && count($userData) > 0) {
			$request->setGlobal('post', [
				'user' => new User($userData),
			]);
		}
	}

	/**
	 * @inheritDoc
	 */
	public function after(RequestInterface $request, ResponseInterface $response): void {
	}
}
