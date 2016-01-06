<?php


//Disable view of Admin bar on front end
show_admin_bar( false );

function my_scripts_method() {
	wp_enqueue_script(
		'viewpoint-checker',
		get_stylesheet_directory_uri() . '/js/viewpoint-checker.js',
		array( 'jquery' )
	);
		wp_enqueue_script(
		'sticky',
		get_stylesheet_directory_uri() . '/js/stickyfill.min.js',
		array( 'jquery' )
	);
		wp_enqueue_script(
		'lockr',
		get_stylesheet_directory_uri() . '/js/lockr.min.js',
		array( 'jquery' )
	);
		wp_enqueue_script(
		'venobox',
		get_stylesheet_directory_uri() . '/lib/venobox/venobox.min.js',
		array( 'jquery' )
	);
		wp_enqueue_script(
		'slick',
		'//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js',
		array( 'jquery' )
	);
//	 wp_enqueue_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js', array('jquery'), '1.8.6');
 	wp_enqueue_script('angular', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js', array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );


add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}


//Support Post thumbnails
add_theme_support( 'post-thumbnails', array( 'page', 'post' ) );      



//Register our Menus
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-middle' => __( 'Footer Menu Middle' ),
      'footer-right' => __( 'Footer Menu Right' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

//Register SideBar
add_action( 'widgets_init', 'cas_widgets_init' );
function cas_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'cas' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'cas' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s cas-sidebar-widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle cas-sidebar-title">',
	'after_title'   => '</h2>',
    ) );
}
//Custom Excerpt Ending
function replace_excerpt($content) {
       return str_replace('[&hellip;]',
               '<div class="more-link"><a href="'. get_permalink() .'" class="rm-link">Continue Reading</a></div>',
               $content
       );
}
add_filter('the_excerpt', 'replace_excerpt');

//Custom Search for Schools Post Type
function template_chooser($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'cas_school' )   
  {
    return locate_template('cas_school-search.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser');    



//  *********************************************************************************
// Custom Post Type - Schools
//  *********************************************************************************
// Creates the custom post type
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'cas_school',
		array(
			'labels' => array(
				'name' => __( 'Schools' ),
				'singular_name' => __( 'School' ),
				'add_new_item'  => __( 'Add New School' ),
				'new_item'       => __( 'New School' ),
				'edit_item'          => __( 'Edit School' ),
				'view_item'          => __( 'View School' ),
				'all_items'          => __( 'All Schools' )

			),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-location',
		'supports' => array(
				'title', 'revisions',
				),
		'rewrite' => array('slug' => 'schools'),

		)
	);
}
//Creates a custom taxonomy so they can have own set of Categories
//function cas_school_taxonomy_init() {
//	// create a new taxonomy
//	register_taxonomy(
//		'property_type',
//		'cas_school',
//		array(
//			'label' => __( 'Property Categories' ),
//			'hierarchical' => true,
//		)
//	);
//}
//add_action( 'init', 'cas_school_taxonomy_init' );
//register_taxonomy_for_object_type('property_type','cas_school');


//Removes the ability to create a custom slug
//add_action( 'add_meta_boxes', 'cas_school_add_meta_boxes' );
//function cas_school_add_meta_boxes() {
//    remove_meta_box( 'slugdiv', 'cas_school', 'normal' );
//}


//Create Metaboxes via github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
add_action( 'cmb2_init', 'cas_school_metaboxes' );

