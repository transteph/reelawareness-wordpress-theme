<?php 
/* WP Post Template: Upcomming Film Post Template 

*/ get_header(); ?>

<?php get_sidebar(); 
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class() ?> id="post-
    <?php the_ID(); ?>">

    <!-- Film image. Hide if there is video url -->
    <?php 
         if( get_field('video') ){
         
        }    
              
        else if( get_field('image')): 
            
            $image = get_field('image');
            ?>
    <div class="huge-img" style="background-image: url('<?php echo $image['url']; ?>');">
    </div>
    <?php endif; ?>



    <div id="container" class="post-page">


        <!-- Video -->
        <?php 
       if( get_field('video') ){
          $embed_code = wp_oembed_get( get_field('video') );
          echo $embed_code;
        } 
    ?>
        <!--  title and post -->

        <h2 class=<?php if( get_field( 'video') ){ echo '"film-video-title" '; } ?>

            "single-film-title">
            <?php the_title(); ?>
        </h2>
        <div class="entry">

            <!-- Film details, screening date, purchase url -->
            <div class="entry-left-col">
                <p class="short-details">
                    <?php the_field('short_details'); ?>
                </p>
                <ul>
                    <li>
                        <?php 
                        $now = time();
                        $date_one_timestamp = strtotime(get_field('date_time'));
                    if ($now < $date_one_timestamp ) { // if this is an upcoming screening, display details
                             $date = get_field('date_time');
                              $date2 = date("F j, Y", strtotime($date));
                                if ($date2 !== 'January 1, 1970'){
                                    echo $date2 . '<br/>'; 
                                }
                        echo the_field('location') . '<br/>';
 
                        if( get_field('purchase_link') ){
                          echo '<br/><a class="purchase" href="';
                          echo the_field('purchase_link');
                            echo '" target="_blank"> <i class="fa fa-ticket"></i>  Purchase Tickets
                               </a>';
                         }
                    
                    } // end filtering only future screenings     
                       else {
                           $date = get_field('date_time');
                              $date2 = date("F j, Y", strtotime($date));
                                if ($date2 !== 'January 1, 1970'){
                                    echo $date2 . '<br/>'; 
                                }
                       } 
                        ?>
                <br/>
            
                </ul>

                
    <?php
     if( get_field('video') ):
        if( get_field('image')): 

                $image = get_field('image');
                ?>
                    <img src="<?php echo $image['url']; ?>" />

                    <?php endif; ?>
<?php endif; ?>
            </div>


            <div class="entry-right-col">
                <?php the_content(); ?>
            </div>

        </div>

        <?php edit_post_link('Edit this entry','','.'); ?>

    </div>


    <?php endwhile; endif; ?>

</div>
<?php get_footer(); ?>
