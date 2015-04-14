<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
	
	<div class="main__wrapper">
		<div class="main">
			<!-- <div class="main__slider">
	    		<ul class="main__slider--ul">
	    			<li class="main__slider--li">
	    				<img class="main__slider--img" src="assets/images/main_slider/main_slider-img1.jpg" alt="">
	    			</li>
	    		</ul>
	    	</div> -->
	    	<?php echo slider_template(); ?>
	    	<br>
	    	<div class="note">
	    		<center><p>
	    			<!-- Currently based in tropical island Bali, I specialize in destination weddings worldwide and will gladly travel to any location for a wedding celebration.<br>
					Photography is a way of feeling, of touching, of loving, waht you have caught on film is captured forever...<br>
	    			it remembers little things, long after you have forgotten everything.<br> -->
	    			<?php the_content(); ?>
	    		</p></center>
	    	</div>
		</div>    	
	</div>

</div><!-- /container -->
		
<?php get_footer(); ?>
		