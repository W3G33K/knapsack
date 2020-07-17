<?php namespace App\Validation;

use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\URI;
use CodeIgniter\Validation\ValidationInterface;

abstract class SimpleRule implements Rule {
	/**
	 * @var string
	 */
	private $field;

	/**
	 * @var string
	 */
	private $messageKey;

	/**
	 * @var int
	 */
	protected $priority = 99999;

	/**
	 * @var string|string[]
	 */
	protected $validRequestPaths = [];

	/**
	 * @var URI
	 */
	protected $request;

	/**
	 * @var ValidationInterface
	 */
	protected $validator;

	/**
	 * ValidationRule constructor.
	 *
	 * @param RequestInterface|null $request
	 * @param ValidationInterface|null $validator
	 */
	public function __construct(?RequestInterface $request = null, ?ValidationInterface $validator = null) {
		$req = $request ?? Services::request();
		$this->withRequest($request);

		$val = $validator ?? Services::validation(null, false);
	}

	/**
	 * @return string
	 */
	public function getField(): string {
		return $this->field;
	}

	/**
	 * @param string $field
	 */
	public function setField(string $field): void {
		$this->field = $field;
	}

	/**
	 * @return string
	 */
	public function getMessageKey(): string {
		return $this->messageKey;
	}

	/**
	 * @param string $messageKey
	 */
	public function setMessageKey(string $messageKey): void {
		$this->messageKey = $messageKey;
	}

	/**
	 * @param RequestInterface $request
	 */
	public function withRequest(RequestInterface $request) {
		$this->request = $request;
	}

	/**
	 * @return bool
	 */
	public function isRunnable(): bool {
		$requestPath = $this->request->getPath();
		$validRequestPaths = $this->validRequestPaths;
		return (is_string($validRequestPaths) && $validRequestPaths === $requestPath) ||
			(is_array($validRequestPaths) && in_array($requestPath, $validRequestPaths, true));
	}

	/**
	 * @return int
	 */
	public function sortPriority(): int {
		return $this->priority;
	}

	/**
	 * @return Result
	 */
	protected function getRuleResult(): Result {
		return new NormalResult();
	}
}
