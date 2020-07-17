<?php namespace App\Validation\Rules\UserForm;

use App\Validation\ErrorResult;
use App\Validation\NormalResult;
use CodeIgniter\HTTP\URI;
use PHPUnit\Framework\TestCase;

class FirstNameIsRequiredTest extends TestCase {
	public function testRuleIsRunnable_shouldReturnTrue(): void {
		$uriMock = $this->createMock(URI::class);
		$uriMock->method('getPath')
				->willReturn('/user/register');

		$rule = new RequireFirstName($uriMock);
		$this->assertTrue($rule->isRunnable());
	}

	public function testRuleIsRunnable_shouldReturnsFalse(): void {
		$uriMock = $this->createMock(URI::class);
		$uriMock->method('getPath')
				->willReturn('/user/login');

		$rule = new RequireFirstName($uriMock);
		$this->assertFalse($rule->isRunnable());
	}

	public function testRuleResult_shouldReturnNormal(): void {
		$rule = new RequireFirstName();

		/** @var NormalResult $result */
		$result = $rule->run([
			'first_name' => 'Camila',
		]);

		$this->assertTrue($result->isNormal());
	}

	public function testRuleResult_shouldReturnError(): void {
		$rule = new RequireFirstName();

		/** @var ErrorResult $result */
		$result = $rule->run([
			'first_name' => '',
		]);

		$this->assertFalse($result->isNormal(), 'Rule Result should return in error state.');
		$this->assertEquals([
			'first_name' => 'First Name is required.',
		], $result->errors());
	}
}
