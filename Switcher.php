<?php

namespace TNL_Switcher;

defined('ABSPATH') || exit;

class Switcher
{
    public function __construct()
    {
        add_shortcode('tnl_switcher', [$this, 'render']);
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
    }

    public function render($atts)
    {
        global $wp;
    
        $atts = shortcode_atts([
            'title' => '',
            'left_url' => '/',
            'left_name' => '',
            'right_url' => '/',
            'right_name' => '',
        ], $atts, 'tnl_switcher');
    
        $title = esc_html($atts['title']);
        $left_url = esc_html($atts['left_url']);
        $left_name = esc_html($atts['left_name']);
        $right_url = esc_html($atts['right_url']);
        $right_name = esc_html($atts['right_name']);
    
        $active_class = "tnl-switcher-active-left";
        $active_url = $right_url;
        $current_url = home_url(add_query_arg([], $wp->request));
    
        if (strpos(rtrim($current_url, '/'), rtrim($right_url, '/')) === 0) {
            $active_class = "tnl-switcher-active-right";
            $active_url = $left_url;
        }
    
        return <<<HTML
            <div class="tnl-switcher {$active_class}">
                <span class="tnl-switcher-title">$title</span>
                <span class="tnl-switcher-name tnl-switcher-name-left">$left_name</span>
                <a href="{$active_url}" class="tnl-switcher-button"></a>
                <span class="tnl-switcher-name tnl-switcher-name-right">$right_name</span>
            </div>
        HTML;
    }
    
    public function register_styles()
    {
        wp_enqueue_style('tnl-switcher-styles', plugin_dir_url(__FILE__) . 'styles.css');
    }
}