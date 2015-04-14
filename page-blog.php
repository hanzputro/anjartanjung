<?php
/*
Template Name: Blog Page
*/
?>

<?php get_header(); ?>

	<div class="main__wrapper">
		<div class="post__blog">
    		<ul class="post__blog--ul">

                <?php
                // set the "paged" parameter (use 'page' if the query is on a static front page)
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                // the query
                $the_query = new WP_Query( 'cat=1&paged=' . $paged ); 
                ?>

                <?php if ( $the_query->have_posts() ) : ?>

                <?php
                // the loop
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                ?>
                
                <li class="post__blog--li">
                    <!-- title -->
                    <a href="<?php echo get_permalink( $nextID ); ?>"><h2 class="lt"><font><?php the_title(); ?></font></h2></a>
                    <!-- date -->
                    <small class="post__date"><?php the_time(get_option('date_format')); ?></small>
                    <!-- <ul class="post__blog__img--ul">
                        <li class="post__blog__img--li">
                            <img src="assets/images/post/post-img2.jpg" alt="" class="post__blog__img--img">
                        </li>
                    </ul> -->
                    <p>
                        <!-- gallery & content -->
                        <?php the_content(); ?>
                    </p>                    
                    <div class="box__comment__show">
                        <div class="box__comment__show--left">
                            <a class="comment__toggle" href="#comment__toggle--<?php the_ID();?>"><p class="ag">COMMENT</p></a>
                        </div>                        
                        <div class="box__comment__show--right">
                            <p class="ag">SHARE THIS POST</p>
                            <!-- <ul class="share__post--ul">
                                <li class="share__post--li">                                    
                                </li>
                            </ul> -->
                            <?php ds_social_media_icons(); ?>
                        </div>
                    </div>
                    <!-- comments -->
                    <div class="comment__toggle__wrapper" id="comment__toggle--<?php the_ID(); ?>">
                        <?php comments_template(); ?>
                    </div>                    
                </li>
                
                <?php endwhile; ?>

                <?php

                // next_posts_link() usage with max_num_pages
                next_posts_link( 'Older Entries', $the_query->max_num_pages );
                previous_posts_link( 'Newer Entries' );
                ?>

                <?php 
                // clean up after the query and pagination
                wp_reset_postdata(); 
                ?>

                <?php else:  ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>

    		</ul>    		
		</div>    	
	</div>

</div><!-- /container -->
		
<?php get_footer(); ?>
		