<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php the_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/iconlogo.png">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <?php wp_head(); ?>
</head>
<body>
    <header class="d-none d-lg-block">
        <div class="menu_destop">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2">
                        <a class="logo" href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="img-fluid" alt="logo">
                        </a> 
                    </div>
                    <div class="col-lg-8 col-md-10">
                        <div class="text-center">
                            <nav class="navbar navbar-expand-lg navbar-light m-auto">
                                <div class="collapse navbar-collapse">
                                        <?php wp_nav_menu(array(
                                            
                                            'menu'              => 'main-menu',
                                            'theme_location'    => 'main-menu',
                                            'container_class' => 'menu m-auto',
                                            'depth'          => 3,
                                            'container'       => false,
                                            'menu_class'      => 'navbar-nav',
                                            'container'         => 'div',
                                        )); ?>

 

                                </div>                            
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        
                    </div>
                </div>
            </div>
        </div>
    </header>