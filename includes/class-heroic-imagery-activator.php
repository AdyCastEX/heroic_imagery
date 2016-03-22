<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/AdyCastEX
 * @since      1.0.0
 *
 * @package    Heroic_Imagery
 * @subpackage Heroic_Imagery/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Heroic_Imagery
 * @subpackage Heroic_Imagery/includes
 * @author     Carl Adrian P. Castueras <ady.castueras@gmail.com>
 */
class Heroic_Imagery_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		Heroic_Imagery_Activator::heroic_imagery_db_create();
	}
	
	public static function heroic_imagery_db_create(){
		
		global $wpdb;
		//set the charset to ensure that the entries are saved in the correct encoding
		$charset_collate = $wpdb->get_charset_collate();
		//table name will be 'wp_hero_images'
		$table_name = $wpdb->prefix . 'hero_images';
		
		//declare an SQL query that will create the table
		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					name varchar(255),
					image_link varchar(255),
					caption varchar(255),
					text_size int(5),
					alignment enum('left','right','center','justify'),
					PRIMARY KEY  (id)
		) $charset_collate;";
		
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		//run the create table query
		dbDelta($sql);
	}

}
