<?php

namespace GenieAi\App\Providers;
class EnqueueProvider
{

    public function __construct()
    {
        add_action('init', function () {
            if (!is_user_logged_in() || !current_user_can('publish_posts')) {
                return;
            }

            add_action('enqueue_block_editor_assets', [$this, 'addEnqueue']);
            add_action('admin_enqueue_scripts', [$this, 'addEnqueue']);

            add_action('admin_enqueue_scripts', [$this, 'globalScripts']);
            add_action('elementor/editor/after_enqueue_scripts', [$this, 'addEnqueue']);
            add_action('elementor/editor/after_enqueue_scripts', [$this, 'elementorEditorStyle']);

        });
    }


    public function addEnqueue()
    {
        
        $current_screen = get_current_screen();

        if(is_admin()){

           wp_enqueue_script( 'getgenie-antd-scripts', GETGENIE_URL . 'assets/dist/admin/js/antd.js', ['wp-plugins', 'wp-i18n', 'wp-element', 'wp-dom', 'wp-data'], GETGENIE_VERSION, true );
            
           wp_enqueue_script( 'getgenie-handler-scripts', GETGENIE_URL . 'assets/dist/admin/js/app-handler.js', ['wp-plugins', 'wp-i18n', 'wp-element', 'wp-dom', 'wp-data'], GETGENIE_VERSION, true );
           wp_enqueue_script( 'getgenie-common-scripts', GETGENIE_URL . 'assets/dist/admin/js/common-scripts.js', ['wp-plugins', 'wp-i18n', 'wp-element', 'wp-dom', 'wp-data'], GETGENIE_VERSION, true );
           wp_enqueue_script( 'getgenie-templates-scripts', GETGENIE_URL . 'assets/dist/admin/js/templates-scripts.js', ['wp-plugins', 'wp-i18n', 'wp-element', 'wp-dom', 'wp-data'], GETGENIE_VERSION, true );
           
           $elementor_action = isset($_GET['action']) && $_GET['action'] == 'elementor';

           if($current_screen->is_block_editor() && !$elementor_action)
            {
                wp_enqueue_script( 'getgenie-blog-wizard-scripts', GETGENIE_URL . 'assets/dist/admin/js/blog-wizard.js', ['wp-plugins', 'wp-i18n', 'wp-element', 'wp-dom', 'wp-data'], GETGENIE_VERSION, true );
            }

           if($current_screen->id == 'product' 
                && $current_screen->base == 'post' 
                && $current_screen->post_type == 'product')
            {
                wp_enqueue_script( 'getgenie-woo-wizard-scripts', GETGENIE_URL . 'assets/dist/admin/js/woo-wizard.js', ['wp-plugins', 'wp-i18n', 'wp-element', 'wp-dom', 'wp-data'], GETGENIE_VERSION, true );
            }
            
            if($current_screen->id == 'toplevel_page_getgenie'){
                wp_enqueue_script( 'getgenie-admin-pages-scripts', GETGENIE_URL . 'assets/dist/admin/js/wp-admin-pages.js', ['wp-plugins', 'wp-i18n', 'wp-element', 'wp-dom', 'wp-data'], GETGENIE_VERSION, true );
            }
            wp_enqueue_script( 'getgenie-admin-scripts', GETGENIE_URL . 'assets/dist/admin/js/wp-integrations.js', ['wp-plugins','wp-edit-post', 'wp-i18n', 'wp-element', 'wp-dom', 'wp-data'], GETGENIE_VERSION, true );
            wp_enqueue_style( 'getgenie-fonts-style', GETGENIE_URL . 'assets/dist/admin/css/wp-font-family.css', [], GETGENIE_VERSION );
        }
    }

    public function globalScripts()
    {
        
        wp_enqueue_style( 'getgenie-icon-style', GETGENIE_URL . 'assets/dist/admin/css/icon-pack.css', [], GETGENIE_VERSION );
        wp_enqueue_style( 'getgenie-admin-global-style', GETGENIE_URL . 'assets/dist/admin/css/global.css', [], GETGENIE_VERSION );
    }

    public function elementorEditorStyle(){
        wp_enqueue_style( 'getgenie-editor-style', GETGENIE_URL . 'assets/dist/admin/css/elementor.css', [], GETGENIE_VERSION );
    }

}

