<?php

require_once get_theme_file_path("inc/helpers.php");
require_once get_theme_file_path("inc/class-primary-walker-nav-menu.php");

function cinemahub_setup() {
    add_theme_support("title-tag");
    add_theme_support("menus");
    add_theme_support("post-thumbnails");

    remove_image_size("1536x1536");
    remove_image_size("2048x2048");

    add_image_size("page_thumbnail", 1600, 500, true);
    add_image_size("movie_poster", 375, 562, true); // 2/3
    add_image_size("actor_photo", 300, 300, true);

    // add_editor_style(get_stylesheet_uri());
}
add_action("after_setup_theme", "cinemahub_setup");

function cinemahub_enqueue_styles() {
    wp_enqueue_style("cinemahub_style", get_stylesheet_uri());
    wp_enqueue_style("cinemahub_style_tailwind", get_theme_file_uri("assets/css/tailwind.css"));
}
add_action("wp_enqueue_scripts", "cinemahub_enqueue_styles");

function cinemahub_enqueue_scripts() {
    wp_enqueue_script("cinemahub_script", get_theme_file_uri("assets/js/script.js"), [], wp_get_theme()->get("Version"), ["strategy" => "defer"]);
}
add_action("wp_enqueue_scripts", "cinemahub_enqueue_scripts");

function cinemahub_register_menus() {
    register_nav_menus([
            "header_menu" => __("Header menu", "cinemahub"),
            "mobile_menu" => __("Mobile menu", "cinemahub")
        ]);
    }
add_action("init", "cinemahub_register_menus");

function cinemahub_highlight_text_shortcode($atts, $content = null) {
    if (!$content) return "";
    return "<span class='highlight'>" . esc_html($content) . "</span>";
}
add_shortcode("highlight", "cinemahub_highlight_text_shortcode");

function cinemahub_custom_search_params($query) {
    if ($query->is_search() && !is_admin() && $query->is_main_query()) {
        // $query->set("post_type", ["cinemahub_movie", "cinemahub_actor"]);
        $query->set("posts_per_page", -1);
    }
}
add_action("pre_get_posts", "cinemahub_custom_search_params");