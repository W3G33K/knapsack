<?php namespace Tests\Support;

use CodeIgniter\Database\Migration;

class User extends Migration {
	public function up() {
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true,
			],

			'first_name' => [
				'type' => 'VARCHAR',
				'constraint' => 32,
			],

			'last_name' => [
				'type' => 'VARCHAR',
				'constraint' => 32,
			],

			'email_address' => [
				'type' => 'VARCHAR',
				'constraint' => 320,
			],

			'username' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => true,
				'unique' => true,
			],

			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 64,
			],
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('user', true);
	}

	public function down() {
		$this->forge->dropTable('user', true);
	}
}
