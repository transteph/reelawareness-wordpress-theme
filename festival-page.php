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
    while ( have_posts() ) : the_post(); ?> 
        <div class="entry-content-page center">
            <?php the_content(); ?>
        </div>

    <?php
    endwhile; 
    wp_reset_query(); 
    ?>
    </div>  
    
      <div class="entry-content-page center" id="post-<?php the_ID(); ?>">
          
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
		  
		   <!-- if there are no future screenings -->
		  <?php if( empty($custom_posts) ): ?>
			  <h3 id="no-future-films">Stay tuned for details on this year's Reel Awareness Film Festival.</h3>
		  	<br/><br/>
		  <a href="http://aito.ca/reelawareness/festival/festival-information/">
			  <button class="button">
				Festival Information
			  </button>
		  </a>
		  <a href="http://aito.ca/reelawareness/festival/past-festival-films/">
			  <button class="button">
				Past Festival Films
			  </button>
		  </a>
		  <?php endif?>
		  
        </div> 
    
</div>
   <?php get_footer(); ?>