<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserAlterAddTimestamps extends Migration {
	public function up() {
		$this->forge->addColumn('user', 'created_at DATETIME DEFAULT CURRENT_TIMESTAMP');
		$this->forge->addColumn('user', 'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
		$this->forge->addColumn('user', 'deleted_at DATETIME NULL');
	}

	public function down() {
		$this->forge->dropColumn('user', 'created_at');
		$this->forge->dropColumn('user', 'updated_at');
		$this->forge->dropColumn('user', 'deleted_at');
	}
}
