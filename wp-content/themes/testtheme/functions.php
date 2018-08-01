<?php
/**
 * testtheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package testtheme
 */

if ( ! function_exists( 'testtheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function testtheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on testtheme, use a find and replace
		 * to change 'testtheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'testtheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'testtheme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'testtheme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'testtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function testtheme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'testtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'testtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function testtheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'testtheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'testtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'testtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function testtheme_scripts() {
	wp_enqueue_style( 'testtheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'testtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'testtheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'testtheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function wptp_create_post_type() {
  $labels = array(
    'name' => __( 'Статьи' ),
    'singular_name' => __( 'Статьи' ),
    'add_new' => __( 'Новая статья' ),
    'add_new_item' => __( 'Добавить новую статью' ),
    'edit_item' => __( 'Изменить тсатью' ),
    'new_item' => __( 'Новая статья' ),
    'view_item' => __( 'Посмотреть статью' ),
    'search_items' => __( 'ПОиск статей' ),
    'not_found' =>  __( 'Ничего не найдено' ),
    'not_found_in_trash' => __( 'Нет удаленных статей' ),
    );
  $args = array(
    'labels' => $labels,
    'has_archive' => true,
    'public' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'custom-fields',
      'thumbnail'
      ),
    'taxonomies' => array('category'),
    );
  register_post_type( 'articles', $args );
}
add_action( 'init', 'wptp_create_post_type' );

function wptp_register_taxonomy() {
  register_taxonomy( 'articles_category', 'articles',
    array(
      'labels' => array(
        'name'              => 'Категория статей',
        'singular_name'     => 'Категория статей',
        'search_items'      => 'Поиск статей',
        'all_items'         => 'Все статьи категории',
        'edit_item'         => 'Изменить ктаегорию',
        'update_item'       => 'Обновить категорию',
        'add_new_item'      => 'Добавить новую категорию',
        'new_item_name'     => 'Название новой категории',
        'menu_name'         => 'Категории статей',
        ),
      'hierarchical' => true,
      'sort' => true,
      'args' => array( 'orderby' => 'term_order' ),
      'rewrite' => array( 'slug' => 'blog' ),
      'show_admin_column' => true
      )
    );
}
add_action( 'init', 'wptp_register_taxonomy' );