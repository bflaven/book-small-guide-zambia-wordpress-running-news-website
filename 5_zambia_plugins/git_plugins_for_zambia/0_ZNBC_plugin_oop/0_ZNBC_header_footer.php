<?php
/**
 * @package 0_ZNBC_header_footer
 * @version 1.0
 */
/*
Plugin Name: 0_ZNBC_header_footer
Plugin URI: http://flaven.fr/
Description: Disable the copyrightinfo in the footer, use Namespace and Class. This is the description for 0_ZNBC_header_footer
Author: Bruno Flaven
Version: 1.0
Author URI: http://flaven.fr/
*/

namespace ZNBC\Date\Footer;

// If this file is accessed directory, then abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}


class ZNBC_Date_Footer {

    

    public function __construct() {            
                    $this->init();
                }//EOF

     private function init() {

                // Hooks
                // add_action( 'admin_init', array( &$this, 'registerSettings' ) );
                // add_action( 'admin_menu', array( &$this, 'adminPanelsAndMetaBoxes' ) );
        

                // Frontend Hooks
                add_action( 'wp_head', array( &$this, 'frontendHeader' ) );
                add_action( 'wp_footer', array( &$this, 'frontendFooter' ) );

                //Frontend Filter
                // add_filter('the_content', array( &$this, 'replace_content' ));

              
            }

    public function frontendHeader() {
    
        $output = "\n\n";
        // 
        $output .= '<!--  ZNBC header -->';
        $output .= '<style type="text/css">';
        $output .= '.site-info .imprint { display: none; }';
        // border: 1px #ff0000 dotted; background-color: #CCDDEE;
        $output .= '.site-date-copyright {color:#000;width: 100%; display: block; padding: 0.7em 0 0; float:right; text-align:center;font-size: 13px; border: 1px #ff0000 dotted; background-color: #CCDDEE;}';
        //  for Integral
        // $output .= '.copyright { display: none; }';
        // $output .= '.site-date-copyright {';
        // $output .= 'color: #fff;';        
        // $output .= 'background: #111;';
        // $output .= 'padding: 20px 0 20px 0;';
        // $output .= 'text-align: center;';
        // $output .= '}';        
        $output .= '</style>';
        $output .= "\n\n";
        echo $output;
    }

    public function frontendFooter() {
    
        $output = "\n\n";
        $output .= '<!--  ZNBC footer -->';
        $output .= '<div class="wrap"><div class="site-date-copyright">&copy;&nbsp;'.date('Y').'&nbsp;'.get_bloginfo('name').'</div></div><!-- .site-date-copyright -->';
        $output .= "\n\n";
        echo $output;
    }


    

}//EOC
    
    /* Instantiate the Class */
    new ZNBC_Date_Footer();
    

?>
