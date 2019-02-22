<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://visualweb.co.uk/lazyload
 * @since      1.0.0
 *
 * @package    Visualweb_Lazy_Load
 * @subpackage Visualweb_Lazy_Load/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Visualweb_Lazy_Load
 * @subpackage Visualweb_Lazy_Load/admin
 * @author     VisualWeb <plugin@visualweb.co.uk>
 */
class Visualweb_Lazy_Load_Admin {

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
		 * defined in Visualweb_Lazy_Load_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Visualweb_Lazy_Load_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/visualweb-lazy-load-admin.css', array(), $this->version, 'all' );

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
		 * defined in Visualweb_Lazy_Load_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Visualweb_Lazy_Load_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/visualweb-lazy-load-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function settings_link( $links ) {
		$settings_link = '<a href="admin.php?page=vweblazyload_plugin">Settings</a>';
		array_push($links,$settings_link);
		return $links;
	}
	
	public function add_menu_page() {
		add_menu_page('vWeb Lazy Load','LazyLoad','manage_options','vweblazyload_plugin',array($this,'LazyLoadAdminPage'),'dashicons-store', 110);
	}
    public function LazyLoadAdminPage() {
    	
    	require_once plugin_dir_path( __FILE__ ) . 'partials/visualweb-lazy-load-admin-display.php';
    }
	public function validate($input) {

	    $valid['lazy_jq_selector'] = sanitize_text_field($input['lazy_jq_selector']);
		$valid['lazy_jq_on'] = (isset($input['lazy_jq_on']) && !empty($input['lazy_jq_on'])) ? 1 : 0;
		
	    return $valid;
	 }
	public function options_update() {
	    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}

}