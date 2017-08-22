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



    <div id="container" class="post-page test">


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
                        <?php the_field('date_time'); ?><br/>
                       <a class="address-link" target="_blank" href="https://www.google.com/maps?q=<?php $location = get_field('location'); echo $location['lat'] . ',' . $location['lng']; ?>">
                <span class="address">
                <?php 
                $location = get_field('location');
                $address = explode( "," , $location['address']);
                echo '<b>'.$address[0].'</b><br/>'; //place name
                echo $address[1].'<br/>'; 
                echo $address[2].'<br/>'; 
                echo $address[3].'<br/>'; 
                ?>
                    </span></a>
                <br/>
             <!-- if there is purchase link, display it -->
     <?php 
         if( get_field('purchase_link') ){
          echo '<br/><a class="purchase" href="';
          echo the_field('purchase_link');
            echo '" target="_blank"> <i class="fa fa-ticket"></i>  Purchase Tickets
               </a>';
         }
            ?>   
                    </li>
                    <!-- if there is second screening, show details -->
                    <?php 
       if( get_field('date_time2') ){
           echo '<li>';
             the_field('date_time2'); 
           echo '<br/><span class="address"> <a target="_blank" href="https://www.google.com/maps?q=';
           $location = get_field('location2');
           echo $location['lat'] . ',' . $location['lng'] . '">';
           $address = explode( "," , $location['address']);
            echo $address[0] .  '</a></span>';
            if( get_field('purchase_link') ){
                  echo '<br/><a class="purchase" href="';
                  echo the_field('purchase_link');
                    echo '" target="_blank"> <i class="fa fa-ticket"></i>  Purchase Tickets</a></li>';
        }; 
       };
    ?>
    
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
