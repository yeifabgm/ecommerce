<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Theme Actions
 *
 * This is where theme functions are hooked into the appropriate hooks / filters.
 *
 * @since 	1.0.0
 * @author 	WooThemes
 */

// Enqueue Styles
add_action( 'wp_enqueue_scripts', 'woo_child_enqueue', 30 );

// Move things around
add_action( 'woo_main_before', 'woo_move_things_around', 10 );

// Homepage
add_action( 'homepage', 'woo_display_hero', 10 );
add_action( 'homepage', 'woo_display_featured_products', 20 );
add_action( 'homepage', 'woo_display_recent_products', 30 );
add_action( 'homepage', 'woo_display_recent_posts', 40 );

// Add Roboto Condensed to Google Fonts array
add_action( 'init', 'woo_add_googlefonts', 20 );

// Output Custom Fonts
add_action( 'wp_head', 'woo_custom_fonts_output', 10 );

// Setting overrides
add_filter( 'option_woo_options', 'woo_custom_theme_overrides' );

/**
 * Child Theme Enqueues
 *
 * Enqueues Custom Fonts and Stylesheet files.
 *
 * @since  	1.0.0
 * @return 	void
 * @author 	WooThemes
 */
function woo_child_enqueue() {
	// Load Theme Stylesheet
	wp_enqueue_style( 'uno', get_stylesheet_directory_uri() . '/css/uno.css' );
	wp_enqueue_script( 'uno-general', get_stylesheet_directory_uri() . '/js/general.min.js', array( 'jquery' ) );
}

/**
 * Move things around
 *
 * Moves elements from their default location
 *
 * @since  	1.0.0
 * @return 	void
 * @author 	WooThemes
 */
function woo_move_things_around() {
	// Remove Sidebar from Homepage template
	if ( is_page_template( 'template-homepage.php' ) ) {
		remove_action( 'woo_main_after', 'woocommerce_get_sidebar', 10 );
	}
}

/**
 * Custom Fonts
 *
 * Add a font to the $google_fonts variable
 *
 * @since  	1.0.0
 * @return 	void
 * @author 	WooThemes
 */
function woo_add_googlefonts () {
    global $google_fonts;
    $google_fonts[] = array( 'name' => 'Roboto Condensed', 'variant' => ':l,r,b,i,bi');
}

/**
 * Theme Overrides
 *
 * Updates Theme Options dynamically to match the styling of the Child Theme.
 *
 * @since  	1.0.0
 * @return 	array
 * @author 	WooThemes
 */
