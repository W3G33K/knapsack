<?php namespace Tests\Support;

use CodeIgniter\Database\Migration;

class UserAlterSetEmailAddressUnique extends Migration {
	public function up() {
		$this->forge->modifyColumn('user', [
			'email_address' => [
				'type' => 'VARCHAR',
				'constraint' => 320,
				'null' => false,
				'unique' => true,
			],
		]);
	}

	public function down() {
		$this->forge->modifyColumn('user', [
			'email_address' => [
				'type' => 'VARCHAR',
				'constraint' => 320,
				'null' => false,
				'unique' => false,
			],
		]);
	}
}
