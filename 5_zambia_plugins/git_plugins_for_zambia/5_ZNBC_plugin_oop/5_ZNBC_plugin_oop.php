<?php
/**
 * Plugin Name: 5_ZNBC_plugin_oop
* Plugin URI: http://flaven.fr/
* Description: Add a Todo custom PostType (znbc-tada) and Taxonomy (znbc-state), do not forget to add in the theme, 3 files: archive-{post_type}.php and single-{post_type}.php, content-excerpt-znbc.php to see on the front | This is the description for 5_ZNBC_plugin_oop
* Author: Bruno Flaven
* Version: 1.0
* Author URI: http://flaven.fr/
 *
 * 
 */


require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );

use ZnbcTadalist\ZnbcTadalist;

//Add for the post-type Tada
use ZnbcTadalist\WordPress\PostType\Tada;

//Add for the taxonomy State
use ZnbcTadalist\WordPress\Taxonomy\State;

define("ZNBC_PLUGIN_PATH", plugin_dir_path( __FILE__ ));
define("ZNBC_PLUGIN_DIR_TEMPLATES", ZNBC_PLUGIN_PATH . "templates" );
define("ZNBC_PLUGIN_DIR_TEMPLATES_ADMIN", ZNBC_PLUGIN_DIR_TEMPLATES . "/admin" );


$actions = array(
	//Load the post-type Tada e.g. znbc-tada
    new Tada(),
	//Load the taxonomy State e.g. znbc-state
    new State()
);

/* Instantiate the Class */
$tadalist = new ZnbcTadalist($actions);
$tadalist->execute();