function woo_custom_theme_overrides( $options ) {
	$roboto = 'Roboto Condensed';
	$open_sans = 'Open Sans';

	if ( !isset( $options['woo_child_theme_overrides'] ) ) {
		$options['woo_child_theme_overrides'] = 'true';
	}

	if ( 'false' != $options['woo_child_theme_overrides'] ) {

		// Enable Custom Styling
		$options['woo_style_disable'] = 'false';

		// Misc
		$options['woo_font_text'] = array( 'size' => '1', 'unit' => 'em', 'face' => $open_sans, 'style' => 'normal', 'color' => '#555555' );
		$options['woo_font_h1'] = array( 'size' => '4', 'unit' => 'em', 'face' => $roboto, 'style' => '300', 'color' => '#222222' );
		$options['woo_font_h2'] = array( 'size' => '2.8', 'unit' => 'em', 'face' => $roboto, 'style' => '300', 'color' => '#222222' );
		$options['woo_font_h3'] = array( 'size' => '2', 'unit' => 'em', 'face' => $roboto, 'style' => '300', 'color' => '#222222' );
		$options['woo_font_h4'] = array( 'size' => '1.4', 'unit' => 'em', 'face' => $roboto, 'style' => '300', 'color' => '#222222' );
		$options['woo_font_h5'] = array( 'size' => '1', 'unit' => 'em', 'face' => $roboto, 'style' => '300', 'color' => '#222222' );
		$options['woo_font_h6'] = array( 'size' => '1', 'unit' => 'em', 'face' => $roboto, 'style' => '300', 'color' => '#222222' );

		// Body
		$options['woo_style_bg'] = '#F9F9F9';

		// Top Navigation
		$options['woo_top_nav_font'] = array( 'size' => '.9', 'unit' => 'em', 'face' => $open_sans, 'style' => 'normal', 'color' => '#999' );

		// Header
		$options['woo_font_logo'] = array( 'size' => '1.4', 'unit' => 'em', 'face' => $roboto, 'style' => '300', 'color' => '#000000' );
		$options['woo_font_desc'] = array( 'size' => '0.9', 'unit' => 'em', 'face' => $open_sans, 'style' => 'normal', 'color' => '#999999' );

		// Primary Navigation
		$options['woo_nav_font'] = array( 'size' => '1', 'unit' => 'em', 'face' => $open_sans, 'style' => 'normal', 'color' => '#ffffff' );
		$options['woo_nav_bg'] = '#6ec095';
		$options['woo_nav_hover_bg'] = '#4C5567';

		// Posts / Pages
		$options['woo_font_post_title'] = array( 'size' => '2', 'unit' => 'em', 'face' => $roboto, 'style' => '300', 'color' => '#222222' );
		$options['woo_font_post_meta'] = array( 'size' => '.9', 'unit' => 'em', 'face' => $open_sans, 'style' => 'normal', 'color' => '#999999' );
		$options['woo_font_post_text'] = array( 'size' => '1', 'unit' => 'em', 'face' => $open_sans, 'style' => 'normal', 'color' => '#555555' );
		$options['woo_font_post_more'] = array( 'size' => '1', 'unit' => 'em', 'face' => $open_sans, 'style' => 'normal', 'color' => '#999' );
		$options['woo_pagenav_font'] = array( 'size' => '1', 'unit' => 'em', 'face' => $open_sans, 'style' => 'normal', 'color' => '#555555' );

		// Post Author
		$options['woo_post_author_border_top'] = array( 'width' => '0', 'style' => 'solid', 'color' => '' );
		$options['woo_post_author_border_bottom'] = array( 'width' => '0', 'style' => 'solid', 'color' => '' );
		$options['woo_post_author_border_lr'] = array( 'width' => '0', 'style' => 'solid', 'color' => '' );
		$options['woo_post_author_border_radius'] = '0px';
		$options['woo_post_author_bg'] = '#ffffff';

		// Archives
		$options['woo_archive_header_font'] = array( 'size' => '1.5', 'unit' => 'em', 'face' => $roboto, 'style' => '300', 'color' => '#222222' );

		// Widgets
		$options['woo_widget_font_title'] = array( 'size' => '1.4', 'unit' => 'em', 'face' => $roboto, 'style' => '300', 'color' => '#222222' );
		$options['woo_widget_font_text'] = array( 'size' => '1', 'unit' => 'em', 'face' => $open_sans, 'style' => 'normal', 'color' => '#555555' );
		$options['woo_widget_title_border'] = 0;

		// Footer
		$options['woo_footer_font'] = array( 'size' => '1', 'unit' => 'em', 'face' => $open_sans, 'style' => 'normal', 'color' => '#dddddd' );
		$options['woo_footer_bg'] = '#4C5567';

		// Full Width
		$options['woo_header_full_width'] = 'true';
		$options['woo_footer_full_width'] = 'true';
		$options['woo_foot_full_width_widget_bg'] = '#4C5567';
		$options['woo_footer_full_width_bg'] = '#4C5567';
		$options['woo_footer_border_top'] = array( 'width' => 0, 'style' => 'solid', 'color' => '#00000' );
	}

	return $options;
}

/**
 * Add Custom Options
 *
 * Add custom options for this Child Theme.
 *
 * @since  	1.0.0
 * @return 	array
 * @author 	WooThemes
 */
