<?php /* Template Name: Series page */ get_header(); ?>
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

    <h1 class="entry-title"><?php the_title(); ?>: Upcomming Screenings</h1> <!-- Page Title -->
    <?php
    while ( have_posts() ) : the_post(); ?> 
        <div class="entry-content-page center">
            <?php the_content(); ?> 
        </div>

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>   
    </div>
      <div class="post" id="post-<?php the_ID(); ?>">
          
         <ul class="posts page-post">
         <?php 
            global $post; // required
             $args = array('category' => 4); 
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post);
             ?>
             
             <li <?php post_class(); ?>>
                 
         <a class="movieName <?php echo 'film-video-title "';  ?>        
            href="<?php the_permalink() ?>">
                 <?php the_title(); ?>
                </a>        
   <!-- Film image. Hide if there is video url -->
                 
    <?php 
       if( get_field('video') ){
          $embed_code = wp_oembed_get( get_field('video') );
          echo $embed_code;
        } 
       else if( get_field('image')): 
                $image = get_field('image');
                ?>
                 <div class="huge-img" style="background-image: url('<?php echo $image['url']; ?>');">  
                
            </div>
    
     <?php endif; ?>      
                 
                <br/>
                 
    <div class="entry-left-col">
                         <p class="short-details"><?php the_field('short_details'); ?></p>

            <ul class="screening"><li>
			<?php the_field('date_time'); ?><br/>
            <?php the_field('location'); ?>
                <br/>
         <!-- purchase link if submitted -->
          <?php 
             if( get_field('purchase_link') ){
              echo '<a class="purchase" href="';
              echo the_field('purchase_link');
                echo '" target="_blank"> <i class="fa fa-ticket"></i>  Purchase Tickets
                   </a>';
             };
            ?> 
                </li>
    <!-- if there is second screening, show details -->
     <?php 
       if( get_field('date_time2') ){
           echo '<li>';
             the_field('date_time2'); 
           echo '<br/><span class="address"> <a class="address-link" target="_blank" href="https://www.google.com/maps?q=';
           $location = get_field('location2');
           echo $location['lat'] . ',' . $location['lng'] . '">';
                
             $address = explode( "," , $location['address']);
                echo '<b>'.$address[0].'</b><br/>'; //place name
                echo $address[1].'<br/>'; 
                echo $address[2].'<br/>'; 
                echo $address[3].'<br/></a></span>';
        if( get_field('purchase_link') ){
                  echo '<br/><a class="purchase" href="';
                  echo the_field('purchase_link');
                    echo '" target="_blank"> <i class="fa fa-ticket"></i>  Purchase Tickets</a></li>';
        } ;
       };
    ?>      
    </ul>
                 </div>
                 <div class="entry-right-col">
  	         <?php the_content(); ?>
                </div>
             </li>
             <?php endforeach; ?>
          </ul>
		  
        </div>    

		  <!-- if there are no future screenings -->
		  <?php if( empty($custom_posts) ): ?>
<div class="entry-content-page center">
		  <h3 id="no-future-films">There are no planned series screenings at the moment. Check back soon!</h3>
	<br/>
	<a href="http://aito.ca/reelawareness/year-long-series/past-series-films/">
			  <button class="button">
				Past Series Films
			  </button>
		  </a>
</div>
		  <?php endif?>

   <?php get_footer(); ?>