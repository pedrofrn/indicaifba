<?php

if (!isset($content_width)) {
	$content_width = 474;
}

if (function_exists('register_sidebar')) {

	register_sidebar(array(
		'name' => 'Informações do projeto',
		'description' => 'Endereço, contatos e informações do campus',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar(array(
		'name' => 'Formulário de contato',
		'description' => 'Espaço no rodapé para incluir plugin de contato',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
}
add_filter('widget_text', 'do_shortcode');

if (version_compare($GLOBALS['wp_version'], '3.6', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('indicaifba_setup')) :

	function indicaifba_setup()
	{

		load_theme_textdomain('indicaifba');

		add_editor_style(array('css/editor-style.css', indicaifba_font_url(), 'genericons/genericons.css'));

		add_theme_support('editor-styles');

		add_theme_support('wp-block-styles');

		add_theme_support('responsive-embeds');

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __('Green', 'indicaifba'),
					'slug'  => 'green',
					'color' => '#24890d',
				),
				array(
					'name'  => __('Black', 'indicaifba'),
					'slug'  => 'black',
					'color' => '#000',
				),
				array(
					'name'  => __('Dark Gray', 'indicaifba'),
					'slug'  => 'dark-gray',
					'color' => '#2b2b2b',
				),
				array(
					'name'  => __('Medium Gray', 'indicaifba'),
					'slug'  => 'medium-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __('Light Gray', 'indicaifba'),
					'slug'  => 'light-gray',
					'color' => '#f5f5f5',
				),
				array(
					'name'  => __('White', 'indicaifba'),
					'slug'  => 'white',
					'color' => '#fff',
				),
			)
		);

		add_theme_support('automatic-feed-links');

		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(672, 372, true);
		add_image_size('indicaifba-full-width', 1038, 576, true);

		register_nav_menus(
			array(
				'primary'   => __('Top primary menu', 'indicaifba'),
				'secondary' => __('Secondary menu in left sidebar', 'indicaifba'),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
				'navigation-widgets',
			)
		);

		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'audio',
				'quote',
				'link',
				'gallery',
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'indicaifba_custom_background_args',
				array(
					'default-color' => 'f5f5f5',
				)
			)
		);

		add_theme_support(
			'featured-content',
			array(
				'featured_content_filter' => 'indicaifba_get_featured_posts',
				'max_posts'               => 6,
			)
		);

		add_filter('use_default_gallery_style', '__return_false');

		add_theme_support('customize-selective-refresh-widgets');
	}
endif; // indicaifba_setup()
add_action('after_setup_theme', 'indicaifba_setup');

