<?php
/**
 * Plugin Name: Customize theme installer for florianbrinkmann.com themes
 * Plugin URI: https://florianbrinkmann.com/en/
 * Description: Adds the possibility to browse the premium themes from Florian Brinkmann in the customizer,
 *              to preview and to install them.
 * Version: 1.0.0
 * Author: Florian Brinkmann
 * Author URI: https://florianbrinkmann.com/en/
 * License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: fbn-themes-customize-installer
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * your option) any later version.
 *
 * @package FlorianBrinkmann\CustomizeThemesInstaller
 */

namespace FlorianBrinkmann\CustomizeThemesInstaller;

// check if we are in the WordPress context.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

require_once __DIR__ . '/vendor/autoload.php';

// Create instance of plugin and run it.
( new Plugin() )
	->register();
