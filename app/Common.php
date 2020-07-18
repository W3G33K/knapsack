<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @link: https://codeigniter4.github.io/CodeIgniter4/
 */

	/**
	 * @param string $type
	 * @param string $key
	 *
	 * @return string
	 */
	function resource(string $type, string $key): string {
		$identifier = ucfirst($type);
		$characterizers = preg_split('/[_.]/', $key);
		$characterizers = array_map(function($characterize) {
			return ucfirst($characterize);
		}, $characterizers);

		$object = array_shift($characterizers);
		$property = implode('_', $characterizers);
		return lang("$identifier.$object.$property");
	}

	/**
	 * @param string $key
	 *
	 * @return string
	 */
	function label(string $key): string {
		return resource('labels', $key);
	}
