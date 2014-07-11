<?php

/**
 * Plugin Name: WP Pjax
 * Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 * Description: Using and handling pjax requests
 * Version: 0.1
 * Author: Zoltán Várkonyi
 * Author URI: http://www.finehive.com
 * License: GPL2
 */
class WP_Pjax
{

    private $wp_pjax_path;
    private $wp_pjax_path_uri;

    public function __construct()
    {
        $this->wp_pjax_path = plugin_dir_path(__FILE__);
        $this->wp_pjax_path_uri = plugin_dir_url(__FILE__);
        require_once $this->wp_pjax_path . '/lib/simple_html_dom.php';

        // WP Hooks
        add_filter('template_include', array($this, 'filter_content'));
        add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
    }

    public function register_scripts()
    {
        wp_enqueue_script('jquery.pjax', $this->wp_pjax_path_uri . 'js/jquery.pjax.js', array('jquery'));
        wp_enqueue_script('wppjax', $this->wp_pjax_path_uri . 'js/wppjax.js', array('jquery.pjax'));
    }

    public function filter_content($template)
    {
        if (isset($_SERVER['HTTP_X_PJAX']) && strtolower($_SERVER['HTTP_X_PJAX']) == 'true') {
            $response = '';
            ob_start();
            include($template);
            $response = ob_get_contents();
            ob_end_clean();
            $response = str_get_html($response);
            $out = $response->find('title', 0);
            $out .= $response->find($_SERVER['HTTP_X_PJAX_CONTAINER'], 0)->innertext;
            echo $out;
            return false;
        } else {
            return $template;
        }
    }
}

new WP_Pjax();