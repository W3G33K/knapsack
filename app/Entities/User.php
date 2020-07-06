<?php namespace App\Entities;

class User {
	private $id;
	private $email_address;
	private $first_name;
	private $last_name;
	private $username;
	private $password;

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId(int $id): void {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getEmailAddress(): string {
		return $this->email_address;
	}

	/**
	 * @param string $email_address
	 */
	public function setEmailAddress(string $email_address): void {
		$this->email_address = $email_address;
	}

	/**
	 * @return string
	 */
	public function getFirstName(): string {
		return $this->first_name;
	}

	/**
	 * @param string $first_name
	 */
	public function setFirstName(string $first_name): void {
		$this->first_name = $first_name;
	}

	/**
	 * @return string
	 */
	public function getLastName(): string {
		return $this->last_name;
	}

	/**
	 * @param string $last_name
	 */
	public function setLastName(string $last_name): void {
		$this->last_name = $last_name;
	}

	/**
	 * @return string
	 */
	public function getUsername(): string {
		return $this->username;
	}

	/**
	 * @param string $username
	 */
	public function setUsername(string $username): void {
		$this->username = $username;
	}

	/**
	 * @return string
	 */
	public function getPassword(): string {
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword(string $password): void {
		$this->password = $password;
	}
}
