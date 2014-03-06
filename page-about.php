<?php
/**
 * Template Name: About
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article class="about">
		<?php the_content(); ?>
	</article>

	<?php if (is_user_logged_in()) : ?>
	<div class="boilerplate-control">
		<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
	</div>
	<?php endif; ?>

<?php endwhile; ?>
<?php get_footer(); ?>