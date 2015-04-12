<?php
/*
Template Name: Contact Page
*/
?>

<?php get_header(); ?>
	
    <div class="main__wrapper">
        <div class="contactus">
            <div class="contactus__left">
                <!-- <img class="contactus__left--img" src="assets/images/contactus_left-img.jpg" alt=""> -->
                <?php 
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail();
                    } 
                ?>  
            </div>

            <div class="contactus__right">
                <!-- <h1 class="lt"></h1> -->
                <div id="respond">
                    <?php echo $response; ?>
                    <form action="<?php the_permalink(); ?>" method="post">
                        <div class="form__wrapper">
                            <label for="name">NAME</label>
                            <input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
                        </div>
                        <div class="form__wrapper">
                            <label for="message_email">EMAIL</label>
                            <input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
                        </div>
                        <div class="form__wrapper">
                            <label for="">WEDDING/<br>PREWEDDING DATE</label>
                            <input type="date" name="date" value="<?php echo esc_attr($_POST['date']); ?>">
                        </div>
                        <div class="form__wrapper">
                            <label for="">VENUE</label>
                            <input type="text" name="place" value="<?php echo esc_attr($_POST['place']); ?>">
                        </div>
                        <div class="form__wrapper">
                            <label for="message_text">MESSAGE</label>
                            <textarea type="text" rows="8"name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
                        </div>
                        <div class="form__wrapper">
                            <label for="message_text">VERIFICATION</label>
                            <input type="text" style="width: 40px; text-align:center;margin:0 0 4px 0;" name="message_human"><label class="verify" for="" style="">+ 3 = 5</label>
                        </div>
                        <input type="submit" class="send--button" name="send--button" value="SEND">
                    </form>
                </div>
            </div>
        </div>      
    </div>
    <br>
</div><!-- /container -->
		
<?php get_footer(); ?>
		