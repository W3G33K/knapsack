<?php namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation {
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list' => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $users = [
		'first_name' => [
			'label' => 'Labels.User.First_Name',
			'rules' => 'required|alpha',
		],

		'last_name' => [
			'label' => 'Labels.User.Last_Name',
			'rules' => 'required|alpha',
		],

		'email_address' => [
			'label' => 'Labels.User.Email_Address',
			'rules' => 'required|valid_email|is_unique[user.email_address]',
		],

		'username' => [
			'label' => 'Labels.User.Username',
			'rules' => 'required|alpha_numeric|min_length[3]|is_unique[user.username]',
		],

		'verify_password' => [
			'label' => 'Labels.User.Password',
			'rules' => 'required|min_length[8]',
		],
	];
}
