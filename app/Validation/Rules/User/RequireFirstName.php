<?php namespace App\Validation\Rules\User;

use App\Validation\CodeIgniterRule;
use App\Validation\Result;

class RequireFirstName extends CodeIgniterRule {
	/**
	 * @var string
	 */
	protected $validRequestPaths = '/user/register';

	/**
	 * @param array $request
	 *
	 * @return Result
	 */
	public function run(array $request): Result {
		$this->setField('first_name');
		$this->setMessageKey('Labels.User.First_Name');
		$this->validator->setRule('first_name', 'Labels.User.First_Name', 'required', [
			'required' => 'Messages.Common.Required',
		]);

		return $this->getRuleResult();
	}
}
