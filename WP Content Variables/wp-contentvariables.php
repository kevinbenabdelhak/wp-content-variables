<?php
/*
 * Plugin Name: WP Content Variables
 * Plugin URI: https://kevin-benabdelhak.fr/plugins/wp-content-variables/
 * Description: WP Content Variables est un plugin permettant d'insérer des variables dynamiques dans vos titres et contenus via des shortcodes.
 * Version: 1.0
 * Author: Kevin Benabdelhak
 * Author URI: https://kevin-benabdelhak.fr/
 * Text Domain: wpcontentvariables
 * Contributors: kevinbenabdelhak
 */

if (!defined('ABSPATH')) exit;

function wpcontentvariables_enqueue_admin_scripts($hook) {
    if ($hook === 'tools_page_wpcontentvariables') {
        wp_enqueue_script('wpcontentvariables-admin-js', plugin_dir_url(__FILE__) . 'assets/js/wpcontentvariables-admin.js', array(), '1.0', true);
    }
}
add_action('admin_enqueue_scripts', 'wpcontentvariables_enqueue_admin_scripts');

require_once plugin_dir_path(__FILE__) . 'includes/functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/options-page.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';

add_action('admin_menu', 'wpcontentvariables_add_admin_menu');
add_action('admin_init', 'wpcontentvariables_register_settings');