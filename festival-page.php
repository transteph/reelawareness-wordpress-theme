<?php /* Template Name: Series page */ get_header(); ?>
    <?php get_sidebar(); ?>
        <!-- Header image div -->
        <?php 
        $image = get_field('header_photo');
        if( !empty($image) ): ?>
            <div class="huge-img" style="background-image: url('<?php echo $image['url']; ?>');"> </div>
            <?php endif; ?>
                <!-- start of post content -->
                <div id="content" class="pageContent">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <!-- Page Title -->
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
                        <?php 
            global $post; 
             $posts = get_posts(array(
                'category' => 3,
                'posts_per_page'	=> -1,
                'order'				=> 'ASC',
                'orderby'			=> 'meta_value',
                'meta_key'			=> 'date_time',
                'meta_type'			=> 'numeric'
            ));
            if($posts){
                // divider
                echo '<div class="huge-img" id="divider" style="background-image: url(http://aito.ca/reelawareness/wp-content/uploads/22731688779_3e57a47206_b.jpg);">' .
                "<h2>2017 Festival Films</h2>
                </div>";
            };
     echo '
     <div class="festival-contain">';
            foreach($posts as $post) : setup_postdata($post);
             ?>
   <div class="film-posting">          
   <!-- Film image. Hide if there is video url -->
    <?php 
       if( get_field('image') && !get_field('video')): 
                $image = get_field('image');
                ?>
            <div class="huge-film-img" style="background-image: url('<?php echo $image['url']; ?>');">  
            </div>
        <div class="half-page">
                <?php endif; ?>
             <?php if( get_field('video') ){
                        $embed_code = wp_oembed_get( get_field('video') );
                        echo '<div class="video-container">' . $embed_code . '</div>';
                        echo '<div class="full-page">';
                     };
         ?>
                             <a class="movieName <?php echo 'film-video-title " ';  ?>        
                href="<?php the_permalink() ?>">
                     <?php the_title(); ?>
                 </a>
                 <p class="short-details">
                   <?php the_field('short_details'); ?>
                   </p>
                   <div class="date-location">
                                <span class="screen-date">
                                  <?php $date = get_field('date_time');
                                 $date2 = date("F j, Y", strtotime($date)); 
                                 // getting time in date_time 
                                $date3 = date("g:ia", strtotime($date));
                                
                                if ($date2 !== 'January 1, 1970'){
                                    echo $date2 . " - " . $date3  ; 
                                }
                                 ?>
                                    </span>
                                    <br/>
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
            </div>
            
                            <!-- if there is second half-page, show details -->
                            <?php 
       if( get_field('date_time2') ){
             the_field('date_time2'); 
           echo '<br/>' . the_field('location2') . '<br/>' ;
        if( get_field('purchase_link') ){
                  echo '<br/><a class="purchase" href="';
                  echo the_field('purchase_link');
                    echo '" target="_blank"> <i class="fa fa-ticket"></i>  Purchase Tickets</a>';
        } ;
       };
    ?>
    <div class="film-desc">
                        <?php
                    the_content(); 
                ?>
                </div>
                    </div>
     </div> <br/>
   <?php endforeach; ?>
     
                        <!-- if there are no future half-pages -->
     <?php if( empty($posts) ): ?>
                            <h3 id="no-future-films">Stay tuned for details on this year's Reel Awareness Film Festival.</h3>
                            <br/>
                            <br/>
                            <a href="http://aito.ca/reelawareness/festival/festival-information/">
                                <button class="button"> Festival Information </button>
                            </a>
                            <a href="http://aito.ca/reelawareness/festival/past-festival-films/">
                                <button class="button"> Past Festival Films </button>
                            </a>
   <?php endif?>
</div>
</div>
                                <?php get_footer(); ?>