<h1>this is SINGLE.php</h1>
<?php
/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */

get_header(); 
//include "header.php";?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		
		<?php get_field(price) ?>




		<?php the_title( sprintf( '<p class="productTitle"><a href="%s"rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ) ?>
                <p><?php setlocale(LC_MONETARY, 'en_US');
                echo money_format('%.2n', get_field( 'price') ) ;  ?></p>	

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
