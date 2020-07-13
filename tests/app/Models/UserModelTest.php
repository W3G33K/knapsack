<?php namespace App\Models;

use App\Entities\User;
use CodeIgniter\Test\CIDatabaseTestCase;

class UserModelTest extends CIDatabaseTestCase {
	/**
	 * @return array
	 */
	public function providedScenarios(): array {
		return [
			'user attempts to register without entering any fields' => [
				[
					'',
					'',
					'',
					'',
					'',
				],

				[
					'first_name' => 'First Name is required.',
					'last_name' => 'Last Name is required.',
					'email_address' => 'Email Address is required.',
					'username' => 'Username is required.',
					'verify_password' => 'Password is required.',
				],
			],

			'user attempts to register only entering random whitespace' => [
				[
					'   ',
					'  ',
					'    ',
					'  ',
					'   ',
				],

				[
					'first_name' => 'First Name is required.',
					'last_name' => 'Last Name is required.',
					'email_address' => 'Email Address is required.',
					'username' => 'Username is required.',
					'verify_password' => 'Password is required.',
				],
			],
		];
	}

	/**
	 * @param array $userData
	 * @param array $expectedErrors
	 *
	 * @dataProvider providedScenarios
	 */
	public function testUserModel(array $userData, array $expectedErrors): void {
		list($firstName, $lastName, $emailAddress, $username, $password) = $userData;
		$user = $this->makeUser($firstName, $lastName, $emailAddress, $username, $password);

		$userModel = model('App\Models\UserModel', false);
		$userModel->save($user);
		$actualErrors = $userModel->errors();

		$this->assertEquals($expectedErrors, $actualErrors);
		$this->dontSeeInDatabase('user', [
			'id' => 1,
			'email_address' => $emailAddress,
			'username' => $username,
		]);
	}

	/**
	 * @param string $firstName
	 * @param string $lastName
	 * @param string $emailAddress
	 * @param string $username
	 * @param string $password
	 *
	 * @return User
	 */
	private function makeUser(string $firstName = '', string $lastName = '', string $emailAddress = '', string $username = '', string $password = ''): User {
		return new User([
			'first_name' => $firstName,
			'last_name' => $lastName,
			'email_address' => $emailAddress,
			'username' => $username,
			'password' => $password,
		]);
	}
}
