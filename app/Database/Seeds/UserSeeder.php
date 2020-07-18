<?php namespace App\Database\Seeds;

use App\Entities\User;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder {
	public function run(): void {
		$faker = Factory::create('en_US');
		$users = [];

		for ($iteration = 0; $iteration < 100; $iteration++) {
			$user = new User([
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'email_address' => $faker->unique()->email,
				'username' => $faker->unique()->userName,
				'password' => $faker->domainName, // Hashed upon Entity instantiation...
			]);

			$userData = $user->toRawArray();
			array_push($users, $userData);
			unset($userData['verify_password']);
			$this->db->table('user')
					 ->insert($userData);
		}

		if (is_cli()) {
			$path = $_SERVER['PWD'];
			if (file_exists("$path/build/seeds") === false) {
				mkdir("$path/build/seeds", 0755, true);
			}

			$fptr = fopen("$path/build/seeds/users.csv", 'w');
			fputcsv($fptr, array_keys($users[0]));
			foreach ($users as $user) {
				fputcsv($fptr, $user);
			}

			fclose($fptr);
		}
	}
}
