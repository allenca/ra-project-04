<?php
/**
 * The main template file.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
	

<?php $terms = get_terms(array(
    'taxonomy' => 'type',
    'hide_empty' => false,
)); ?>

<div class="widthProducts"><h1 class="homeSectionTitle">shop stuff</h1></div>

<div class="flex widthProducts"> <!-- I be parent -->
<?php   
    if (empty($terms)) {
    echo "<h2>No terms!</h2>";
    } else {
    foreach($terms as $term) { ?> 
        <!-- echo "<pre>";print_r($term); echo "</pre>"; checking what's actually in each object (the array of properties) -->  
    <!-- four children here -->     
    <div class="productType">
        <img class="shopImage" src="<?php echo get_bloginfo("stylesheet_directory")?>/images/product-type-icons/<?php echo $term->name; ?>.svg">
        <p><?php echo $term->description; ?></p>
        <a class="shopButton uppercase" href="<?php echo get_term_link($term->term_id) ?>"><?php echo $term->name." stuff"; ?></a>
    </div> 
    <?php
    }; ?>                    
</div>
<?php } ?>

<div class="widthProducts"><h1 class="homeSectionTitle">inhabitent journal</h1></div>

<?php    
$query = new WP_Query(array(
    'posts_per_page' => 3,
    'post_type' => 'post',
    ));
?> 

<?php while ( $query->have_posts() ){ $query->the_post(); ?>
    <h3 class='test'> woeijreowijroiwejoi <?php the_title(); ?> </h3> 

    <?php if ( 'post' === get_post_type()) {

    };

    if ( has_post_thumbnail()){
        the_post_thumbnail();
    }
}
    ?>

<div class="widthProducts"><h1 class="homeSectionTitle">latest adventures</h1></div>

$query = new WP_Query(array(
        'posts_per_page' => 4,
        'post_type' => 'adventure',
    ));
    if (!empty($query)) {

    }
    while ( $query->have_posts() ) : $query->the_post(); 
        the_title();  
        the_content();
        the_permalink();
    endwhile; // End of the loop. ?>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>