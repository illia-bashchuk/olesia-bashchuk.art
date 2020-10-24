<?php
/*
Template Name: Categories
*/
get_header();
setup_postdata($post);  ?>

<section id="container">
	<div class="wrap-container">
		<!-----------------Content-Box-------------------->
		<article class="single-post zerogrid">
			<div class="wrap-post">
				<!--Start Box-->
				<div class="entry-header">
					
					<h1 class="entry-title"><?= esc_html(the_title()) ?></h1>
					
				</div>
				
				<div class="entry-content text-center">
					<?= 
					esc_html(the_content());
					// wp_list_categories(['title_li' => false]) ?>
					

				</div>
			</div>
		</article>
	</div>
</section>
<?php get_footer(); ?>