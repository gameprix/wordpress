<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Creative Blog
 */
get_header();
?>

<?php do_action('creative_blog_before_body_content'); ?>

<div id="primary" class="content-area col-md-8">
	<main id="main" class="site-main" role="main">

		<?php if (is_active_sidebar('creative-blog-404-sidebar')) { ?>
			<section class="error-404 not-found sidebar-404">
				<header class="page-header custom-page-header">
					<h1 class="page-title"><span><?php esc_html_e('404 Error!', 'creative-blog'); ?></span></h1>
				</header><!-- .page-header -->
			</section>
		<?php } ?>

		<?php if (!dynamic_sidebar('creative-blog-404-sidebar')) : ?>
			<section class="error-404 not-found">
				<header class="page-header custom-page-header">
					<h1 class="page-title"><span><?php esc_html_e('404 Error!', 'creative-blog'); ?></span></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search instead?', 'creative-blog'); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php creative_blog_sidebar_select(); ?>

<?php do_action('creative_blog_after_body_content'); ?>

<?php get_footer(); ?>
