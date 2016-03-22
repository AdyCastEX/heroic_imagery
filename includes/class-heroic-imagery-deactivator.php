<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/AdyCastEX
 * @since      1.0.0
 *
 * @package    Heroic_Imagery
 * @subpackage Heroic_Imagery/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Heroic_Imagery
 * @subpackage Heroic_Imagery/includes
 * @author     Carl Adrian P. Castueras <ady.castueras@gmail.com>
 */
class Heroic_Imagery_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		Heroic_Imagery_Deactivator::heroic_imagery_db_drop();
	}

	public static function heroic_imagery_db_drop(){
		
		global $wpdb;
		//table name will be 'wp_hero_images'
		$table_name = $wpdb->prefix . 'hero_images';
		
		//declare an SQL query to delete hero_images table
		$sql = "DROP TABLE $table_name";
		//run the SQL query to delete the table
		$wpdb->query($sql);
	}
}
