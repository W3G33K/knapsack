<?php namespace App\Filters;

use App\Entities\User;
use CodeIgniter\HTTP\IncomingRequest;
use PHPUnit\Framework\TestCase;

class TransformUserDataFilterTest extends TestCase {
	public function testTransform_onlyRuns_whenUserDataIsProvided(): void {
		$request = $this->createMock(IncomingRequest::class);
		$request->expects($this->once())
				->method('getPost')
				->with($this->equalTo('user'))
				->willReturn([
					'first_name' => 'Will',
					'last_name' => 'Smith',
					'email_address' => 'will@smith.co',
					'username' => 'wsmith',
					'password' => 'iforgot',
				]);

		$request->expects($this->once())
				->method('setGlobal')
				->with(
					$this->logicalAnd(
						$this->isType('string'),
						$this->equalTo('post')
					),
					$this->logicalAnd(
						$this->isType('array'),
						$this->equalTo(['user' => new User([
							'first_name' => 'Will',
							'last_name' => 'Smith',
							'email_address' => 'will@smith.co',
							'username' => 'wsmith',
							'password' => 'iforgot',
						])])
					)
				);

		$transformUserData = new TransformUserDataFilter();
		$transformUserData->before($request);
	}

	public function testTransform_doesNotRun_whenUserDataIsNull(): void {
		$request = $this->createMock(IncomingRequest::class);
		$request->expects($this->once())
				->method('getPost')
				->with($this->equalTo('user'))
				->willReturn(null);

		$request->expects($this->never())
				->method('setGlobal');

		$transformUserData = new TransformUserDataFilter();
		$transformUserData->before($request);
	}

	public function testTransform_doesNotRun_whenUserDataIsNothing(): void {
		$request = $this->createMock(IncomingRequest::class);
		$request->expects($this->once())
				->method('getPost');

		$request->expects($this->never())
				->method('setGlobal');

		$transformUserData = new TransformUserDataFilter();
		$transformUserData->before($request);
	}

	public function testTransform_doesNotRun_whenNoUserDataIsProvided(): void {
		$request = $this->createMock(IncomingRequest::class);
		$request->expects($this->once())
				->method('getPost')
				->with($this->equalTo('user'))
				->willReturn([]);

		$request->expects($this->never())
				->method('setGlobal');

		$transformUserData = new TransformUserDataFilter();
		$transformUserData->before($request);
	}

	public function testTransform_doesNotRun_whenUserDataProvidedIsOfDifferentType(): void {
		$request = $this->createMock(IncomingRequest::class);
		$request->expects($this->once())
				->method('getPost')
				->with($this->equalTo('user'))
				->willReturn('This data should remain untouched.');

		$request->expects($this->never())
				->method('setGlobal');

		$transformUserData = new TransformUserDataFilter();
		$transformUserData->before($request);
	}
}
