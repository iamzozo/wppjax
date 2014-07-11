=== Plugin Name ===
Contributors: iamzozo
Tags: pushstate, pjax, ajax
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Using pushState and AJAX with WordPress.

== Description ==

With this plugin you have the ability to update your pages or some of it's parts without page refresh. It updates your browser's url instantly. If users visit that links it will loaded without ajax.
Only works with browsers that support the history.pushState API

== Installation ==

1. Extracts zip content to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add `data-pjax="[your target html part]"` to your links (ex.: `<a href="<?php echo get_permalink(1) ?>" data-pjax="#content"> a </a>`)

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

= 0.1 =
First commit