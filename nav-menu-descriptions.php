<?php
/*
Plugin Name: Nav Menu Item Descriptions
Plugin URI: https://github.com/OM4/nav-menu-descriptions
Description: Make it easy for your visitors to navigate around your website by including descriptions for each nav menu item.
Version: 0.1
Author: OM4
Author URI: http://om4.com.au/
Text Domain: nav-menu-descriptions
Git URI: https://github.com/OM4/nav-menu-descriptions
Git Branch: release
License: GPLv2
*/

/*
Copyright 2014 OM4 (email: info@om4.com.au    web: http://om4.com.au/)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! class_exists( 'Nav_Menu_Descriptions' ) ) {

	/**
	 * This class is a singleton.
	 *
	 * Class Nav_Menu_Descriptions
	 */
	class Nav_Menu_Descriptions {

		/**
		 * Refers to a single instance of this class
		 */
		private static $instance = null;

		/**
		 * Creates or returns an instance of this class
		 * @return Nav_Menu_Descriptions A single instance of this class
		 */
		public static function instance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;

		}

		/**
		 * Constructor
		 */
		private function __construct() {

			add_filter( 'walker_nav_menu_start_el', array( $this, 'walker_nav_menu_start_el' ), 10, 4 );

		}

		public function walker_nav_menu_start_el( $item_output, $item, $depth, $args ) {
			if ( !empty ($item->description ) ) {
				$item_output .= '<span class="menu-item-description">' . esc_html( $item->description ) . '</span>';
			}
			return $item_output;
		}

	}

	Nav_Menu_Descriptions::instance();

}