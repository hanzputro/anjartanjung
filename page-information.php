<?php
/*
Template Name: Information Page
*/
?>

<?php get_header(); ?>

    <div class="main__wrapper">
        <div class="information">
            <div class="information__left">
                <img class="information__left--img" src="<?php bloginfo('template_url'); ?>/assets/images/aboutus_left-img.jpg" alt="">
            </div>
            <div class="information__right">
                <!-- <h1 class="lt">About Us</h1>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lectus nibh, 
                  tincidunt sed libero at, venenatis blandit elit. Pellentesque habitant morbi 
                  tristique senectus et netus et malesuada fames ac turpis egestas. 
                  <br><br>
                  Praesent ligula dui, maximus at turpis ut, bibendum ullamcorper leo. 
                  In tincidunt auctor interdum. Quisque feugiat fringilla sollicitudin. 
                  In finibus venenatis porta. Aliquam sollicitudin ligula feugiat sem ullamcorper, 
                  tristique auctor massa blandit. Suspendisse id purus ipsum. 
                  Cras commodo maximus congue. 
                  <br><br>
                  Nullam a elit eget elit tincidunt pulvinar eget sed metus. 
                  Phasellus consectetur magna convallis, pretium lectus id, condimentum elit. 
                  Praesent malesuada, mauris nec elementum luctus, risus augue accumsan 
                  augue, eget cursus sem nisl ut purus. Nam pharetra dui massa, quis rutrum 
                  ex vehicula at. Cum sociis natoque penatibus et magnis dis parturient montes, 
                  nascetur ridiculus mus. Curabitur at accumsan enim. 
                  Nunc semper sollicitudin ultrices. Nullam imperdiet commodo consequat. 
                  In id nulla vitae tellus scelerisque cursus quis non felis. 
                  Pellentesque in ligula quis ex mollis ultricies.
                  <br><br>
                  Praesent nec est nibh. Integer vel dolor leo. Nam elementum accumsan 
                  justo sed ultrices. Donec auctor enim a mi pretium, tincidunt imperdiet
                  eros tristique. Praesent scelerisque eu tortor nec volutpat. 
                </p> -->

                <ul>
                <?php


                $args = array( 'posts_per_page' => 5, 'offset'=> 1, 'category' => 1 );

                $myposts = get_posts( $args );
                foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                  <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </li>
                <?php endforeach; 
                wp_reset_postdata();?>

                </ul>
            </div>
        </div>      
    </div>
    <br>
</div><!-- /container -->
		
<?php get_footer(); ?>
		