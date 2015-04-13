<?php
/*
Template Name: Blog Page
*/
?>

<?php get_header(); ?>
	
	<div class="main__wrapper">
		<div class="post__blog">
    		<ul class="post__blog--ul">
				<!-- 
                <?php
                $postlist = get_posts( 'sort_column=menu_order&sort_order=asc' );
                $posts = array();
                foreach ( $postlist as $post ) {
                   $posts[] += $post->ID;
                }

                $current = array_search( get_the_ID(), $posts );
                $prevID = $posts[$current-1];
                $nextID = $posts[$current+1];
                ?>

                <div class="navigation">
                    <?php if ( !empty( $prevID ) ): ?>
                    <div class="alignleft">
                        <a href="<?php echo get_permalink( $prevID ); ?>"
                        title="<?php echo get_the_title( $prevID ); ?>">Previous</a>
                    </div>
                    <?php endif;
                    if ( !empty( $nextID ) ): ?>
                        <div class="alignright">
                            <a href="<?php echo get_permalink( $nextID ); ?>" 
                            title="<?php echo get_the_title( $nextID ); ?>">Next</a>
                        </div>
                    <?php endif; ?>
                </div>
                 -->

                 
                <!-- post content -->
                <?php
                $args = array( 'posts_per_page' => 5 );

                $myposts = get_posts( $args );
                foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                
                <li class="post__blog--li">
                    <!-- title -->
                    <h2 class="lt"><font><?php the_title(); ?></font></h2>
                    <!-- date -->
                    <small class="post__date"><?php the_date(); ?></small>
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
                            <ul class="share__post--ul">
                                <li class="share__post--li">
                                    <a href=""><img src="" alt=""></a>
                                </li>
                                <li class="share__post--li">
                                    <a href=""><img src="" alt=""></a>
                                </li>
                                <li class="share__post--li">
                                    <a href=""><img src="" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- comments -->
                    <div class="comment__toggle__wrapper" id="comment__toggle--<?php the_ID(); ?>">
                        <?php comments_template(); ?>
                    </div>                    
                </li>
                <?php endforeach; 
                wp_reset_postdata();?>
    		</ul>    		
		</div>    	
	</div>

</div><!-- /container -->
		
<?php get_footer(); ?>
		