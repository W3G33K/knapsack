<?php namespace App\Controllers;

use App\Entities\User;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\ControllerTester;
use Config\Services;

class UserControllerTest extends CIDatabaseTestCase {
	use ControllerTester;

	/**
	 * @override
	 */
	protected function tearDown(): void {
		parent::tearDown();

		// Due to the way CI creates shared instances we must nullify the request in order to prevent test leakage.
		Services::injectMock('request', null);
	}

	public function testUserRegistrationPage_returnsOkStatus(): void {
		$baseUrl = base_url('/user/register');
		$response = $this->withUri($baseUrl)
						 ->controller(UserController::class)
						 ->execute('register');
		$this->assertTrue($response->isOK());
	}

	public function testUserRegistrationPage_returnsTheGivenHeaderText(): void {
		$baseUrl = base_url('/user/register');
		$response = $this->withUri($baseUrl)
						 ->controller(UserController::class)
						 ->execute('register');
		$this->assertTrue($response->see('Register Your Account', 'h1'));
	}

	public function testUserRegistrationPage_returnsTheGivenHeaderText1(): void {
		$user = new User();
		$user->setFirstName('Will');
		$user->setLastName('Smith');
		$user->setEmailAddress('will@smith.co');
		$user->setUsername('wsmith');
		$user->setPassword('iforgot');

		$request = $this->createMock(IncomingRequest::class);
		$request->expects($this->once())
				->method('getMethod')
				->with($this->equalTo(true))
				->willReturn('POST');

		$request->expects($this->once())
				->method('getPost')
				->with($this->equalTo('user'))
				->willReturn($user);

		$baseUrl = base_url('/user/register');
		$response = $this->withUri($baseUrl)
						 ->withRequest($request)
						 ->controller(UserController::class)
						 ->execute('register');

		$this->assertTrue($response->see('Register Your Account', 'h1'));
		$this->seeInDatabase('user', [
			'id' => 1,
			'email_address' => 'will@smith.co',
			'username' => 'wsmith',
		]);
	}
}
