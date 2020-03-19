<?php
/**
 * @package 2_ZNBC_plugin_oop
 * @version 1.0
 */
/*
Plugin Name: 2_ZNBC_plugin_oop
Plugin URI: http://flaven.fr/
Description: Show in the path template in a comment in the footer. This is the description for 2_ZNBC_plugin_oop
Author: Bruno Flaven
Version: 1.0
Author URI: http://flaven.fr/
*/

/* V0 */
namespace ZNBC\Path\Template;

// If this file is accessed directory, then abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class ZNBC_Which_Wordpress_Template {

    

    public function __construct() {            
                    $this->init();
                }//EOF

     private function init() {
        

                // Frontend Hooks
                add_action( 'wp_footer', array( &$this, 'frontendShowPathTemplate' ) );
              
            }

    public function frontendShowPathTemplate () {
                global $template;
                $output = "\n\n";
                $output .= '<!--  ZNBC footer for path template from ZNBC\Path\Template V0 -->';
                $output .= "\n";
                $output .= '<!-- template path => '.$template.' -->';
                $output .= "\n\n";
                echo $output;
        }

}//EOC
    
    /* Instantiate the Class */
    new ZNBC_Which_Wordpress_Template();


/* V1 */
// namespace ZNBC\Path\Template;


//         function frontendShowPathTemplate () {
//                 global $template;
//                 $output = "\n\n";
//                 $output .= '<!--  ZNBC footer for path template from ZNBC\Path\Template V1 -->';
//                 $output .= "\n";
//                 $output .= '<!-- template path => '.$template.' -->';
//                 $output .= "\n\n";
//                 echo $output;
//         }

//         add_action( 'wp_head', 'ZNBC\Path\Template\frontendShowPathTemplate' );


?>
