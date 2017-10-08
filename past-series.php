<?php /* Template Name: Past Series Films page */ get_header(); ?>
<?php get_sidebar(); ?>
<!-- Header image div -->
<?php 
        $image = get_field('header_photo');
        if( !empty($image) ): ?>

<div class="huge-img" style="background-image: url('<?php echo $image['url']; ?>');">

</div>

<?php endif; ?>
<!-- start of post content -->
    <div id="content" class="pageContent">

        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>
        <!-- Page Title -->
        <?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?>
            <div class="entry-content-page">
                <?php the_content(); ?>
                <!-- Page Content -->
            </div>
            <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>
    </div>

    <div class="post" id="post-<?php the_ID(); ?>">

        <!------   2017 Past Series Films  ------>
        <ul class="posts page-post past-series-post">
            <h2 class="past-series-year"></h2>
            <?php

        // The Query for 2017 series films
             $args0 = array( 'category__in' => 15  );
             
       $query0 = new WP_Query( $args0 ); ?>
                <?php
        if ( $query0->have_posts() ) : ?>
                    <?php while ( $query0->have_posts() ) : $query0->the_post(); ?>
                    <li <?php post_class(); ?>>
                        <a class="movieName" href='<?php the_permalink() ?>'> <span class="movie-title-past">
                            <?php the_title(); ?></span>

                            
                            <!--  Image -->
                            
                            
                            <?php 
                        $image = get_field('image');
                        if( !empty($image) ):?>
                            
                            <div class="huge-film-img" style="background-image: url('<?php echo $image['url']; ?>');">  
                
            </div>
                            </a>
                            
                            <?php endif; ?>

                            <!-- Film details and screening date -->
                            <p class="short-details">
                                <?php the_field('short_details'); ?>
                            </p>

                    </li>
                    <?php endwhile; ?>
                    <!-- end of the loop -->
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
        </ul>


    </div>
<?php get_footer(); ?>
