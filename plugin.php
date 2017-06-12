<?php
/**
 * Plugin Name: Custom Post Type Glossaries
 * Plugin URI: https://horttcore.de
 * Description: Custom Post Type Glossaries
 * Version: 1.0.0
 * Author: Ralf Hortt
 * Author URI: https://horttcore.de
 * Text Domain: custom-post-type-glossaries
 * Domain Path: /languages/
 * License: GPL2
 */

require( 'classes/class.custom-post-type-glossaries.php' );

if ( is_admin() )
	require( 'classes/class.custom-post-type-glossaries.admin.php' );
