<?php /* Template Name: Series Schedule page */ get_header(); ?>

<div id="container">
  <?php get_sidebar(); ?>
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
      
<div class="schedule">
      
<?php

// find date time now
$date_now = date('Y-m-d H:i:s');
$time_now = strtotime($date_now);


// find date time in 7 days
$time_next_week = strtotime('+80 day', $time_now);
$date_next_week = date('Y-m-d H:i:s', $time_next_week);


// query events
$posts = get_posts(array(
	'posts_per_page'	=> -1,
	'category'			=> 4,
	'meta_query' 		=> array(
		array(
	        'key'			=> 'start_date',
	        'compare'		=> 'BETWEEN',
	        'value'			=> array( $date_now, $date_next_week ),
	        'type'			=> 'DATETIME'
	    )
    ),
	'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'start_date',
	'meta_type'			=> 'DATETIME'
));

if( $posts ): ?>

	<h2>Upcoming events this week</h2>
	<ul id="events">
		<?php foreach( $posts as $p ): ?>
			<li>
				<strong><?php echo $p->post_title; ?></strong>: <?php the_field('start_date', $p->ID); ?> -  <?php the_field('end_date', $p->ID); ?>
			</li>	
		<?php endforeach; ?>
	</ul>

<?php endif; ?>
         
    
      </div></div>

</div>
   <?php get_footer(); ?>