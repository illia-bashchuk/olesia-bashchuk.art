<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title><?= wp_get_document_title(); ?></title>
    <meta name="description" content="">
    <meta name="author" content="https://www.zerotheme.com">

    <!-- Mobile Specific Metas
	================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- BootstrapCDN
	================================================== -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://use.fontawesome.com/37749dd860.js"></script>

    <?php wp_head(); ?>
</head>

<body>
    <div class="wrap-body">

        <header class="main-header">
            <div class="zerogrid">
                <!--Top-->
                <div id="top">
                    <div class="row">
                        <div class="col text-center">
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
                    <a class="site-branding" href="<?php echo home_url( '/' ) ?>">
                        <!-- <img src="<?=D;?>images/logo_old.png" width="300px" /> -->
                        Olesia  Bashchuk Art  Shop

                    </a><!-- .site-branding -->

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
                        'walker'          => '',
                    ]); ?>
                </div>
            </div>
        </header>