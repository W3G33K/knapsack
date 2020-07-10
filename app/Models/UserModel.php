<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
	protected $table = 'user';
	protected $returnType = 'App\Entities\User';

	protected $allowedFields = ['first_name', 'last_name', 'email_address', 'username', 'password'];
}
