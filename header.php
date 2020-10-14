<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php the_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <?php wp_head(); ?>
</head>
<body>
    <div class="search-full-destop">
        <div class="search-eveland js-box-search">
            <div class="drawer-search-top">
                <h3 class="drawer-search-title">Start typing and hit Enter</h3>
            </div>
            <form action="<?php bloginfo('url'); ?>/" method="GET" class="wg-search-form" role="search">
                <input type="hidden" name="post_type" value="product" />
                <input type="text" name="s" placeholder="Search ..." class="search-input">
                <button type="submit"> <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667
                            S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6
                            c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z
                            M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z"/>
                        </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                </svg></button>
            </form>
            <div class="drawer_back">
                <a href="javascript:void(0)" class="close-search js-drawer-close">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12px" height="12px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.437,12c-0.014-0.017-0.026-0.035-0.042-0.051
                        c-1.78-1.78-3.562-3.561-5.342-5.342c-0.016-0.016-0.028-0.034-0.07-0.064c-0.01,0.02-0.016,0.045-0.031,0.06
                        c-1.783,1.784-3.566,3.567-5.35,5.352C0.587,11.968,0.576,11.984,0.563,12c-0.004,0-0.008,0-0.013,0
                        C0.367,11.816,0.184,11.633,0,11.449c0-0.004,0-0.009,0-0.013c0.017-0.014,0.035-0.026,0.051-0.041
                        c1.781-1.781,3.562-3.562,5.342-5.342c0.017-0.016,0.036-0.027,0.06-0.044c-0.025-0.026-0.04-0.043-0.056-0.058
                        C3.613,4.168,1.83,2.385,0.046,0.601C0.032,0.587,0.016,0.576,0,0.563c0-0.004,0-0.008,0-0.013C0.184,0.367,0.367,0.184,0.551,0
                        c0.004,0,0.008,0,0.013,0C0.578,0.017,0.59,0.035,0.606,0.05c1.78,1.781,3.561,3.562,5.341,5.342
                        c0.016,0.016,0.027,0.035,0.045,0.059c0.025-0.024,0.041-0.039,0.057-0.054c1.783-1.784,3.566-3.567,5.35-5.351
                        C11.413,0.032,11.424,0.016,11.437,0c0.004,0,0.009,0,0.013,0C11.633,0.184,11.816,0.367,12,0.551c0,0.004,0,0.008,0,0.013
                        c-0.017,0.014-0.035,0.027-0.051,0.042c-1.78,1.78-3.561,3.561-5.342,5.341c-0.016,0.016-0.035,0.026-0.054,0.04
                        c-0.004,0.01-0.007,0.021-0.011,0.03c0.021,0.01,0.045,0.017,0.06,0.031c1.784,1.783,3.567,3.566,5.352,5.35
                        c0.014,0.014,0.03,0.025,0.046,0.038c0,0.004,0,0.009,0,0.013c-0.184,0.184-0.367,0.367-0.551,0.551C11.445,12,11.44,12,11.437,12z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="bg_search_box">
        </div>
    </div>
    <div class="background_content_menumobile jsbgmenumb">
    </div>
    <header class="d-none d-lg-block">
        <div class="menu_destop">
            <div class="container container-v1">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2">
                        <a class="logo" href="<?php echo get_home_url(); ?>">
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
                                        'container_class' => 'menu ',
                                        'container'       => false,
                                        'menu_class'      => 'navbar-nav m-auto m-0',
                                        'fallback_cb'     => 'bs4navwalker::fallback',
                                        'walker'          => new bs4navwalker()
                                    )); ?>
                                </div>                            
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="float-right">
                            <a href="javascript:void(0)" class="search js-search-destop">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" height="400" width="400" id="svg2" version="1.1" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xml:space="preserve"><metadata id="metadata8"><rdf><work rdf:about=""><format>image/svg+xml</format><type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></type></work></rdf></metadata><defs id="defs6"></defs><g transform="matrix(1.3333333,0,0,-1.3333333,0,400)" id="g10"><g transform="scale(0.1)" id="g12"><path id="path14" style="fill-opacity:1;fill-rule:nonzero;stroke:none" d="m 1312.7,795.5 c -472.7,0 -857.204,384.3 -857.204,856.7 0,472.7 384.504,857.2 857.204,857.2 472.7,0 857.3,-384.5 857.3,-857.2 0,-472.4 -384.6,-856.7 -857.3,-856.7 z M 2783.9,352.699 2172.7,963.898 c 155.8,194.702 241.5,438.602 241.5,688.302 0,607.3 -494.1,1101.4 -1101.5,1101.4 -607.302,0 -1101.399,-494.1 -1101.399,-1101.4 0,-607.4 494.097,-1101.501 1101.399,-1101.501 249.8,0 493.5,85.5 687.7,241 L 2611.7,181 c 23,-23 53.6,-35.699 86.1,-35.699 32.4,0 63,12.699 86,35.699 23.1,22.801 35.8,53.301 35.8,85.898 0,32.602 -12.7,63 -35.7,85.801"></path></g></g></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>