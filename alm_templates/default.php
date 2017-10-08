<li>
    <a class="movieName" href='<?php the_permalink() ?>'> <span class="movie-title">  <?php the_title(); ?>
                            </span>
        <!--  Image -->
        <?php 
                            $image = get_field('image');
                            if( !empty($image) ):?> <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            <?php endif; ?>
    </a>
    <!-- Film details and screening date -->
    <p class="short-details">
        <?php the_field('short_details'); ?>
    </p>
</li>