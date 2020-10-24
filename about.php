<?php
/*
Template Name: About
*/
get_header();
setup_postdata($post); ?>

<!--////////////////////////////////////Container-->
<section id="container">
    <div class="wrap-container">
        <!-----------------Content-Box-------------------->
        <article class="single-post zerogrid">
            <div class="wrap-post">
                <!--Start Box-->
                <div class="entry-header">
                    <h1 class="entry-title"><?= the_title() ?></h1>
                    <span class="cat-links"><?= the_category(); ?></span>
                </div>
                
                <div class="entry-content">
                    <?= the_content() ?>
                </div>
            </div>
        </article>
    </div>
</section>
<?php get_footer(); ?>