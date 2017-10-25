<?php
/**
 * Plugin for browsing, previewing and installing florianbrinkmann.com premium themes via the customizer.
 *
 * @package FlorianBrinkmann\CustomizeThemesInstaller
 */

namespace FlorianBrinkmann\CustomizeThemesInstaller;

/**
 * Class Plugin
 *
 * Main plugin class.
 *
 * @package FlorianBrinkmann\CustomizeThemesInstaller
 */
class Plugin {
	public function __construct() {
	}

	public function register() {
		// Run Customize class to create customize controls.
		( new Customize() )
			->register();
	}

	public function get_themes_data() {

	}
}
