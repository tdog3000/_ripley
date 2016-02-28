<?php

/**
 * Fired during plugin activation
 *
 * @link       http://tom-napier.co.uk/
 * @since      1.0.0
 *
 * @package    TN_Portfolio
 * @subpackage TN_Portfolio/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    TN_Portfolio
 * @subpackage TN_Portfolio/includes
 * @author     Tom Napier <hello@tom-napier.co.uk>
 */
class TN_Portfolio_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

        $labels = array(
            'name'                  => _x( 'Work', 'Post Type General Name', $this->plugin_name ),
            'singular_name'         => _x( 'Project', 'Post Type Singular Name', $this->plugin_name ),
            'menu_name'             => __( 'Work', $this->plugin_name ),
            'name_admin_bar'        => __( 'Work', $this->plugin_name ),
            'archives'              => __( 'Work', $this->plugin_name ),
            'parent_item_colon'     => __( 'Parent Project:', $this->plugin_name ),
            'all_items'             => __( 'All Projects', $this->plugin_name ),
            'add_new_item'          => __( 'Add New Project', $this->plugin_name ),
            'add_new'               => __( 'Add New Project', $this->plugin_name ),
            'new_item'              => __( 'New Project', $this->plugin_name ),
            'edit_item'             => __( 'Edit Project', $this->plugin_name ),
            'update_item'           => __( 'Update Project', $this->plugin_name ),
            'view_item'             => __( 'View Project', $this->plugin_name ),
            'search_items'          => __( 'Search Project', $this->plugin_name ),
            'not_found'             => __( 'Not found', $this->plugin_name ),
            'not_found_in_trash'    => __( 'Not found in Trash', $this->plugin_name ),
            'featured_image'        => __( 'Featured Image', $this->plugin_name ),
            'set_featured_image'    => __( 'Set featured image', $this->plugin_name ),
            'remove_featured_image' => __( 'Remove featured image', $this->plugin_name ),
            'use_featured_image'    => __( 'Use as featured image', $this->plugin_name ),
            'insert_into_item'      => __( 'Insert into Project', $this->plugin_name ),
            'uploaded_to_this_item' => __( 'Uploaded to this Project', $this->plugin_name ),
            'items_list'            => __( 'Projects list', $this->plugin_name ),
            'items_list_navigation' => __( 'Porjects list navigation', $this->plugin_name ),
            'filter_items_list'     => __( 'Filter Projects list', $this->plugin_name ),
        );

        $args = array(
            'label'                 => __( 'Project', $this->plugin_name ),
            'description'           => __( 'A collection of my work', $this->plugin_name ),
            'labels'                => $labels,
            'menu_icon'             => 'dashicons-desktop',
            'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 20,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );

        register_post_type( 'work', $args );

        $labels = array(
            'name'                       => _x( 'Status', 'Taxonomy General Name', $this->plugin_name ),
            'singular_name'              => _x( 'Status', 'Taxonomy Singular Name', $this->plugin_name ),
            'menu_name'                  => __( 'Status', $this->plugin_name ),
            'all_items'                  => __( 'All Statuses', $this->plugin_name ),
            'parent_item'                => __( 'Parent Status', $this->plugin_name ),
            'parent_item_colon'          => __( 'Parent Status:', $this->plugin_name ),
            'new_item_name'              => __( 'New Status Name', $this->plugin_name ),
            'add_new_item'               => __( 'Add New Status', $this->plugin_name ),
            'edit_item'                  => __( 'Edit Status', $this->plugin_name ),
            'update_item'                => __( 'Update Status', $this->plugin_name ),
            'view_item'                  => __( 'View Status', $this->plugin_name ),
            'separate_items_with_commas' => __( 'Separate statuses with commas', $this->plugin_name ),
            'add_or_remove_items'        => __( 'Add or remove statuses', $this->plugin_name ),
            'choose_from_most_used'      => __( 'Choose from the most used statuses', $this->plugin_name ),
            'popular_items'              => __( 'Popular Statuses', $this->plugin_name ),
            'search_items'               => __( 'Search Statuses', $this->plugin_name ),
            'not_found'                  => __( 'Not Found', $this->plugin_name ),
            'no_terms'                   => __( 'No statuses', $this->plugin_name ),
            'items_list'                 => __( 'statuses list', $this->plugin_name ),
            'items_list_navigation'      => __( 'statuses list navigation', $this->plugin_name ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => array('slug' => 'work', 'with_front' => false)
        );

        register_taxonomy( 'status', array( 'work' ), $args );

        flush_rewrite_rules();

	}

}