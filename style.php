<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

header('Content-type: text/css');
ob_start("compress");
    
    require_once('../../../wp-load.php'); 
    function compress( $minify )
    {
	    /* remove tabs, spaces, newlines, etc. */
    	$minify = str_replace( array("\r\n", "\r", "\n", "\t", "  "), '', $minify );

    	$minify = str_replace("  ", ' ', $minify );
        return $minify;
    }

    /* css files for combining */
    include(get_template_directory () . '/style.css');
    include(get_template_directory () . '/css/custom.css.php');
    include(get_template_directory () . '/fonts/stylesheet.css');
    include(get_template_directory () . '/css/home.css');
    include(get_template_directory () . '/css/bjqs.css');
    if(!is_front_page()){ 
        include(get_template_directory () . '/css/j.css');
        include(get_template_directory () . '/css/page.css');
    }
    include(get_template_directory () . '/style-mobile.css');
    include(get_template_directory () . '/css/modal.css');
    include(get_template_directory () . '/css/cada-curso.css');

ob_end_flush(); 
