<?php get_header(); ?>

    <?php get_sidebar(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
              
       <!-- Film image -->
    <?php 
        $image = get_field('image');
        if( !empty($image) ): ?>
            <div class="huge-img" style="background-image: url('<?php echo $image['url']; ?>');">  
            </div>
     <?php endif; ?>
            
            
            
 <div id="container" class="post-page test">
     
                
  <!-- Video -->
    <?php 
       if( get_field('video') ){
          $embed_code = wp_oembed_get( get_field('video') );
          echo $embed_code;
        } 
    ?>                  
                
                
            <!--  title and post -->
			
            <h2 class=
                <?php 
                   if( get_field('video') ){
                      echo '"film-video-title" ';
                    } 
                ?>        
                
                "single-film-title"><?php the_title(); ?></h2>
			<div class="entry">
                
                
                
                <!-- Film details and screening date -->

         <p class="short-details"><?php the_field('short_details'); ?></p>
            <p class="screen-date">Presented on <?php the_field('screen-date'); ?></p>
				
				<?php the_content(); ?>


			</div>
			
			<?php edit_post_link('Edit this entry','','.'); ?>
			
		</div>


	<?php endwhile; endif; ?>

</div>
<?php get_footer(); ?>