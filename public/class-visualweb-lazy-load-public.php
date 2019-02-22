<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://visualweb.co.uk/lazyload
 * @since      1.0.0
 *
 * @package    Visualweb_Lazy_Load
 * @subpackage Visualweb_Lazy_Load/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Visualweb_Lazy_Load
 * @subpackage Visualweb_Lazy_Load/public
 * @author     VisualWeb <plugin@visualweb.co.uk>
 */
class Visualweb_Lazy_Load_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/visualweb-lazy-load-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/visualweb-lazy-load-public.js', array( 'jquery' ), $this->version, false );

	}
	public function buffer_start_vwebll() { 
		function vweblazyloadImages($wphtml) {
			$options = get_option('visualweb-lazy-load');
			$lazy_jq_selector = $options['lazy_jq_selector'];   
			
			$pq = phpQuery::newDocument($wphtml); 
			
			foreach(pq($lazy_jq_selector) as $stuff)
			{
			
			 if ($stuff->tagName == 'img'){
				 pq($stuff)->attr('data-src',pq($stuff)->attr('src'));
				 pq($stuff)->removeAttr('src');
				 pq($stuff)->attr('src','');
				 pq($stuff)->attr('data-srcset',pq($stuff)->attr('srcset'));
				 pq($stuff)->removeAttr('srcset');
				 pq($stuff)->attr('data-sizes',pq($stuff)->attr('sizes'));
				 pq($stuff)->removeAttr('sizes');
				 pq($stuff)->addClass('vweblazyload');
			 }
						  
			}
		    return $pq->html();
		    //return $wphtml;
		}
		ob_start("vweblazyloadImages"); 
	}

	public function buffer_end_vwebll() { ob_end_flush(); }



}