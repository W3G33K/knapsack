<?php namespace App\Validation\Rules\User;

use App\Validation\CodeIgniterRule;
use App\Validation\NormalResult;
use App\Validation\Result;

class MaskFirstName extends CodeIgniterRule {
	/**
	 * @inheritDoc
	 */
	public function run(array $request): Result {
		return new NormalResult();
	}
}