function woo_options_add( $options ) {

	$shortname = 'woo';

	$options[] = array( 'name' => __( 'Uno', 'woothemes' ),
						'icon' => 'misc',
					    'type' => 'heading');

	$options[] = array( "name" => __( 'Use Child Theme Custom Overrides', 'woothemes' ),
						"desc" => __( 'Disable this option if you\'d like to setup your own typography and layout settings.', 'woothemes' ),
						"id" => $shortname."_child_theme_overrides",
						"std" => "true",
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Hero - Custom Background', 'woothemes' ),
						"desc" => __( 'Upload a background image for your hero section, or specify an image URL directly.', 'woothemes' ),
						"id" => $shortname."_hero_bg",
						"std" => "",
						"type" => "upload");

	$options[] = array( "name" => __( 'Hero - Title', 'woothemes' ),
						"desc" => __( 'Enter the Hero title.', 'woothemes' ),
						"id" => $shortname."_hero_title",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __( 'Hero - Title Font Style', 'woothemes' ),
						"desc" => __( 'Select typography for the hero title.', 'woothemes' ),
						"id" => $shortname."_hero_title_font",
						"std" => array('size' => '2.4','unit' => 'em', 'face' => 'Oswald', 'style' => 'normal', 'color' => '#fff'),
						"type" => "typography");

	$options[] = array( "name" => __( 'Hero - Message', 'woothemes' ),
						"desc" => __( 'Enter the Hero message.', 'woothemes' ),
						"id" => $shortname."_hero_message",
						"std" => "",
						"type" => "textarea");

	$options[] = array( "name" => __( 'Hero - Message Font Style', 'woothemes' ),
						"desc" => __( 'Select typography for the hero message.', 'woothemes' ),
						"id" => $shortname."_hero_message_font",
						"std" => array('size' => '1.2','unit' => 'em', 'face' => 'Open Sans','style' => 'thin','color' => '#fff'),
						"type" => "typography");

	$options[] = array( "name" => __( 'Hero - Button', 'woothemes' ),
						"desc" => __( 'Enter the Hero button text.', 'woothemes' ),
						"id" => $shortname."_hero_button",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __( 'Hero - Button Link', 'woothemes' ),
						"desc" => __( 'Enter the Hero button text.', 'woothemes' ),
						"id" => $shortname."_hero_button_link",
						"std" => "",
						"type" => "text");

	return $options;
}

function woo_custom_fonts_output() {
	global $woo_options;
	$output = '';

	if ( isset( $woo_options['woo_hero_bg'] ) && '' != $woo_options['woo_hero_bg'] ) {
		$output .= '.hero { background-image: url(' . esc_url( $woo_options['woo_hero_bg'] ) . '); }' . "\n";
	}

	if ( isset( $woo_options['woo_hero_title_font'] ) ) {
		$output .= '.hero .section-title { ' . woo_generate_font_css( $woo_options['woo_hero_title_font'], 1.2 ) . ' }' . "\n";
	}

	if ( isset( $woo_options['woo_hero_message_font'] ) ) {
		$output .= '.hero p { ' . woo_generate_font_css( $woo_options['woo_hero_message_font'], 1.45 ) . ' }' . "\n";
	}

	if ( isset( $output ) && '' != $output ) {
		$output = "\n<!-- Woo Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n<!-- /Woo Custom Styling -->\n\n";
		echo $output;
	}
}

/**
 * Display Hero.
 *
 * Displays products which have been set as “featured” using the WooCommerce featured_products shortcode.
 *
 * @since  	1.0.0
 * @return 	void
 * @uses  	do_shortcode()
 * @link 	http://www.woothemes.com/woocommerce/
 * @author 	WooThemes
 */
function woo_display_hero() {

/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */

 	$settings = array(
					'hero_title'		=> '',
					'hero_message' 		=> '',
					'hero_button' 		=> '',
					'hero_button_link' 	=> ''
				);

	$settings = woo_get_dynamic_values( $settings );

	if ( $settings['hero_title'] != '' || $settings['hero_message'] != '' || $settings['hero_button'] != '' || $settings['hero_button_link'] != '' ) {
	?>
		<section class="hero home-section">
			<div class="col-full">
				<div class="hero-container">
					<?php if ( isset( $settings['hero_title'] ) && '' != $settings['hero_title'] ): ?>
						<h1 class="section-title"><span><?php echo stripslashes( esc_attr( $settings['hero_title'] ) ); ?></span></h1>
					<?php endif; ?>

					<?php if ( isset( $settings['hero_message'] ) && '' != $settings['hero_message'] ): ?>
						<?php echo wpautop( stripslashes( esc_attr( $settings['hero_message'] ) ) ); ?>
					<?php endif; ?>

					<?php if ( isset( $settings['hero_button'] ) && '' != $settings['hero_button'] ): ?>
						<div class="cta">
							<a class="button" href="<?php echo esc_url( $settings['hero_button_link'] ); ?>"><?php echo stripslashes( esc_attr( $settings['hero_button'] ) ); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php
	}
}

/**
 * Display Featured Products.
 *
 * Displays products which have been set as “featured” using the WooCommerce featured_products shortcode.
 *
 * @since  	1.0.0
 * @return 	void
 * @uses  	do_shortcode()
 * @link 	http://www.woothemes.com/woocommerce/
 * @author 	WooThemes
 */
