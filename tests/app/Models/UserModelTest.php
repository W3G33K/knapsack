<?php namespace App\Models;

use App\Entities\User;
use CodeIgniter\Test\CIDatabaseTestCase;
use ReflectionException;

class UserModelTest extends CIDatabaseTestCase {
	/**
	 * @var bool
	 */
	protected $refresh = false;

	/**
	 * @return array
	 */
	public function provideScenarios(): array {
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
					'first_name' => 'The First Name field is required.',
					'last_name' => 'The Last Name field is required.',
					'email_address' => 'The Email Address field is required.',
					'username' => 'The Username field is required.',
					'verify_password' => 'The Password field is required.',
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
					'first_name' => 'The First Name field is required.',
					'last_name' => 'The Last Name field is required.',
					'email_address' => 'The Email Address field is required.',
					'username' => 'The Username field is required.',
					'verify_password' => 'The Password field is required.',
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
					'last_name' => 'The Last Name field is required.',
					'email_address' => 'The Email Address field is required.',
					'username' => 'The Username field is required.',
					'verify_password' => 'The Password field is required.',
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
					'email_address' => 'The Email Address field is required.',
					'username' => 'The Username field is required.',
					'verify_password' => 'The Password field is required.',
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
					'username' => 'The Username field is required.',
					'verify_password' => 'The Password field is required.',
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
					'verify_password' => 'The Password field is required.',
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

			'user attempts to register entering an invalid first name' => [
				[
					'+123',
					'Dave',
					'danger@dubiousdave.com',
					'DaveDubious',
					'guess-me',
				],

				[
					'first_name' => 'The First Name field may only contain alphabetical characters.',
				],
			],

			'user attempts to register entering an invalid last name' => [
				[
					'Dubious',
					'+123',
					'danger@dubiousdave.com',
					'DaveDubious',
					'guess-me',
				],

				[
					'last_name' => 'The Last Name field may only contain alphabetical characters.',
				],
			],

			'user attempts to register entering an invalid email address' => [
				[
					'Dubious',
					'Dave',
					'@whats-an-email-address.com?',
					'DaveDubious',
					'guess-me',
				],

				[
					'email_address' => 'The Email Address field must contain a valid email address.',
				],
			],

			'user attempts to register entering an invalid username' => [
				[
					'Dubious',
					'Dave',
					'danger@dubiousdave.com',
					'=@DaveDubious@=',
					'guess-me',
				],

				[
					'username' => 'The Username field may only contain alphanumeric characters.',
				],
			],

			'user attempts to register entering a username less than 3 characters' => [
				[
					'Dubious',
					'Dave',
					'danger@dubiousdave.com',
					'dd',
					'guess-me',
				],

				[
					'username' => 'The Username field must be at least 3 characters in length.',
				],
			],

			'user attempts to register entering a password less than 8 characters' => [
				[
					'Dubious',
					'Dave',
					'danger@dubiousdave.com',
					'DaveDubious',
					'+123',
				],

				[
					'verify_password' => 'The Password field must be at least 8 characters in length.',
				],
			],

			'user attempts to register with an existing email address' => [
				[
					'Camila',
					'Cabello',
					'camila@cabello.co',
					'ObviouslyCamilaCabello',
					'señorita23',
				],

				[
					'email_address' => 'The Email Address field must contain a unique value.',
				],
			],

			'user attempts to register with an existing username' => [
				[
					'Camila',
					'Cabello',
					'obviously-camila@cabello.co',
					'CamilaCabello',
					'señorita23',
				],

				[
					'username' => 'The Username field must contain a unique value.',
				],
			],
		];
	}

	/**
	 * @dataProvider provideScenarios
	 *
	 * @param array $userData
	 * @param array|null $expectedErrors
	 *
	 * @throws ReflectionException
	 */
	public function testScenario(array $userData, ?array $expectedErrors): void {
		list($firstName, $lastName, $emailAddress, $username, $password) = $userData;
		$user = $this->makeUser($firstName, $lastName, $emailAddress, $username, $password);

		$userModel = new UserModel();
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
