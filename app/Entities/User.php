<?php namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity {
	/**
	 * @var string[]
	 */
	protected $attributes = [
		'first_name' => '',
		'last_name' => '',
		'email_address' => '',
		'username' => '',
		'password' => '',
		'verify_password' => '',
	];

	/**
	 * @return string
	 */
	public function getFirstName(): string {
		return $this->attributes['first_name'];
	}

	/**
	 * @param string $firstName
	 * @return $this
	 */
	public function setFirstName(string $firstName): User {
		$this->attributes['first_name'] = $firstName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLastName(): string {
		return $this->attributes['last_name'];
	}

	/**
	 * @param string $lastName
	 * @return $this
	 */
	public function setLastName(string $lastName): User {
		$this->attributes['last_name'] = $lastName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmailAddress(): string {
		return $this->attributes['email_address'];
	}

	/**
	 * @param string $emailAddress
	 * @return $this
	 */
	public function setEmailAddress(string $emailAddress): User {
		$this->attributes['email_address'] = $emailAddress;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUsername(): string {
		return $this->attributes['username'];
	}

	/**
	 * @param string $username
	 * @return $this
	 */
	public function setUsername(string $username): User {
		$this->attributes['username'] = $username;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPassword(): string {
		return $this->attributes['password'];
	}

	/**
	 * @param string $password
	 *
	 * @return $this
	 */
	public function setPassword(string $password): User {
		$this->attributes['password'] = password_hash($password, PASSWORD_BCRYPT);
		$this->attributes['verify_password'] = $password;

		return $this;
	}
}
