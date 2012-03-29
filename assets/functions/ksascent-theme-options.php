<?php
/**
 * Define our settings sections
 *
 * array key=$id, array value=$title in: add_settings_section( $id, $title, $callback, $page );
 * @return array
 */
function ksascent_options_page_sections() {
	
	$sections = array();
	// $sections[$id] 				= __($title, 'ksascent_textdomain');
	$sections['select_section'] 	= __('Theme Options', 'ksascent_textdomain');
	
	return $sections;	
}

/**
 * Define our form fields (settings) 
 *
 * @return array
 */
function ksascent_options_page_fields() {
	// Text Form Fields section
	// Select Form Fields section
	
	$options[] = array(
		"section" => "select_section",
		"id"      => KSASCENT_SHORTNAME . "_select_input",
		"title"   => __( 'Center/Program/Institute Name', 'ksascent_textdomain' ),
		"desc"    => __( 'This information will be used to populate your directory page', 'ksascent_textdomain' ),
		"type"    => "select2",
		"std"    => "africana",
		"choices" => array( __('Africana Studies','ksascent_textdomain') . "|africana", __('Archaeology','ksascent_textdomain') . "|archaeology", __('Astrophysical Sciences','ksascent_textdomain') . "|astro", __('Behavioral Biology','ksascent_textdomain') . "|behavbio", __('Biophysical Research','ksascent_textdomain') . "|biophys", __('Financial Economics','ksascent_textdomain') . "|cfe", __('China STEM','ksascent_textdomain') . "|chinastem", __('CMDB Program','ksascent_textdomain') . "|cmdb", __('East Asian','ksascent_textdomain') . "|eastasian", __('Embryology','ksascent_textdomain') . "|embryo", __('Expository Writing','ksascent_textdomain') . "|ewp", __('Film and Media','ksascent_textdomain') . "|film", __('Applied Economics','ksascent_textdomain') . "|iae", __('International Studies','ksascent_textdomain') . "|international", __('Jewish Studies','ksascent_textdomain') . "|jewish", __('Language Education','ksascent_textdomain') . "|cledu", __('Latin American Studies','ksascent_textdomain') . "|plas", __('Materials Research','ksascent_textdomain') . "|materials", __('Mind Brain Institute','ksascent_textdomain') . "|mindbrain", __('Modern German Thought','ksascent_textdomain') . "|maxkade", __('Museums and Society','ksascent_textdomain') . "|museums", __('Neuroscience','ksascent_textdomain') . "|neuroscience", __('Odyssey','ksascent_textdomain') . "|odyssey", __('Osher Lifelong','ksascent_textdomain') . "|osher", __('Policy Studies','ksascent_textdomain') . "|policystudies", __('Premodern Europe','ksascent_textdomain') . "|singleton", __('Public Health','ksascent_textdomain') . "|publichealth", __('Theatre Arts','ksascent_textdomain') . "|theatre", __('Women Gender and Sexuality','ksascent_textdomain') . "|wgs", __('Writing Center','ksascent_textdomain') . "|writingcenter")
		);
	return $options;	
}
?>