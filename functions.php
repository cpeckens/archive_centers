<?php
/********************Admin/Dashboard Functions**********************/
//add menu support
	add_theme_support( 'menus' );

	//register menus
		function ksascenters_register_my_menus() {
	  		register_nav_menus(
	    		array( 'header-menu' => __( 'Header Menu' ))
	  		);
		}
		
		// initiate register menus
			add_action( 'init', 'ksascenters_register_my_menus' );

//register thumbnail/featured image support
	add_theme_support( 'post-thumbnails' );

	// name of the thumbnail, width, height, crop mode
		add_image_size( 'page-image', 960, 360, true );

//register sidebars
	if ( function_exists('register_sidebar') )
		register_sidebar(array(
			'name'          => 'Department Address',
			'id'            => 'address-sb',
			'description'   => '',
			'before_widget' => '<div id="address-widget" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>'
			));	
		
//Add Theme Options Page
	if(is_admin()){	
		require_once('assets/functions/ksascent-theme-settings-basic.php');
	}
	
	//Collect current theme option values
		function ksascent_get_global_options(){
			$ksascent_option = array();
			$ksascent_option 	= get_option('ksascent_options');
		return $ksascent_option;
		}
	
	//Function to call theme options in theme files 
		$ksascent_option = ksascent_get_global_options();

/********************WYSIWYG Editor Modification**********************/
// add stylesheet for WYSIWYG editor
	function ksascent_add_editor_style() {
	  add_editor_style( 'style-editor.css' );
	}
	
	add_action( 'after_setup_theme', 'ksascent_add_editor_style' );

//Add style dropdown to WYSIWYG editor
	function ksascent_mce_buttons_2($buttons)
	{
		array_unshift($buttons, 'styleselect');
		return $buttons;
	}
	add_filter('mce_buttons_2', 'ksascent_mce_buttons_2');
	
	function ksascent_mce_before_init($init_array)
	{
		// add classes using a ; separated values
		$init_array['theme_advanced_styles'] = "Button=button;Divider=divider;Dark Blue=altcolorblue; Yellow=altyellow";
		return $init_array;
	}
	add_filter('tiny_mce_before_init', 'ksascent_mce_before_init');

// add additional buttons to WYSIWYG editor
	function ksascent_enable_more_buttons($buttons) {
	  $buttons[] = 'hr';
	  $buttons[] = 'sub';
	  $buttons[] = 'sup'; 
	  return $buttons;
	}
	add_filter("mce_buttons_3", "ksascent_enable_more_buttons");

/********************Functions for Template Files**********************/	
//pagination function
	function ksascenters_pagination($prev = '«', $next = '»') {
    	global $wp_query, $wp_rewrite;
    	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    	$pagination = array(
    	    'base' => @add_query_arg('paged','%#%'),
    	    'format' => '',
    	    'total' => $wp_query->max_num_pages,
    	    'current' => $current,
    	    'prev_text' => __($prev),
    	    'next_text' => __($next),
    	    'type' => 'plain'
		);		
    	if( $wp_rewrite->using_permalinks() )
    	    $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
		
    	if( !empty($wp_query->query_vars['s']) )
    	    $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
		
    	echo paginate_links( $pagination );
	};		

//Change Excerpt Length
	function ksascenters_new_excerpt_length($length) {
		return 100; //Change word count
	}
	add_filter('excerpt_length', 'ksascenters_new_excerpt_length');
	
/********************Includes to Additional Functions**********************/	
// include custom widget functionality, posttypes, taxonomies, and metaboxes
// uncomment the the lines below if using on a single install.  These are now plugins on the network install.
/*
	include_once (TEMPLATEPATH . '/assets/functions/ksascent-accordion.php');
*/
?>