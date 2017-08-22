<?php /* Template Name: Festival page */ get_header(); ?>
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
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
            <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>
    </div>  
    
    
    
    
    <!-- cycle posts for current festival films
      <div class="post pageContent" id="post-<?php the_ID(); ?>">
          
         <ul class="posts page-post">
         <?php 
            global $post; // required
             $args = array(
                 'category' => 3
             ); 
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post);
             ?>
             
            <li <?php post_class(); ?>>
                <a class="movieName" href='<?php the_permalink() ?>'>
                 <?php the_title(); ?>
                </a>
  	         <?php the_content(); ?>
             </li>
             <?php endforeach; ?>
          </ul>
        </div> 
    -->
    
</div>
   <?php get_footer(); ?>