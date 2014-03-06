<?php
/**
 * Template Name: Home
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<article class="tropvache">
			<div class="shameless">
				<?php the_content(); ?>
			</div>
			
			<div class="teaser clearfix">
				<?php //create a random project for the home page
					$args = array(
						'posts_per_page'   => 1,
						'orderby'          => 'rand',
						'order'            => 'DESC',
						'post_type'        => 'project',
						'post_status'      => 'publish',
						'suppress_filters' => true
					);
					$project    = get_posts($args);
					$ID         = $project[0]->ID;
					$title      = $project[0]->post_title;
					$cover      = get_field('cover', $ID);
					$cover_URL  = $cover['url'];
					$cover_alt  = (!empty($cover['alt'])) ? $cover['alt'] : 'Luczynski Ana tropvache';
					$categories = get_the_terms($ID, 'project_category');
				?>
				<div class="eine-project">
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

				<div class="home-glob">


				<?php //create a random project for the home page
					$argus = array(
						'posts_per_page'   => 3,
						'orderby'          => 'rand',
						'order'            => 'DESC',
						'post_type'        => 'post',
						'post_status'      => 'publish',
						'suppress_filters' => true
					);
					$posts = get_posts($argus);
					foreach ($posts as $p) : ?>
			
					<?php 
						// print_r($p);
						$ID        = $p->ID;
						$title     = $p->post_title;
						$post_date = $p->post_date;
						$content   = strip_tags(strip_shortcodes($p->post_content));
						$words     = explode(' ', $content, 36);
						if (count($words) > 35) {
							array_pop($words);
							array_push($words, '…');
							$content = implode(' ', $words);
						}
						$content = '<p>' . $content . '</p>';

					?>
					<article>
						<h2 class="entry-title">
							<a href="<?php echo get_permalink($ID); ?>"><?php print $title; ?></a>
						</h2>
						<div class="list-content">
							<?php $text = 'test tetsetset';
								print $content; ?>
						</div>
					</article>
				<?php endforeach; ?>
					
				</div>

		

	</article>

	<?php if (is_user_logged_in()) : ?>
	<div class="boilerplate-control">
		<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
	</div>
	<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>