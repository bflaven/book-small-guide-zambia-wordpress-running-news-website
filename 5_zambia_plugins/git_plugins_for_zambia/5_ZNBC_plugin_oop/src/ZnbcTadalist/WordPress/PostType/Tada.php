<?php
// 5_ZNBC_plugin_oop/src/ZnbcTadalist/WordPress/PostType/Tada.php
/*
FIND MORE ON 

https://github.com/bflaven/PluginWordpressForFun/blob/master/bf_poc_api_wp/urban_art_hunting_app/urban_art_hunting_app.php
 */

namespace ZnbcTadalist\WordPress\PostType;
use ZnbcTadalist\Models\HooksInterface;
use ZnbcTadalist\WordPress\Helpers\PostType;

/**
 * Todo
 *
 * @author BF
 * @version 1.0.0
 * @since 1.0.0
 */
class Tada implements HooksInterface {


    /**
     * @see ZnbcTadalist\Models\HooksInterface
     */
    public function hooks(){

        add_action( "init", array($this, 'initPostType') );

    }



    /**
     * @filter todolist_rewrite_cpt_tada
     * @filter todolist_register_ PostType::CPT_TADA _post_type
     * @see ZnbcTadalist\WordPress\Helpers\PostType
     */
    public function initPostType(){

        $labels = array(
            'name'               => __('Tadas'),
            'singular_name'      => __('Tada'),
            'menu_name'          => __('Tadas'),
            'name_admin_bar'     => __('Tadas'),
            'view'               => __('View tada'),
            'all_items'          => __('All tadas'),
            'search_items'       => __('Search tadas'),
            'not_found'          => __('Tada not found'),
            'not_found_in_trash' => __('Tada not found')
        );

        $args = array(
            'labels'             => $labels,
            // Without taxonomy
            // 'supports'           => array('title','editor','thumbnail'),
            // With taxonomy
            'supports'           => array('title','editor','thumbnail','taxonomies'),
            'public'             => true,
            'query_var'          => true,
            'rewrite'            => array( 
                'slug' => 'tadas'
            ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-universal-access' 
            // 'menu_icon' => 'dashicons-welcome-add-page' 
        );

        register_post_type(PostType::CPT_TADA , apply_filters("todolist_register_" . PostType::CPT_TADA . "_post_type", $args) );
    }
}

