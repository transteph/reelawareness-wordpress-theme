<?php /* Template Name: Page with Main Image */ get_header(); ?>
    <?php get_sidebar(); ?>

<!-- Header image div -->
    <?php 
        $image = get_field('header_photo');
        if( !empty($image) ): ?>

            <div class="huge-img" style="background-image: url('<?php echo $image['url']; ?>');">  
                
            </div>

     <?php endif; ?>
<!-- start of post content -->

<div id="container">
   <div id="content" class="pageContent">

    <h1 class="entry-title"><?php the_title(); ?></h1> <!-- Page Title -->
    
    <?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> 
       
       <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
            <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->


 	<!-- Stop The Loop (but note the "else:" - see next line). -->

 <?php endwhile; ?>


    </div>
</div>
    <?php get_footer(); ?>