<?php
/**
 * @package 3_ZNBC_plugin_oop
 * @version 1.0
 */
/*
Plugin Name: 3_ZNBC_plugin_oop
Plugin URI: http://flaven.fr/
Description: Show class usage by adding element in the content. This is the description for 3_ZNBC_plugin_oop
Author: Bruno Flaven
Version: 1.0
Author URI: http://flaven.fr/
*/

// If this file is accessed directory, then abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}


/* V0 */
/* 
add_action( 'the_content', 'my_thank_you_text' );
function my_thank_you_text ( $content ) {
    return $content .= '<code>No Class... Content coming from the plugin ZNBC_Plugin_Oop!<br>Add to $content</code>';
}

add_action( 'the_content', 'my_thank_you_text' );
*/

        

    /* V1 */
    class ZNBC_Plugin_Oop {

            public function __construct() {            
                    $this->init();
                }//EOF

            private function init() {
                add_action('the_content', array($this,'my_thank_you_text'));                
            }//EOF

            public function my_thank_you_text ($content) {
                    return $content .= '<code>With Class... Content coming from the plugin ZNBC_Plugin_Oop!<br>Add to $content</code>';
            }

    }//End of Class

    /* Instantiate the Class */
    global $ZNBC_var;
    $ZNBC_var = new ZNBC_Plugin_Oop();


?>
