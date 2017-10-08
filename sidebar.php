<aside>
    <div id="sidebar">
      
    <nav id="nav" class="animate">
        
        
       <a class="icon-hamburger" id="show-button" href="#nav"><span class="fa fa-bars" aria-hidden="true">&nbsp;</span></a>
            <a class="icon-close" id="hide-button" href="#"><span class="fa fa-close" aria-hidden="true">&nbsp;</span></a>
    <?php wp_nav_menu(array('menu' =>'Main Navigation')); 
        
        
        ?>
   
    </nav>
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->

    
    
	<?php endif; ?>
    

    </div>
</aside>