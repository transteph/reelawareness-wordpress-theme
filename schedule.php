<?php /* Template Name: Schedule page */ get_header(); ?>
    <?php get_sidebar(); ?>
        <!-- Header image div -->
        <?php 
        $image = get_field('header_photo');
        if( !empty($image) ): ?>
            <div class="huge-img" style="background-image: url('<?php echo $image['url']; ?>');"> </div>
            <?php endif; ?>
                <!-- start of post content -->
                <div class="post">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php
    while ( have_posts() ) : the_post(); ?> 
        <div class="schedule-page">
            <?php the_content(); ?> 
        </div>

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>   
    </div>             
                
                        <?php get_footer(); ?>