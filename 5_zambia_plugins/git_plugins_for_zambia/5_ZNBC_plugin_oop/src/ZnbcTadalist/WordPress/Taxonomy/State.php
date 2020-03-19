<?php
// 5_ZNBC_plugin_oop/src/ZnbcTadalist/WordPress/PostType/Tada.php
/*
FIND MORE ON 

https://github.com/bflaven/PluginWordpressForFun/blob/master/bf_poc_api_wp/urban_art_hunting_app/urban_art_hunting_app.php
 */

namespace ZnbcTadalist\WordPress\Taxonomy;
use ZnbcTadalist\Models\HooksInterface;
use ZnbcTadalist\WordPress\Helpers\Taxonomy;
use ZnbcTadalist\WordPress\Helpers\PostType;



/**
 * State
 *
 * @author BF
 * @version 1.0.0
 * @since 1.0.0
 */

class State implements HooksInterface {
    public function hooks(){
        add_action( "init", array($this, 'initTaxonomy') );
    }
    public function initTaxonomy() {
        $labels = array(
            'name'              => __('State'),
        );
        $args = array(
            'labels'             => $labels,
        );
        register_taxonomy( Taxonomy::STATE, array( PostType::CPT_TADA ), $args );        
    }
   
}

