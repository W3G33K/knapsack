<?php namespace App\Validation;

interface Rule {
	/**
	 * @return bool
	 */
	public function isRunnable(): bool;

	/**
	 * @param array $request
	 *
	 * @return Result
	 */
	public function run(array $request): Result;

	/**
	 * @return int
	 */
	public function sortPriority(): int;
}
