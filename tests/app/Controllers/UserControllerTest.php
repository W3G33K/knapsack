<?php namespace App\Controllers;

use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\ControllerTester;

class UserControllerTest extends CIDatabaseTestCase {
	use ControllerTester;

	public function testTrue_isNotFalse(): void {
		$this->assertNotEquals(true, false);
	}
}
