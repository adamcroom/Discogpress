<?php
/**
 * Plugin Name: Make Records 
 * Plugin URI: https://github.com/woodwardtw/
 * Description: Parses CSV to make records
 * Version: 1.1
 * Author: Tom Woodward
 * Author URI: http://bionicteaching.com
 * License: GPL2
 */
 
 /*   2016 Tom  (email : bionicteaching@gmail.com)
 
 	This program is free software; you can redistribute it and/or modify
 	it under the terms of the GNU General Public License, version 2, as 
 	published by the Free Software Foundation.
 
 	This program is distributed in the hope that it will be useful,
 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 	GNU General Public License for more details.
 
 	You should have received a copy of the GNU General Public License
 	along with this program; if not, write to the Free Software
 	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if ( isset($_GET['run_my_script']) ) {
    add_action('init', 'makeRecords', 10);
    add_action('init', 'script_finished', 20);
}
 
//function my_script_function() {
    // this is where your custom code goes
//}
 
function script_finished() {
    add_option('my_script_complete', 1);
    die("Script finished.");
}


add_action( 'init', 'custom_post_type_record', 0 );


function custom_post_type_record() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'records', 'Post Type General Name', 'examples' ),
        'singular_name'       => _x( 'record', 'Post Type Singular Name', 'examples' ),
        'menu_name'           => __( 'records', 'examples' ),
        'parent_item_colon'   => __( 'Parent record', 'examples' ),
        'all_items'           => __( 'All records', 'examples' ),
        'view_item'           => __( 'View record', 'examples' ),
        'add_new_item'        => __( 'Add New record', 'examples' ),
        'add_new'             => __( 'Add New', 'examples' ),
        'edit_item'           => __( 'Edit record', 'examples' ),
        'update_item'         => __( 'Update record', 'examples' ),
        'search_items'        => __( 'Search record', 'examples' ),
        'not_found'           => __( 'Not Found', 'examples' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'examples' ),
    );
    
// Set other options for Custom Post Type
    
    $args = array(
        'label'               => __( 'records', 'examples' ),
        'description'         => __( 'record info', 'examples' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'record', 'post_tag', 'category' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */  
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 2,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
// Registering your Custom Post Type
    register_post_type( 'records', $args );

}   

function makeRecords(){

	
 			$file = 'https://docs.google.com/spreadsheets/d/1EHQXnOwBNiF6QbdFM3EYguLshn6-OwiApSeY16gR2lc/pub?output=csv';
            $csv = array_map('str_getcsv', file($file));
            array_walk($csv, function(&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
                                    });
        foreach($csv as $item) { 	

            $title = $item['title'];
			$added = $item['added'];
			$label = $item['label'];			
			$label_cat = $item['label_cat_no'];			
			$entity = $item['entity_type'];			
			$format = $item['format'];
			$format_name = $item['format_name'];
			$artist = $item['artist'];
			$year = $item['year'];
			$body = $item['artist'];
		 	$my_post = array(
		    'post_title' => $title,
		    'post_content' => $body,
		    'post_status' => 'publish',
		    'post_author'   => 1,
		    'post_type' => 'records',
		);

		$the_post_id = wp_insert_post( $my_post );
		if ( ! add_post_meta( $the_post_id, 'added', $added, true ) ) { 
			   update_post_meta ( $the_post_id, 'added', $added );
			}
		if ( ! add_post_meta( $the_post_id, 'label', $label, true ) ) { 
			   update_post_meta ( $the_post_id, 'label', $label );
			}
		if ( ! add_post_meta( $the_post_id, 'label_cat', $label_cat, true ) ) { 
			   update_post_meta ( $the_post_id, 'label_cat', $label_cat );
			}		
		if ( ! add_post_meta( $the_post_id, 'entity-type', $entity, true ) ) { 
			   update_post_meta ( $the_post_id, 'entity-type', $entity );
			}
		if ( ! add_post_meta( $the_post_id, 'format', $format, true ) ) { 
			   update_post_meta ( $the_post_id, 'format', $format );
			}	
		if ( ! add_post_meta( $the_post_id, 'format-name', $format_name, true ) ) { 
			   update_post_meta ( $the_post_id, 'format-name', $format_name );
			}
		if ( ! add_post_meta( $the_post_id, 'artist', $artist, true ) ) { 
			   update_post_meta ( $the_post_id, 'artist', $artist );
			}	
		if ( ! add_post_meta( $the_post_id, 'year', $year, true ) ) { 
			   update_post_meta ( $the_post_id, 'year', $year );
			}
	}
	
}


//add_action ('init','makeRecords'); //use init to trigger this as allows time for everything else to kick in
