<?php
/**
 *
 *  Custom Post Type Glossaries
 *
 */
final class Custom_Post_Type_Glossaries
{



	/**
	 * Plugin constructor
	 *
	 * @return void
	 * @author Ralf Hortt
	 * @since 1.0
	 **/
	public function __construct()
	{

		add_action( 'init', array( $this, 'register_post_type' ) );
		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );

	} // END __construct



	/**
	 * Load plugin translation
	 *
	 * @access public
	 * @return void
	 * @author Ralf Hortt <me@horttcore.de>
	 * @since v1.0
	 **/
	public function load_plugin_textdomain()
	{

		load_plugin_textdomain( 'custom-post-type-glossaries', false, dirname( plugin_basename( __FILE__ ) ) . '/../languages/'  );

	} // END load_plugin_textdomain



	/**
	 * Register Post Type
	 *
	 * @access public
	 * @return void
	 * @author Ralf Hortt
	 * @since 1.0
	 */
	public function register_post_type()
	{

		register_post_type( 'glossaries', array(
			'labels' => array(
				'name' => _x( 'Glossaries', 'post type general name', 'custom-post-type-glossaries' ),
				'singular_name' => _x( 'Glossary', 'post type singular name', 'custom-post-type-glossaries' ),
				'add_new' => _x( 'Add New', 'Glossary', 'custom-post-type-glossaries' ),
				'add_new_item' => __( 'Add New Glossary', 'custom-post-type-glossaries' ),
				'edit_item' => __( 'Edit Glossary', 'custom-post-type-glossaries' ),
				'new_item' => __( 'New Glossary', 'custom-post-type-glossaries' ),
				'view_item' => __( 'View glossary', 'custom-post-type-glossaries' ),
				'view_items' => __('View glossaries'),
				'search_items' => __( 'Search Glossaries', 'custom-post-type-glossaries' ),
				'not_found' =>  __( 'No glossaries found', 'custom-post-type-glossaries' ),
				'not_found_in_trash' => __( 'No glossaries found in Trash', 'custom-post-type-glossaries' ),
				'parent_item_colon' => __('Parent Glossary:', 'custom-post-type-glossaries' ),
				'all_items' => __( 'All Glossaries', 'custom-post-type-glossaries' ),
				'archives' => __( 'Glossary Archive', 'custom-post-type-glossaries' ),
				'attributes' => __( 'Glossary Attributes', 'custom-post-type-glossaries' ),
				'insert_into_item' => __( 'Insert into glossary', 'custom-post-type-glossaries' ),
				'uploaded_to_this_item' => __( 'Uploaded to this glossary', 'custom-post-type-glossaries' ),
				'featured_image' => __( 'Featured Image', 'custom-post-type-glossaries' ),
				'set_featured_image' => __( 'Set featured image', 'custom-post-type-glossaries' ),
				'remove_featured_image' => __( 'Remove featured image', 'custom-post-type-glossaries' ),
				'use_featured_image' => __( 'Use as featured image', 'custom-post-type-glossaries' ),
				'filter_items_list' => __( 'Filter glossaries list', 'custom-post-type-glossaries' ),
				'items_list_navigation' => __( 'Glossaries list navigation', 'custom-post-type-glossaries' ),
				'items_list' => __( 'Glossaries list', 'custom-post-type-glossaries' ),
				'menu_name' => __( 'Glossaries', 'custom-post-type-glossaries' )
			),
			'public' => TRUE,
			'publicly_queryable' => TRUE,
			'show_ui' => TRUE,
			'show_in_menu' => TRUE,
			'query_var' => TRUE,
			'rewrite' => array( 'slug' => _x( 'glossaries', 'Post Type Slug', 'custom-post-type-glossaries' ) ),
			'capability_type' => 'post',
			'has_archive' => TRUE,
			'hierarchical' => FALSE,
			'menu_position' => NULL,
			'supports' => array('title', 'editor' ),
			'menu_icon' => 'dashicons-editor-ul'
		) );

	} // END register_post_type



} // END final class Custom_Post_Type_Glossaries

new Custom_Post_Type_Glossaries;
