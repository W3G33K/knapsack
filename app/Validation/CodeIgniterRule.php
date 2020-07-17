<?php namespace App\Validation;

abstract class CodeIgniterRule extends SimpleRule {
	/**
	 * Prioritize CodeIgniter rules before our standard business rules.
	 *
	 * @var int
	 */
	protected $priority = -99999;
}
