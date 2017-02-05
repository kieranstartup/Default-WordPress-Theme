<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package project
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<?php endwhile; else : ?>
<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
