<?php
/**
 * @package 1_ZNBC_plugin_oop
 * @version 1.0
 */
/*
Plugin Name: 1_ZNBC_plugin_oop
Plugin URI: http://flaven.fr/
Description: Change the footer and the header of WP, use Namespace and Class. This is the description for 1_ZNBC_plugin_oop
Author: Bruno Flaven
Version: 1.0
Author URI: http://flaven.fr/
*/



namespace ZNBC\Insert;
use ZNBC\Insert\Models;

include 'Models/footer.php';
include 'Models/header.php';

add_action( 'wp_head', [ 'ZNBC\Insert\Models\DisplayHeader', 'frontendHeader' ] );
add_action( 'wp_footer', [ 'ZNBC\Insert\Models\DisplayFooter', 'frontendFooter' ] );


?>
