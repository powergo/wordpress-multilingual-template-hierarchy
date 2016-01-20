=== Multilingual Template Hierarchy ===
Contributors: bartdag-resulto
Tags: multilingual
Requires at least: 4
Tested up to: 4.4.1
Stable tag: trunk
License: GPL v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.en.html

Enables theme developers using WPML to create type-slug.php templates in the default language. For example, if you create page-my-english-slug.php template, it will be used for the same page in other languages.

== Description ==
Enables theme developers using WPML to create type-slug.php templates in the default language. 

Currently, with WPML, if you want to create a custom template for a page/category/post, you need to create such template in each language (e.g., page-english-slug.php, page-french-slug.php). With this plugin, you can create the template only for the default language (e.g., page-english-slug.php) and it will be used for all other languages.

Version 1.0.0 supports translated page, category and tag slugs.

== Installation ==
1. Upload the entire `multilingual-template-hierarchy` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the \'Plugins\' menu in WordPress.


== Changelog ==
= 1.0.1 =

* release date: January 20th 2016
* global $post is no longer overriden (does not play well with other plugins).

= 1.0.0 =

* release date: October 1st 2015
* Initial release
