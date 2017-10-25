<?php
/**
 * Customize class which creates customize control.
 *
 * @package FlorianBrinkmann\CustomizeThemesInstaller
 */

namespace FlorianBrinkmann\CustomizeThemesInstaller;

/**
 * Class Customize
 *
 * Class for doing customizer magic.
 *
 * @package FlorianBrinkmann\CustomizeThemesInstaller
 */
class Customize {

	/**
	 * Register function.
	 */
	public function register() {
		// Register customize controls.
		add_action( 'customize_register', [ $this, 'register_controls' ] );

		// Filter our themes into our control.
		add_filter( 'customize_load_themes', [ $this, 'customize_load_themes' ], 10, 3 );
	}

	/**
	 * Register the control.
	 *
	 * @param \WP_Customize_Manager $wp_customize Customize object.
	 */
	public function register_controls( $wp_customize ) {
		if ( ! is_multisite() ) {
			$wp_customize->add_section( new \WP_Customize_Themes_Section( $wp_customize, 'fbn_themes', array(
				'title'       => __( 'florianbrinkmann.com themes' ),
				'action'      => 'fbn-themes',
				'filter_type' => 'local',
				'capability'  => 'install_themes',
				'panel'       => 'themes',
				'priority'    => 15,
			) ) );
		} // End if().
	}

	/**
	 * Filter the themes to include our themes into our control.
	 *
	 * @param array                 $themes  Nested array of theme data.
	 * @param array                 $args    List of arguments, such as page, search term, and tags to query for.
	 * @param \WP_Customize_Manager $manager Instance of Customize manager.
	 *
	 * @return array $themes Filtered themes array.
	 */
	public function customize_load_themes( $themes, $args, $manager ) {
		// Get the theme action.
		$theme_action = sanitize_key( $_POST['theme_action'] );

		// Check if our control is displayed.
		if ( 'fbn-themes' === $theme_action ) {
			// Get the theme information.
			/*$theme_info = wp_safe_remote_get( "http://florianbrinkmann.dev/themes-json/" );

			// Check if we have a valid response
			if ( is_wp_error( $theme_info ) || 200 !== wp_remote_retrieve_response_code( $theme_info ) ) {
				return $themes;
			} else {
				$response = $theme_info;
			} // End if().*/
			$response = '[{"name":"Photographus","description":"","version":"2.0.0","screenshot":["http:\/\/florianbrinkmann.dev\/wp-content\/uploads\/2017\/05\/screenshot.png"],"package":"https:\/\/github.com\/florianbrinkmann\/photographus\/releases\/download\/1.0.0\/photographus.zip","download_link":"Florian Brinkmann","id":"photographus","type":"fbn-themes"},{"name":"Schlicht","description":"Schlicht richtet sich an Blogger und legt den Fokus klar auf die Inhalte. Das Theme ist bewusst schlank gehalten und bringt deshalb nur wenige Einstellungsm\u00f6glichkeiten mit: So kann ein alternatives Layout gew\u00e4hlt, Seiten ohne Sidebar angelegt oder Initiale aktiviert werden.","version":"1.1.1","screenshot":["http:\/\/florianbrinkmann.dev\/wp-content\/uploads\/2016\/11\/screenshot-1.png"],"package":"https:\/\/github.com\/florianbrinkmann\/schlicht\/releases\/download\/1.3.1\/schlicht.zip","download_link":"Florian Brinkmann","id":"schlicht","type":"fbn-themes"}]';

			// Decode JSON.
			$data = json_decode( $response );

			foreach ( $data as $theme ) {
				$themes['themes'][] = [
					'id'          => $theme->id,
					'name'        => $theme->name,
					'screenshot'  => $theme->screenshot,
					'description' => $theme->description,
					'author'      => $theme->author,
					'version'     => $theme->version,
					'type'        => 'fbn-themes',
				];
			}
		}

		return $themes;
	}
}