function woo_display_featured_products() {
?>
	<?php if ( is_woocommerce_activated() ): ?>
	<section class="featured-products home-section">
		<div class="col-full">
			<h1 class="section-title"><?php _e( 'Featured Products', 'woothemes' ); ?></h1>
			<?php
				$featured_products_limit 		= apply_filters( 'woo_template_featured_products_limit', $limit = 3 );
				$featured_products_columns 		= apply_filters( 'woo_template_featured_products_columns', $columns = 3 );
				echo do_shortcode( '[featured_products per_page="' . $featured_products_limit . '" columns="' . $featured_products_columns . '"]' );
			?>
		</div>
	</section>
	<?php endif; ?>
<?php
}

/**
 * Display Recent Products.
 *
 * Displays recent products using the WooCommerce recent_products shortcode.
 *
 * @since  	1.0.0
 * @return 	void
 * @uses  	do_shortcode()
 * @link 	http://www.woothemes.com/woocommerce/
 * @author 	WooThemes
 */
function woo_display_recent_products() {
?>
	<?php if ( is_woocommerce_activated() ): ?>
	<section class="recent-products home-section">
		<div class="col-full">
			<h1 class="section-title"><?php _e( 'Recent Products', 'woothemes' ); ?></h1>
			<?php
				$recent_products_limit 		= apply_filters( 'woo_template_recent_products_limit', $limit = 6 );
				$recent_products_columns 	= apply_filters( 'woo_template_recent_products_columns', $columns = 3 );
				echo do_shortcode( '[recent_products per_page="' . $recent_products_limit . '" columns="' . $recent_products_columns . '"]' );
			?>
		</div>
	</section>
	<?php endif; ?>
<?php
}

/**
 * Display Recent Posts.
 *
 * Displays recent blog posts.
 *
 * @since  	1.0.0
 * @return 	void
 * @uses  	WP_Query()
 * @link 	http://www.woothemes.com/woocommerce/
 * @author 	WooThemes
 */
function woo_display_recent_posts() {

/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */

 	$settings = array(
					'thumb_w' => 700,
					'thumb_h' => 700,
					'thumb_align' => 'alignleft'
					);

	$settings = woo_get_dynamic_values( $settings );

?>

	<section class="home-section">

		<div class="col-full">

			<section class="recent-posts col-left">

				<h1 class="section-title"><?php _e( 'Recent Posts', 'woothemes' ); ?></h1>
				<?php
					$args = array(
								'posts_per_page' => 2,
								'ignore_sticky_posts' => 1
							);

					$recent_posts = new WP_Query( $args );
				?>

				<?php if ( $recent_posts->have_posts() ) : ?>
					<?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
						<article <?php post_class(); ?>>

							<header class="post-header">
								<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
								<p class="meta">
									<span class="post-date"><?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . __( ' ago', 'woothemes' ); ?></span>
									<span class="categories"><?php the_category( ', ' ); ?></span>
								</p>
							</header>

							<p><?php echo woo_text_trim( get_the_excerpt(), 20 ); ?></p>

							<footer class="post-more">
								<span class="read-more"><a class="button" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php _e( 'Read More', 'woothemes' ); ?></a></span>
							</footer>

						</article><!-- /.post -->
					<?php endwhile; ?>
				<?php endif; ?>

			</section>

			<section class="recent-comments col-right">

				<h1 class="section-title"><?php _e( 'Recent Comments', 'woothemes' ); ?></h1>

				<ul>
					<?php
							$comments = get_comments( array( 'number' => 3, 'status' => 'approve', 'post_status' => 'publish' ) );
						if ( $comments ) {
							foreach ( (array) $comments as $comment) {
							$post = get_post( $comment->comment_post_ID );
							?>
								<li class="recentcomments">
									<?php echo get_avatar( $comment, 55 ); ?>
									<a href="<?php echo get_comment_link( $comment->comment_ID ); ?>" title="<?php echo wp_filter_nohtml_kses( $comment->comment_author ); ?> <?php echo esc_attr_x( 'on', 'comment topic', 'woothemes' ); ?> <?php echo esc_attr( $post->post_title ); ?>"><h3><?php echo wp_filter_nohtml_kses($comment->comment_author); ?></h3> <?php echo stripslashes( substr( wp_filter_nohtml_kses( $comment->comment_content ), 0, 50 ) ); ?>...</a>
									<div class="fix"></div>
								</li>
							<?php
							}
				 		}
 					?>
				</ul>

			</section>

		</div>

	</section>

<?php
}
