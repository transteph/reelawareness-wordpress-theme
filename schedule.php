<?php /* Template Name: Schedule page */ get_header(); ?>
    <?php get_sidebar(); ?>
        <!-- Header image div -->
        <?php 
        $image = get_field('header_photo');
        if( !empty($image) ): ?>
            <div class="huge-img" style="background-image: url('<?php echo $image['url']; ?>');"> </div>
            <?php endif; ?>
                <!-- start of post content -->
                <div class="post">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php
    while ( have_posts() ) : the_post(); ?> 
        <div id="fest-sched-content">
            <?php the_content(); ?> 
        </div>

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>   
    </div>
    <div class="schedule-page">
                <ul>
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
            foreach($posts as $post) : setup_postdata($post);
             ?>
    <!-- loop through each festival post -->
    <li <?php post_class(); ?>> 
   <!-- Film image. Hide if there is video url -->
     <h2>
        <?php $date = get_field('date_time');
         $date2 = date("l F j, Y", strtotime($date)); ?>
        <?php echo $date2; ?>
    </h2>
        <?php  $date3 = date("g:ia", strtotime($date)); ?>
        <?php echo $date3; ?><br>
     <a class="movieName <?php echo 'film-video-title " ';  ?>   
            href="<?php the_permalink() ?>">
                 <?php the_title(); ?>
     </a>
      <ul class="screening">
        <li>
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
      </li>
  <?php endforeach; ?>
 </ul>
 </div>
                <!-- if there are no future screenings -->
                <?php if( empty($posts) ): ?>
                    <div class="entry-content-page center">
                    <h3 id="no-future-films">Stay tuned for details on this year's Reel Awareness Film Festival.</h3>
                    <br/>
                    <br/>
                    <a href="http://aito.ca/reelawareness/festival/festival-information/">
                        <button class="button"> Festival Information </button>
                    </a>
                    <a href="http://aito.ca/reelawareness/festival/past-festival-films/">
                        <button class="button"> Past Festival Films </button>
                    </a>
</div>
                    <?php endif?>
                        <?php get_footer(); ?>