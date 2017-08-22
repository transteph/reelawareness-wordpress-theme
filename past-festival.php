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
      <div class="post" id="post-<?php the_ID(); ?>">
          
<!--   2016 Festival Films  -->
<div class="infinite-scroll">
    <ul class="posts page-post past-fest-post">
        <h2 class="past-fest-year"> <?php echo get_cat_name(10);?> Festival</h2>
        <?php

            // The Query for 2016 films
                $args0 = array( 'category__in' => 10  );
                
        $query0 = new WP_Query( $args0 ); ?>
            <?php
            if ( $query0->have_posts() ) : ?>
                <?php while ( $query0->have_posts() ) : $query0->the_post(); ?>
                    <li <?php post_class(); ?>>
                        <a class="movieName" href='<?php the_permalink() ?>'>
                        <span class="movie-title">  <?php the_title(); ?>
                            </span> 
                        <!--  Image -->  
                            <?php 
                            $image = get_field('image');
                            if( !empty($image) ):?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>
                                        </a>
                    <!-- Film details and screening date -->
                        <p class="short-details"><?php the_field('short_details'); ?></p>
                
                    </li>
                    <?php endwhile; ?>
                        <!-- end of the loop -->
                        <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
    </ul>         
<!--   2015 Festival Films  -->  
      <ul class="posts page-post past-fest-post">     
         <h2 class="past-fest-year"> <?php echo get_cat_name(11);?> Festival</h2>
       <?php

        // The Query for 2015 films
             $args1 = array( 'category__in' => 11  );
             
        $query1 = new WP_Query( $args1 ); ?>
        <?php
        if ( $query1->have_posts() ) : ?>
            <?php while ( $query1->have_posts() ) : $query1->the_post(); ?>
                <li <?php post_class(); ?>>
                    <a class="movieName" href='<?php the_permalink() ?>'>
                      <span class="movie-title">  <?php the_title(); ?>
                        </span> 
                        
                      <!--  Image -->  
                        <?php 
                        $image = get_field('image');
                        if( !empty($image) ):?>
                             <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php endif; ?>
                                       </a>
                  <!-- Film details and screening date -->
                    <p class="short-details"><?php the_field('short_details'); ?></p>
			
                </li>
                <?php endwhile; ?>
                    <!-- end of the loop -->
                    <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
    </ul>           
          
 <!--   2014 Festival Films  -->
    <ul class="posts page-post past-fest-post films2014">
        <h2 class="past-fest-year"> <?php echo get_cat_name(12);?> Festival</h2>
        <?php

            // The Query for 2014 films
                $args0 = array( 'category__in' => 12  );
                
            $query0 = new WP_Query( $args0 ); ?>
            <?php
            if ( $query0->have_posts() ) : ?>
                <?php while ( $query0->have_posts() ) : $query0->the_post(); ?>
                    <li <?php post_class(); ?>>
                        <a class="movieName" href='<?php the_permalink() ?>'>
                        <span class="movie-title">  <?php the_title(); ?>
                            </span> 
                            
                        <!--  Image -->  
                            <?php 
                            $image = get_field('image');
                            if( !empty($image) ):?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>
                                        </a>
                    <!-- Film details and screening date -->
                        <p class="short-details"><?php the_field('short_details'); ?></p>
                
                    </li>
                    <?php endwhile; ?>
                        <!-- end of the loop -->
                        <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
    </ul>         
</div>      
        
</div>
   <?php get_footer(); ?>