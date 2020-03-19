<?php
/**
 * @package 4_ZNBC_plugin_oop
 * @version 1.0
 */
/*
Plugin Name: 4_ZNBC_plugin_oop
Plugin URI: http://flaven.fr/
Description: Show class usage and shortcode with [znbc_welcome_msg]. This is the description for 4_ZNBC_plugin_oop
Author: Bruno Flaven
Version: 1.0
Author URI: http://flaven.fr/
*/

// If this file is accessed directory, then abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

                    class Znbc_Wp_Oop {
 
                    var $pluginPath;
                    var $pluginUrl;
 
                    public function __construct()
                    {
                        // Set Plugin Path
                        $this->pluginPath = dirname(__FILE__);
 
                        // Set Plugin URL
                        $this->pluginUrl = WP_PLUGIN_URL . '/5_ZNBC_plugin_oop';
 
                        add_shortcode('znbc_welcome_msg', array($this, 'ZNBCWelcomeMsg'));
 
                    }


                    // Add [ZNBCWelcomeMsg] in a post
                    public function ZNBCWelcomeMsg ($content) {
                        return $content .= '<b>With Class... Shortcode plugin 5_ZNBC_plugin_oop</b><br><b>Using [ZNBCWelcomeMsg], add to $content</b><br>';

                    }
 
 
                }//EOC
 
                /* Instantiate the Class */
                $Znbc_Wp_Oop_value = new Znbc_Wp_Oop;


?>
