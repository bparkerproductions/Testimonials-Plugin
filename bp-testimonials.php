<?php

/**
* Plugin Name: BP Testimonials
* Description: A custom testimonials plugin for my portfolio site
* Version: 1.0
* Requires at least: 5.6
* Requires PHP: 7.0
* Author: Marcelo Vieira
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: bp-testimonials
* Domain Path: /languages
*/
/*
BP Testimonials is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
BP Testimonials is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with BP Testimonials. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !class_exists( 'BP_Testimonials' ) ){

    class BP_Testimonials{

        public function __construct() {

            // Define constants used througout the plugin
            $this->define_constants();           

        }

         /**
         * Define Constants
         */
        public function define_constants(){
            // Path/URL to root of this plugin, with trailing slash.
            define ( 'BP_TESTIMONIALS_PATH', plugin_dir_path( __FILE__ ) );
            define ( 'BP_TESTIMONIALS_URL', plugin_dir_url( __FILE__ ) );
            define ( 'BP_TESTIMONIALS_VERSION', '1.0.0' );     
        }

        /**
         * Activate the plugin
         */
        public static function activate(){
            update_option('rewrite_rules', '' );
        }

        /**
         * Deactivate the plugin
         */
        public static function deactivate(){
            flush_rewrite_rules();
        }

        /**
         * Uninstall the plugin
         */
        public static function uninstall(){

        }

    }
}

if( class_exists( 'BP_Testimonials' ) ){
    // Installation and uninstallation hooks
    register_activation_hook( __FILE__, array( 'BP_Testimonials', 'activate'));
    register_deactivation_hook( __FILE__, array( 'BP_Testimonials', 'deactivate'));
    register_uninstall_hook( __FILE__, array( 'BP_Testimonials', 'uninstall' ) );

    $bp_testimonials = new BP_Testimonials();
}