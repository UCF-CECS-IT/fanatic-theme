<?php
namespace FANATIC\Theme;

define( 'FANATIC_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );

// Activation checks
include_once FANATIC_THEME_DIR . 'includes/activate.php';

// Theme foundation
include_once FANATIC_THEME_DIR . 'includes/config.php';
include_once FANATIC_THEME_DIR . 'includes/meta.php';

// CPTs and Taxonomies
include_once FANATIC_THEME_DIR . 'includes/course-post-type.php';
include_once FANATIC_THEME_DIR . 'includes/chapter-post-type.php';
include_once FANATIC_THEME_DIR . 'includes/unit-post-type.php';
include_once FANATIC_THEME_DIR . 'includes/difficulty-taxonomy.php';

// Components and helper functions
include_once FANATIC_THEME_DIR . 'includes/sidebar.php';
include_once FANATIC_THEME_DIR . 'includes/course.php';
include_once FANATIC_THEME_DIR . 'includes/unit.php';

