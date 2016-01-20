<?php
/*
Plugin Name: Multilingual Template Hierarchy
Plugin URI:  https://github.com/resulto-admin/wordpress-multilingual-template-hierarchy
Description: Enables theme developers using WPML to create type-slug.php templates in the default language. For example, if you create page-my-english-slug.php template, it will be used for the same page in other languages.
Version:     1.0.1
Author:      Resulto Developpement Web Inc.
Author URI:  http://www.resulto.ca
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
*/

// TODO Refactor and extract common code :-)
// TODO Add support for translated taxonomies.

add_filter( 'page_template', 'multi_lingual_page_template');

function multi_lingual_page_template($template) {
    global $post;
    $template_name = basename($template);
    if (!($template_name === 'page.php' || $template_name === 'singular.php' || $template_name === 'index.php')) {
        return $template;
    }
    $current_lang = apply_filters('wpml_current_language', NULL);
    $default_lang = apply_filters('wpml_default_language', NULL);
    if ($current_lang === $default_lang) {
        return $template;
    }

    $id_in_default_lang = apply_filters('wpml_object_id', $post->ID, 'page', FALSE, $default_lang);

    if (!$id_in_default_lang) {
        return $template;
    }

    $temp_post = get_post($id_in_default_lang);

    if (!$temp_post) {
        return $template;
    }

    $template_name = 'page-' . $temp_post->post_name . '.php';

    $template_path = locate_template($template_name);

    if ($template_path) {
        return $template_path;
    }

    return $template;
}


add_filter( 'category_template', 'multi_lingual_category_template');

function multi_lingual_category_template($template) {
    $template_name = basename($template);
    if (!($template_name === 'category.php' || $template_name === 'archive.php' || $template_name === 'index.php')) {
        return $template;
    }
    $current_lang = apply_filters('wpml_current_language', NULL);
    $default_lang = apply_filters('wpml_default_language', NULL);
    if ($current_lang === $default_lang) {
        return $template;
    }

    $category_id = get_query_var('cat');
    $id_in_default_lang = apply_filters('wpml_object_id', $category, 'category', FALSE, $default_lang);

    if (!$id_in_default_lang) {
        return $template;
    }

    $category = get_category($id_in_default_lang);

    if (!$category) {
        return $template;
    }

    $template_name = 'category-' . $category->slug . '.php';

    $template_path = locate_template($template_name);

    if ($template_path) {
        return $template_path;
    }

    return $template;
}

add_filter( 'tag_template', 'multi_lingual_tag_template');

function multi_lingual_tag_template($template) {
    $template_name = basename($template);
    if (!($template_name === 'tag.php' || $template_name === 'archive.php' || $template_name === 'index.php')) {
        return $template;
    }
    $current_lang = apply_filters('wpml_current_language', NULL);
    $default_lang = apply_filters('wpml_default_language', NULL);
    if ($current_lang === $default_lang) {
        return $template;
    }

    $tag_id = get_query_var('tag');
    $id_in_default_lang = apply_filters('wpml_object_id', $tag_id, 'tag', FALSE, $default_lang);

    if (!$id_in_default_lang) {
        return $template;
    }

    $tag = get_tag($id_in_default_lang);

    if (!$tag) {
        return $template;
    }

    $template_name = 'tag-' . $tag->slug . '.php';

    $template_path = locate_template($template_name);

    if ($template_path) {
        return $template_path;
    }

    return $template;
}

?>
