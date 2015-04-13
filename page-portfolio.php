<?php
/*
Template Name: Portfolio Page
*/
?>

<?php get_header(); ?>
	
	<div class="main__wrapper">
        <div class="portfolio">
            <ul class="portfolio--ul">
                            
                <?php
                /* The loop */
                while ( have_posts() ) : the_post();
                    if ( get_post_gallery() ) :
                        $gallery = get_post_gallery( get_the_ID(), false );
                        $image_attributes = wp_get_attachment_image_src( $attachment_id );
                        /* Loop through all the image and output them one by one */
                        foreach( $gallery['src'] AS $src ){
                            ?>
                            <li class="portfolio--li">
                                <a href="<?php echo $src; ?>" class="portfolio--a venobox" data-gall="myGallery">
                                   <div class="portfolio--img" style="background:url('<?php echo $src; ?>') no-repeat" alt=""> 
                                   </div>
                                </a>                    
                            </li>                            
                            <?php
                        }
                    endif;
                endwhile;
                ?>

            </ul>
        </div>        
    </div>    

</div><!-- /container -->
		
<?php get_footer(); ?>
		