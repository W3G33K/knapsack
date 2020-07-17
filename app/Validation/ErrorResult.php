<?php namespace App\Validation;

class ErrorResult implements Result {
	/**
	 * @var array
	 */
	protected $errors;

	/**
	 * ErrorResult constructor.
	 *
	 * @param array $errors
	 */
	public function __construct(array $errors) {
		$this->setErrors($errors);
	}

	/**
	 * @return array
	 */
	protected function getErrors(): array {
		return $this->errors;
	}

	/**
	 * @param array $errors
	 */
	protected function setErrors(array $errors): void {
		$this->errors = $errors;
	}

	/**
	 * @return array
	 */
	public function errors(): array {
		return $this->getErrors();
	}

	/**
	 * @inheritDoc
	 *
	 * @return false
	 */
	public function isNormal(): bool {
		return false;
	}
}
