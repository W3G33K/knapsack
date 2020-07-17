<?php namespace App\Validation\Catalogs;

use App\Validation\Rules\User\MaskFirstName;
use App\Validation\Rules\User\RequireFirstName;

class RegisterForm {
	/**
	 * @var string[]
	 */
	protected $rules;

	public function __construct() {
		$this->rules = [
			/* Require Fields */
			new RequireFirstName(),

			/* Masks */
			new MaskFirstName(),
		];
	}

	/**
	 * @return string[]
	 */
	public function getRules(): array {
		return $this->rules;
	}
}
