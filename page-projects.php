<?php
/**
 * Template Name: Projects List
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<?php the_content(); ?>

	<section class="project-list clearfix">
		<?php //lets get a collection of the project posts
			$args = array(
				'posts_per_page'   => 5,
				'category'         => '',
				'orderby'          => 'menu_order',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'project',
				'post_status'      => 'publish',
				'suppress_filters' => true
			);
			$projects = get_posts($args);
			foreach($projects as $p) : ?>
			<div class="eine-project">
				<?php //what are we looking for?
					$ID            = $p->ID;
					$title         = $p->post_title;
					$cover         = get_field('cover', $ID);
					$cover_URL     = $cover['url'];
					$cover_alt     = (!empty($cover['alt'])) ? $cover['alt'] : 'Luczynski Ana tropvache';
					$categories    = get_the_terms($ID, 'project_category');
					// print_r($categories);
				?>
				<a href="<?php echo get_permalink($ID); ?>">
					<img src="<?php print $cover['url']; ?>" alt="<?php print $cover_alt; ?>" class="" />
				</a>

				<div class="info">
					<h2><?php print $title; ?></h2>
					
					<?php foreach ($categories as $cate) : ?>
					<a href="<?php print esc_url(get_term_link($cate)); ?>"><?php print $cate->name; ?></a>

					<?php endforeach; ?>
				</div>


			</div>
		<?php endforeach; ?>
	</section>

	<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>

<?php endwhile; ?>
<?php get_footer(); ?>