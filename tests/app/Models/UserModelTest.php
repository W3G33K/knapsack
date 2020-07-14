<?php namespace App\Models;

use App\Entities\User;
use CodeIgniter\Database\ConnectionInterface;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase {
	/**
	 * @return array
	 */
	public function providerScenarios(): array {
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

			'user attempts to register only entering first name' => [
				[
					'Camila',
					'',
					'',
					'',
					'',
				],

				[
					'last_name' => 'Last Name is required.',
					'email_address' => 'Email Address is required.',
					'username' => 'Username is required.',
					'verify_password' => 'Password is required.',
				],
			],

			'user attempts to register only entering first name and last name' => [
				[
					'Camila',
					'Cabello',
					'',
					'',
					'',
				],

				[
					'email_address' => 'Email Address is required.',
					'username' => 'Username is required.',
					'verify_password' => 'Password is required.',
				],
			],

			'user attempts to register only entering first name, last name and email address' => [
				[
					'Camila',
					'Cabello',
					'camila@cabello.co',
					'',
					'',
				],

				[
					'username' => 'Username is required.',
					'verify_password' => 'Password is required.',
				],
			],

			'user attempts to register only entering first name, last name, email address and username' => [
				[
					'Camila',
					'Cabello',
					'camila@cabello.co',
					'CamilaCabello',
					'',
				],

				[
					'verify_password' => 'Password is required.',
				],
			],

			'user attempts to register only entering all required fields' => [
				[
					'Camila',
					'Cabello',
					'camila@cabello.co',
					'CamilaCabello',
					'señorita23',
				],

				null,
			],
		];
	}

	/**
	 * @param array $userData
	 * @param array|null $expectedErrors
	 *
	 * @dataProvider providerScenarios
	 */
	public function testUserModel(array $userData, ?array $expectedErrors): void {
		list($firstName, $lastName, $emailAddress, $username, $password) = $userData;
		$user = $this->makeUser($firstName, $lastName, $emailAddress, $username, $password);

		$mockdb = $this->createMock(ConnectionInterface::class);
		$userModel = new UserModel($mockdb);
		$userModel->save($user);
		$actualErrors = $userModel->errors();
		$this->assertEquals($expectedErrors, $actualErrors);
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
