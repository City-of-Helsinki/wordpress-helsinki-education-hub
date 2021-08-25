<?php

/**
 * Load files
 *
 * Child Theme file configuration
 *
 */
require_once get_stylesheet_directory() . '/setup/loader.php';
add_action('after_setup_theme', 'educationhub_load_files', 0);
add_action('after_setup_theme', 'educationhub_setup_theme', 5);
/**
 * Setup templates
 *
 * Add child theme actions based on filters
 *
 */
add_action('template_redirect', 'educationhub_setup_templates', 11);