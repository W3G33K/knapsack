<?php namespace Config;

use App\Filters\TransformUserDataFilter;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig {
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf' => CSRF::class,
		'toolbar' => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'transformUserData' => TransformUserDataFilter::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			//'honeypot'
			// 'csrf',
		],
		'after' => [
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [
		'post' => ['transformUserData'],
	];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}
