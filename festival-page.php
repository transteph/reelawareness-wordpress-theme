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
                    <ul class="posts page-post" id="festival-contain">
                        <?php 
            global $post; 
             $posts = get_posts(array(
                'category' => 3,
                'orderby'			=> 'date_time',
                'order'				=> 'ASC'
            ));
            if($posts){
                // divider
                echo '<div class="huge-img" id="divider" style="background-image: url(http://aito.ca/reelawareness/wp-content/uploads/22731688779_3e57a47206_b.jpg);">' .
                "<h2>2017 Festival Films</h2>
                </div>";
            };
            foreach($posts as $post) : setup_postdata($post);
             ?>
                            <!-- loop through each festival post -->
                            <li <?php post_class(); ?>> <a class="movieName <?php echo 'film-video-title " ';  ?>        
            href="<?php the_permalink() ?>">
                 <?php the_title(); ?>
                </a>        

   <!-- Film image. Hide if there is video url -->
    <?php 
       if( get_field('image') && !get_field('video')): 
                $image = get_field('image');
                ?>
                 <div class="film-photo"> 
                     <img src="<?php echo $image[ 'url']; ?>" alt="Photo from film <?php echo 'film-video-title " ';  ?>"/>
                </div>
                <?php endif; ?>
                    <br/>
                    <div class="entry-left-col">
                        <p class="short-details">
                            <?php the_field('short_details'); ?>
                        </p>
                        <ul class="screening">
                            <li>
                                <?php the_field('date_time'); ?>
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
            ?> </li>
                            <!-- if there is second screening, show details -->
                            <?php 
       if( get_field('date_time2') ){
           echo '<li>';
             the_field('date_time2'); 
           echo '<br/>' . the_field('location2') . '<br/>' ;
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
                        <?php if( get_field('video') ){
                        $embed_code = wp_oembed_get( get_field('video') );
                        echo $embed_code;
                     } 
                    the_content(); 
                ?>
                    </div>
                    </li>
                    <?php endforeach; ?>
                        </ul>
                        </div>
                        <!-- if there are no future screenings -->
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
                                <?php get_footer(); ?>