<?php /* Template Name: Past Festival Films page */ get_header(); ?>
<?php get_sidebar(); ?>

<!-- Header image div -->
    <?php 
        $image = get_field('header_photo');
        if( !empty($image) ): ?>

            <div class="huge-img" style="background-image: url('<?php echo $image['url']; ?>');">  
                
            </div>

     <?php endif; ?>
<!-- start of post content -->
    <div class="post">

    <h1 class="entry-title"><?php the_title(); ?></h1> <!-- Page Title -->
    <?php
    while ( have_posts() ) : the_post(); ?> 
            <?php the_content(); ?> 

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>   
    </div>
      

   <?php get_footer(); ?>