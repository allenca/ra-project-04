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
    <!-- four children here -->     
    <div class="productType">
        <img class="shopImage" src="<?php echo get_bloginfo("stylesheet_directory")?>/images/product-type-icons/<?php echo $term->name; ?>.svg">
        <p><?php echo $term->description; ?></p>
        <input type="submit" value="<?php echo $term->name." stuff"; ?>" class="shopButton uppercase"></input>  
        <!-- <?php print_r ($term) ?>   --> 
    </div> 
    <?php
    }; ?>                    
</div>
<?php } ?>



        </main><!-- #main -->
    </div><!-- #primary -->


<?php get_footer(); ?>