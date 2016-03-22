<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/AdyCastEX
 * @since      1.0.0
 *
 * @package    Heroic_Imagery
 * @subpackage Heroic_Imagery/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Heroic_Imagery
 * @subpackage Heroic_Imagery/admin
 * @author     Carl Adrian P. Castueras <ady.castueras@gmail.com>
 */
class Heroic_Imagery_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Heroic_Imagery_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Heroic_Imagery_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/heroic-imagery-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Heroic_Imagery_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Heroic_Imagery_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/heroic-imagery-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function add_plugin_admin_menu(){
		//creates the top level menu for the plugin
		add_menu_page(' Heroic Imagery ',' Heroic Imagery ','manage_options',$this->plugin_name,array($this,'display_plugin_setup_page'));
		//creates a submenu for the hero image library, set the slug to be the same as the parent so that clicking the submenu leads to the main menu page
		add_submenu_page($this->plugin_name,' Hero Image Library ',' Library ','manage_options',$this->plugin_name,array($this,'display_plugin_setup_page'));
		//creates a submenu for creating a new hero image
		add_submenu_page($this->plugin_name,' Create New Hero Image ',' Add New ','manage_options',$this->plugin_name.'-add-new',array($this,'display_add_new_page'));

	}
	
	public function add_action_links($links){
		$settings_link = array(
			'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings',$this->plugin_name) . '</a>', 	
		);
		
		return array_merge($settings_link,$links);
	}
	
	public function display_plugin_setup_page(){
		//render the partial/template for the main admin display (hero image library)
		include_once('partials/heroic-imagery-admin-display.php');
	}
	
	public function display_add_new_page(){
		//render the partial/template for the add new hero image display
		include_once('partials/heroic-imagery-admin-add-new.php');
	}

}
