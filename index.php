<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package storefront
 */

get_header();
include 'styles.php';
$i = 0;
$posts_array = array();
?>

<div id="primary" class="content-area sfp-awesome-layout-1">
	<main id="main" class="site-main section group" role="main">
		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				$i++;
				ob_start();
			?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting">
			<header class="entry-header">
				<?php storefront_post_thumbnail( 'thumbnail' ); ?>
					<?php
					the_title( sprintf( '<h1 class="entry-title" itemprop="name headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
					?>
			</header><!-- .entry-header -->
			<div class="entry-content" itemprop="articleBody">
				<?php Storefront_Pro::instance()->public->blog_content( get_the_ID() ); ?>
			</div><!-- .entry-content -->
			<?php
			storefront_posted_on();
			storefront_post_meta();
			?>

		</article><!-- #post-## -->

			<?php
				$posts_array[ $i % 3 ][] = ob_get_clean();
			endwhile;
		foreach ( $posts_array as $posts ) {
			echo '<div class="col col-1-3">';
			foreach ( $posts as $post ) {
				echo $post;
			}
			echo '</div>';
		}
		else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
