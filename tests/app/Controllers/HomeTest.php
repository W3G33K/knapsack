<?php namespace App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;

class HomeTest extends CIUnitTestCase {
	use ControllerTester;

	private const BASE_URI = 'http://192.168.33.10/';

	public function testHomePage_returnsOkStatus(): void {
		$response = $this->withUri(static::BASE_URI)
						 ->controller(Home::class)
						 ->execute('index');
		$this->assertTrue($response->isOK());
	}

	public function testHomePageHeader_returnsTheGivenText(): void {
		$response = $this->withUri(static::BASE_URI)
						 ->controller(Home::class)
						 ->execute('index');
		$this->assertTrue($response->see('Welcome to CodeIgniter 4.0.3', 'h1'));
	}
}
