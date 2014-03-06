<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<div class="linking-pages">
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
		</div>

	</article>

	<?php if (is_user_logged_in()) : ?>
	<div class="boilerplate-control">
		<span> hey ana or equivalent human &gt; </span><?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
	</div>
	<?php endif; ?>

	<nav id="nav-below" class="navigation adjacent-posts">
		<?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'boilerplate' ) . '</span> %title' ); ?>
		<?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'boilerplate' ) . '</span>' ); ?>
	</nav>
	
	<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
