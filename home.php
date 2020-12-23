<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage zPainting
 * @since zPainting 1.0
 */

get_header();
?>

<!--////////////////////////////////////Container-->
<section id="container">
    <div class="wrap-container">
        <div id="main-content">
            <div class="wrap-content">
                <div class="zerogrid">
                    <div class="row ">
                        <div class="col">
                            <div id="gallery" style="display:none;">
                                <?php
                                global $myposts;
                                foreach ($myposts as $post) :
                                    setup_postdata($post);
                                ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img alt="<?= the_title() ?>" src="<?= get_the_post_thumbnail_url($post, 'medium'); ?>" data-image="<?= get_the_post_thumbnail_url($post, 'large'); ?>" data-description="<?= the_title() ?>">
                                </a>
                                    
                                <?php endforeach;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#gallery").unitegallery(
            {
                tiles_type:"nested",
                tiles_space_between_cols: 10,
                tile_as_link: true,
                tile_link_newpage: false,
                tile_enable_textpanel: true,
                tile_enable_border: true,

			}
        );

    });
</script>
<?php
get_footer();
