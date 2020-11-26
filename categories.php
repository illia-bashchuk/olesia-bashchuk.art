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

				<div class="entry-content ">
					<ul>
						<?=
							// esc_html(the_content());
							wp_list_categories([
								'show_option_all'    => '',
								'show_option_none'   => __('No categories'),
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 1,
								'hide_empty'         => 0,
								'use_desc_for_title' => 1,
								'child_of'           => 0,
								'feed'               => '',
								'feed_type'          => '',
								'feed_image'         => '',
								'exclude'            => '',
								'exclude_tree'       => '',
								'include'            => '',
								'hierarchical'       => true,
								'title_li'           => '',
								'number'             => NULL,
								'echo'               => 1,
								'depth'              => 0,
								'current_category'   => 0,
								'pad_counts'         => 1,
								'taxonomy'           => 'category',
								'walker'             => 'Walker_Category',
								'hide_title_if_empty' => false,
								'separator'          => '<br />',
							])
						?>
					</ul>

				</div>
			</div>
		</article>
	</div>
</section>
<?php get_footer(); ?>