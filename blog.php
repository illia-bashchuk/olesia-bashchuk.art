<?php
/*
Template Name: Blog
*/
get_header(); ?>

<!--////////////////////////////////////Container-->
<section id="container">
    <div class="wrap-container">
        <div class="zerogrid">
            <?php
            foreach ($myposts as $post) :
                setup_postdata($post);
            ?>
            <article>
                <div class="row wrap-post">
                    <!--Start Box-->
                    <div class="entry-header">
                        <span class="time"><?= the_date('d.m.Y'); ?></span>
                        <h2 class="entry-title"><a href="<?= the_permalink(); ?>"><?= esc_html(the_title()); ?></a></h2>
                        <span class="cat-links"><?= esc_html(the_category(', ')); ?></span>
                    </div>
                    <div class="post-thumbnail-wrap">
                        <img src="<?=get_the_post_thumbnail_url( $post, 'large' );?>">
                    </div>
                    <div class="entry-content">
                        <?= esc_html(the_excerpt()); ?>
                        <a href="<?php the_permalink(); ?>"><?php _e('Read More','zpainting')?></a>
                    </div>
                </div>
            </article>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>