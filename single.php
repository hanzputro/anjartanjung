<?php get_header(); ?>
	
	<div class="main__wrapper">
		<div class="post__blog">
    		<ul class="post__blog--ul">
                
                <!-- post content -->                
                <li class="post__blog--li">
					<?php while ( have_posts() ) : the_post(); ?>
    	                <!-- title -->
    					<h2 class="lt"><font><?php the_title(); ?></font></h2>
    					<!-- date -->
    					<small class="post__date"><?php the_date(); ?></small>
    					<!-- gallery & content -->
    					<p>                    
    	                    <?php the_content(); ?>
    	                </p>
    	                <br>
    	                <div class="box__comment__show">
                            <div class="box__comment__show--left">
                                <a><p class="ag">COMMENT</p></a>
                            </div>                        
                            <div class="box__comment__show--right">
                                <p class="ag">SHARE THIS POST</p>
                                <!-- <ul class="share__post--ul">
                                    <li class="share__post--li">
                                        <a href=""><img src="" alt=""></a>
                                    </li>
                                    <li class="share__post--li">
                                        <a href=""><img src="" alt=""></a>
                                    </li>
                                    <li class="share__post--li">
                                        <a href=""><img src="" alt=""></a>
                                    </li>
                                </ul> -->
                                <?php ds_social_media_icons(); ?>
                            </div>
                        </div>
    	                <!-- comments -->
    	                <?php comments_template(); ?>
					<?php endwhile; // end of the loop. ?>                    
                </li>
                
    		</ul>    		
		</div>    	
	</div>

</div><!-- /container -->
		
<?php get_footer(); ?>
		