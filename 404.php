<?php
get_header(); 
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div id="primary" class="content-area text-center">
                <div id="content" class="site-content" role="main">

                    <header class="page-header">
                        <h1 class="page-title"><?php _e( 'Not Found', 'Fruit' ); ?></h1>
                    </header>

                    <div class="page-wrapper">
                        <div class="page-content">
                            <h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'Fruit' ); ?></h2>
                            <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'Fruit' ); ?></p>

                            <?php get_search_form(); ?>
                        </div><!-- .page-content -->
                    </div><!-- .page-wrapper -->

                </div><!-- #content -->
            </div><!-- #primary -->
        </div>  
    </div> 
</div>

<?php get_footer(); ?>