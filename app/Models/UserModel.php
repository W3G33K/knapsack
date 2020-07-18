<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
	/**
	 * @var string
	 */
	protected $table = 'user';

	/**
	 * @var string
	 */
	protected $returnType = 'App\Entities\User';

	/**
	 * @var string[]
	 */
	protected $allowedFields = ['first_name', 'last_name', 'email_address', 'username', 'password'];

	/**
	 * @var string
	 */
	protected $validationRules = 'users';

	/**
	 * @var bool
	 */
	protected $useTimestamps = true;
}
