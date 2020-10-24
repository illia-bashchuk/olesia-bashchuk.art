<?php

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
					<span class="time"><?= the_date('F j, Y'); ?></span>
					<h1 class="entry-title"><?= esc_html(the_title()); ?></h1>
					<span class="cat-links"><?= esc_html(the_category()); ?></span>
				</div>
				<div class="post-thumbnail-wrap">
					<img src="<?= get_the_post_thumbnail_url($post, 'large'); ?>">
				</div>
				<div class="entry-content">
					<?= esc_html(the_content()); ?>
				</div>
			</div>
		</article>


		<div class="zerogrid">
			<div class="comments-are">
				<div class="container">
					<?php $comments = comments_template();
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>