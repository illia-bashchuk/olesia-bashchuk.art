<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage zPainting
 * @since Twenty Twelve 1.0
 */

get_header();
  ?>

<!--////////////////////////////////////Container-->
<section id="container">
    <div class="wrap-container">
        <div class="zerogrid">
            
            <?php
            $my_category = get_query_var('category_name');
            if (have_posts()):
                foreach (my_category_posts($my_category) as $post) :
                    setup_postdata($post);
                ?>
                <article>
                    <div class="row wrap-post">
                        
                        <div class="entry-header">
                            <span class="time"><?= the_date('F j, Y'); ?></span>
                            <h2 class="entry-title"><a href="<?= the_permalink(); ?>"><?= esc_html(the_title()) ?></a></h2>
                            <span class="cat-links"><?= esc_html(the_category()); ?></span>
                        </div>
                        <div class="post-thumbnail-wrap">
                            <img src="<?=get_the_post_thumbnail_url( $post, 'large' );?>">
                        </div>
                        <div class="entry-content">
                            <?= esc_html(the_content()); ?>
                            <a href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
                </article>
                <?php endforeach;
             else: ?>
                <article>
                    <div class="row wrap-post">
                        <div class="entry-content">
                        <?php echo __('No entries found for this category.'); ?>
                        </div>
                    </div>
                </article>
             <?php endif; 
            
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
