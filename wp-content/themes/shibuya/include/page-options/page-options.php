<?php 

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Amministrazione',
		'menu_title'	=> 'Amministrazione',
		'menu_slug' 	=> 'amministrazione-white-sand',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Opzioni personalizzati per la testata',
		'menu_title'	=> 'Testata',
		'parent_slug'	=> 'mministrazione-white-sand',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Newsletter',
		'menu_title'	=> 'Newsletter',
		'parent_slug'	=> 'mministrazione-white-sand',
    ));
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Info aziendali',
		'menu_title'	=> 'Info aziendali',
		'parent_slug'	=> 'mministrazione-white-sand',
	));
	
}