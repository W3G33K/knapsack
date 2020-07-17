<?php namespace App\Validation;

class NormalResult implements Result {
	/**
	 * @inheritDoc
	 *
	 * @return true
	 */
	public function isNormal(): bool {
		return true;
	}
}
