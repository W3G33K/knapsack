<?php namespace App\Validation;

interface Result {
	/**
	 * @return bool
	 *
	 * @see ErrorResult
	 * @see NormalResult
	 */
	public function isNormal(): bool;
}
