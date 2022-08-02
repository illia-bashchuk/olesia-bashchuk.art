<?php
/*
Template Name: Contacts
*/

//Load the css and js files on pages which contain contact forms 7
if (function_exists('wpcf7_enqueue_scripts')) {
	wpcf7_enqueue_scripts();
}

if (function_exists('wpcf7_enqueue_styles')) {
	wpcf7_enqueue_styles();
}
get_header();

?>

<!--////////////////////////////////////Container-->

<section id="container">
	<div class="wrap-container">
		<!-----------------Content-Box-------------------->
		<section class="single-post zerogrid">
			<div class="wrap-post">
				<!--Start Box-->

				<div class="contact-form">
					<h3 class="t-center"><?= _e('Write to me', 'zpainting') ?></h3>

					<!---->
					<div id="contact_form">
						<?php
						// Change the translation according to the locale for contact form
						if (get_locale() == 'uk') {
							echo do_shortcode('[contact-form-7 id="261" title="contact-form_uk"]'); // needs change on production server
						} else {
							echo do_shortcode('[contact-form-7 id="5" title="contact-form"]'); // needs change on production server
						}
						?>
					</div>
				</div>
			</div>
		</section>

	</div>
</section>

<?php get_footer(); ?>