function indicaifba_content_width()
{
	if (is_attachment() && wp_attachment_is_image()) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action('template_redirect', 'indicaifba_content_width');

function indicaifba_get_featured_posts()
{
	return apply_filters('indicaifba_get_featured_posts', array());
}

function indicaifba_has_featured_posts()
{
	return !is_paged() && (bool) indicaifba_get_featured_posts();
}

function indicaifba_font_url()
{
	$font_url = '';

	if ('off' !== _x('on', 'Lato font: on or off', 'indicaifba')) {
		$query_args = array(
			'family'  => urlencode('Lato:300,400,700,900,300italic,400italic,700italic'),
			'subset'  => urlencode('latin,latin-ext'),
			'display' => urlencode('fallback'),
		);
		$font_url   = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
	}

	return $font_url;
}

function indicaifba_scripts()
{
	wp_enqueue_style('indicaifba-lato', indicaifba_font_url(), array(), null);

	wp_enqueue_style('indicaifba-style', get_stylesheet_uri(), array(), '20221101');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	if (is_active_sidebar('sidebar-3')) {
		wp_enqueue_script('jquery-masonry');
	}

}
add_action('wp_enqueue_scripts', 'indicaifba_scripts');

function indicaifba_admin_fonts()
{
	wp_enqueue_style('indicaifba-lato', indicaifba_font_url(), array(), null);
}
add_action('admin_print_scripts-appearance_page_custom-header', 'indicaifba_admin_fonts');

function indicaifba_resource_hints($urls, $relation_type)
{
	if (wp_style_is('indicaifba-lato', 'queue') && 'preconnect' === $relation_type) {
		if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '>=')) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter('wp_resource_hints', 'indicaifba_resource_hints', 10, 2);

if (!function_exists('indicaifba_the_attached_image')) :

	function indicaifba_the_attached_image()
	{
		$post = get_post();

		$attachment_size     = apply_filters('indicaifba_attachment_size', array(810, 810));
		$next_attachment_url = wp_get_attachment_url();

		$attachment_ids = get_posts(
			array(
				'post_parent'    => $post->post_parent,
				'fields'         => 'ids',
				'numberposts'    => -1,
				'post_status'    => 'inherit',
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'order'          => 'ASC',
				'orderby'        => 'menu_order ID',
			)
		);

		if (count($attachment_ids) > 1) {
			foreach ($attachment_ids as $idx => $attachment_id) {
				if ($attachment_id == $post->ID) {
					$next_id = $attachment_ids[($idx + 1) % count($attachment_ids)];
					break;
				}
			}

			if ($next_id) {
				$next_attachment_url = get_attachment_link($next_id);
			} else {
				$next_attachment_url = get_attachment_link(reset($attachment_ids));
			}
		}

		printf(
			'<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url($next_attachment_url),
			wp_get_attachment_image($post->ID, $attachment_size)
		);
	}
endif;

if (!function_exists('indicaifba_list_authors')) :

	function indicaifba_list_authors()
	{
		$args = array(
			'fields'     => 'ID',
			'orderby'    => 'post_count',
			'order'      => 'DESC',
			'capability' => array('edit_posts'),
		);

		if (version_compare($GLOBALS['wp_version'], '5.9-alpha', '<')) {
			$args['who'] = 'authors';
			unset($args['capability']);
		}

		$args = apply_filters('indicaifba_list_authors_query_args', $args);

		$contributor_ids = get_users($args);

		foreach ($contributor_ids as $contributor_id) :
			$post_count = count_user_posts($contributor_id);

			if (!$post_count) {
				continue;
			}
?>

			<div class="contributor">
				<div class="contributor-info">
					<div class="contributor-avatar"><?php echo get_avatar($contributor_id, 132); ?></div>
					<div class="contributor-summary">
						<h2 class="contributor-name"><?php echo get_the_author_meta('display_name', $contributor_id); ?></h2>
						<p class="contributor-bio">
							<?php echo get_the_author_meta('description', $contributor_id); ?>
						</p>
						<a class="button contributor-posts-link" href="<?php echo esc_url(get_author_posts_url($contributor_id)); ?>">
							<?php
							printf(_n('%d Article', '%d Articles', $post_count, 'indicaifba'), $post_count);
							?>
						</a>
					</div>
				</div>
			</div>

<?php
		endforeach;
	}
endif;

function indicaifba_body_classes($classes)
{
	if (is_multi_author()) {
		$classes[] = 'group-blog';
	}

	if (get_header_image()) {
		$classes[] = 'header-image';
	} elseif (!in_array($GLOBALS['pagenow'], array('wp-activate.php', 'wp-signup.php'), true)) {
		$classes[] = 'masthead-fixed';
	}

	if (is_archive() || is_search() || is_home()) {
		$classes[] = 'list-view';
	}

	if ((!is_active_sidebar('sidebar-2'))
		|| is_page_template('page-templates/full-width.php')
		|| is_page_template('page-templates/contributors.php')
		|| is_attachment()
	) {
		$classes[] = 'full-width';
	}

	if (is_active_sidebar('sidebar-3')) {
		$classes[] = 'footer-widgets';
	}

	if (is_singular() && !is_front_page()) {
		$classes[] = 'singular';
	}

	if (is_front_page() && 'slider' === get_theme_mod('featured_content_layout')) {
		$classes[] = 'slider';
	} elseif (is_front_page()) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter('body_class', 'indicaifba_body_classes');

function indicaifba_post_classes($classes)
{
	if (!post_password_required() && !is_attachment() && has_post_thumbnail()) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter('post_class', 'indicaifba_post_classes');

function indicaifba_wp_title($title, $sep)
{
	global $paged, $page;

	if (is_feed()) {
		return $title;
	}

	$title .= get_bloginfo('name', 'display');

	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) {
		$title = "$title $sep $site_description";
	}

	if (($paged >= 2 || $page >= 2) && !is_404()) {
		$title = "$title $sep " . sprintf(__('Page %s', 'indicaifba'), max($paged, $page));
	}

	return $title;
}
add_filter('wp_title', 'indicaifba_wp_title', 10, 2);

function indicaifba_widget_tag_cloud_args($args)
{
	$args['largest']  = 22;
	$args['smallest'] = 8;
	$args['unit']     = 'pt';
	$args['format']   = 'list';

	return $args;
}
add_filter('widget_tag_cloud_args', 'indicaifba_widget_tag_cloud_args');

function attachment_search($query)
{
	if ($query->is_search) {

		$query->set('post_status', array('publish', 'inherit'));
	}

	return $query;
}

add_filter('pre_get_posts', 'attachment_search');

if (!function_exists('is_customize_preview')) :
	function is_customize_preview()
	{
		global $wp_customize;

		return ($wp_customize instanceof WP_Customize_Manager) && $wp_customize->is_preview();
	}
endif;