function cas_school_metaboxes() {
    $prefix = '_cas_school_'; // Prefix for all fields
    
		$cmb = new_cmb2_box(array(
        'id' => 'cas_school_general_metabox',
        'title' => 'General Information',
        'object_types' => array('cas_school'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
			));
        
       $cmb->add_field(array(
                'name' => 'School Name',
//                'desc' => 'Number and Street',
                'id' => $prefix . 'name',
                'type' => 'text_medium'
            ));
       $cmb->add_field(array(
                'name' => 'Sub Heading',
                'desc' => 'Sports/Seasons',
                'id' => $prefix . 'subheading',
                'type' => 'text'
            ));
       $cmb->add_field(array(
                'name' => 'Mascot',
//                'desc' => 'Zip Code',
                'id' => $prefix . 'mascot',
                'type' => 'text_small'
            ));
       $cmb->add_field(array(
                'name' => 'Colors',
//                'desc' => 'Zip Code',
                'id' => $prefix . 'colors',
                'type' => 'text_small'
            ));
				$cmb->add_field( array(
						'name'    => 'Page Feature Color',
						'id'      => $prefix . 'color_hex',
						'type'    => 'colorpicker',
						'default' => '#002a5c',
				) );
					$cmb->add_field(array(
								'name'             => 'Poster/Program',
								'id'               => $prefix . 'poster_program',
								'type'             => 'radio',
								'show_option_none' => true,
								'options'          => array(
										'poster' => __( 'Poster', 'cmb' ),
										'program'   => __( 'Program', 'cmb' ),
								),
						));
            $cmb->add_field(array(
                'name' => 'Description',
//                'desc' => '',
                'id' => $prefix . 'description',
                'type' => 'textarea'
            ));
            $cmb->add_field(array(
                'name' => 'Seasons and Sports',
//                'desc' => '',
                'id' => $prefix . 'season_sports',
                'type' => 'text'
            ));
            $cmb->add_field(array(
                'name' => 'INFO FIELD SPORTS',
//                'desc' => '',
                'id' => $prefix . 'info_field_sports',
                'type' => 'textarea'
            ));
}

add_action( 'cmb2_init', 'cas_school_metaboxes_two' );
function cas_school_metaboxes_two() {
 $prefix = '_cas_school_'; // Prefix for all fields
	
		$cmb_two = new_cmb2_box(array(
        'id' => 'cas_school_address_metabox',
        'title' => 'School Information',
        'object_types' => array('cas_school'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
			));
	
            $cmb_two->add_field(array(
                'name' => 'Address',
                'desc' => 'Number and Street',
                'id' => $prefix . 'address',
                'type' => 'text_medium'
            ));
            $cmb_two->add_field(array(
                'name' => 'City',
                'desc' => 'City',
                'id' => $prefix . 'city',
                'type' => 'text_small'
            ));
            $cmb_two->add_field(array(
                'name' => 'State',
                'desc' => 'State',
                'default' => 'CA',
                'id' => $prefix . 'state',
                'type' => 'text_small'
            ));
            $cmb_two->add_field(array(
                'name' => 'Zip Code',
                'desc' => 'Zip Code',
                'id' => $prefix . 'zip',
                'type' => 'text_small'
            ));
            $cmb_two->add_field(array(
                'name' => 'Leads From',
                'desc' => 'Leads From',
                'id' => $prefix . 'leads',
                'type' => 'text_small'
            ));
            $cmb_two->add_field(array(
                'name' => 'School Website',
                'desc' => '(must start with http://)',
                'id' => $prefix . 'site_url',
                'type' => 'text_url'
            ));
}

add_action( 'cmb2_init', 'cas_school_metaboxes_three' );
function cas_school_metaboxes_three() {
 $prefix = '_cas_school_'; // Prefix for all fields
	
	$cmb_three = new_cmb2_box(array(
        'id' => 'cas_school_contact_metabox',
        'title' => 'Contact Information',
        'object_types' => array('cas_school'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true
		));
           $cmb_three->add_field(array(
                'name' => 'Contact Name',
//                'desc' => 'Contact Phone Number',
                'id' => $prefix . 'contact_name',
                'type' => 'text_small'
            ));
            $cmb_three->add_field(array(
                'name' => 'Contact Job Title',
//                'desc' => 'Contact Phone Number',
                'id' => $prefix . 'contact_title',
                'type' => 'text_medium'
            ));
            $cmb_three->add_field(array(
                'name' => 'Phone Number',
//                'desc' => 'Contact Phone Number',
                'id' => $prefix . 'contact_phone',
                'type' => 'text_small'
            ));
            $cmb_three->add_field(array(
                'name' => 'Email Address',
                'desc' => 'sample@email.com',
                'id' => $prefix . 'contact_email',
                'type' => 'text_email'
            ));
}

add_action( 'cmb2_init', 'cas_school_metaboxes_four' );
function cas_school_metaboxes_four() {
	 $prefix = '_cas_school_'; // Prefix for all fields
	
	$cmb_four = new_cmb2_box(array(
        'id' => 'cas_school_images_metabox',
        'title' => 'Images and Graphics',
        'object_types' => array('cas_school'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
       ));
					
            $cmb_four->add_field(array(
                'name' => 'Logo',
                'desc' => 'Logo Image (preferably cropped to square dimensions)',
                'id' => $prefix . 'logo',
                'type' => 'file'
            ));
            $cmb_four->add_field(array(
                'name' => 'Background Image',
                'desc' => 'BG Image (preferably cropped to wide dimensions)',
                'id' => $prefix . 'background',
                'type' => 'file'
            ));
						$cmb_four->add_field(array(
								'name' => 'Previous Posters',
								'desc' => 'Select up to 3 Images for the Image Gallery',
								'id' => $prefix . 'previous_posters',
								'type' => 'file_list',
								// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
						));
}

add_action( 'cmb2_init', 'cas_school_metaboxes_five' );
function cas_school_metaboxes_five() {
 $prefix = '_cas_school_'; // Prefix for all fields
	$cmb_five = new_cmb2_box(array(
        'id' => 'cas_school_testimonial_metabox',
        'title' => 'Testimonal Information',
        'object_types' => array('cas_school'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
		));
          $cmb_five->add_field(array(
                'name' => 'Testimonial Text',
//                'desc' => 'Contact Phone Number',
                'id' => $prefix . 'testimonial_text',
                'type' => 'textarea'
            ));
          $cmb_five->add_field(array(
                'name' => 'Testimonial Name',
//                'desc' => 'Contact Phone Number',
                'id' => $prefix . 'testimonial_name',
                'type' => 'text_small'
            ));
          $cmb_five->add_field(array(
                'name' => 'Testimonial Business Name',
//                'desc' => 'Contact Phone Number',
                'id' => $prefix . 'testimonial_business_name',
                'type' => 'text_medium'
            ));
          $cmb_five->add_field(array(
                'name' => 'Testimonial Business Website',
//                'desc' => '(DO NOT INCLUDE http://)',
                'id' => $prefix . 'testimonial_business_url',
                'type' => 'text_url'
            ));
          $cmb_five->add_field(array(
                'name' => 'Achievements',
//                'desc' => 'Contact Phone Number',
                'id' => $prefix . 'testimonial_achievements',
                'type' => 'textarea'
            ));

}


?>