<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <!-- <title><?= wp_get_document_title(); ?></title>
    <meta name="description" content="123">
    <meta name="author" content=""> -->

    <!-- Mobile Specific Metas
	================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- BootstrapCDN
	================================================== -->
    
    <?php wp_head(); ?>
</head>

<body>
    <div class="wrap-body">

        <header class="main-header">
            <div class="zerogrid">
                <!--Top-->
                <div id="top">
                    <div class="row">
                        <div class="col t-center">

                            <a class="wrap-col" href="?lang=en">
                                <img src="<?= plugins_url('qtranslate-xt/flags/25x15/gb.png'); ?>" width="25" height="15" alt="English">
                            </a>
                            <a class="wrap-col" href="?lang=ua">
                                <img src="<?= plugins_url('qtranslate-xt/flags/25x15/ua.png'); ?>" width="25" height="15" alt="Ukraine">
                            </a>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col t-center">
                            <ul class="list-inline top-link link">
                                <li><a href="https://www.facebook.com/olesia_bashchuk-100259038188213" target="_blank">Facebook</a></li>
                                <li><a href="https://www.instagram.com/olesia_bashchuk_art/" target="_blank">Instagram</a></li>
                                <li><a href="https://www.pinterest.com/obashchuk/my-etsy-shop/" target="_blank">Pinterest</a></li>
                                <li><a href="https://www.etsy.com/shop/OlesiaBashchukArt" target="_blank">Etsy</a></li>
                            </ul>
                        </div>
                        <!-- <?php get_search_form(); ?> -->
                    </div>
                </div>
                <div class="t-center">
                    <a class="site-branding" href="<?php echo home_url('/') ?>">

                        <?= _e('Olesia Bashchuk Art Blog', 'zpainting') ?>

                    </a><!-- .site-branding -->



                </div>
            </div>



        </header>
        <!-- Menu-main -->
        <?php wp_nav_menu([
            'theme_location' => 'main_menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'align-center',
            'container_id'    => 'cssmenu',
            'menu_class'      => false,
            'menu_id'         => false,
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => new True_Walker_Nav_Menu(),
        ]); ?>