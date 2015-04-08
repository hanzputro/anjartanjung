<?php 
/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */


/*********************************************************/
/*                 theme setup                  */
/*********************************************************/
function theme_setup() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_setup' );


/*********************************************************/
/*                 menu navigation setup               */
/*********************************************************/
function menu_setup() {
  register_nav_menu('new-menu',__( 'New Menu' ));
}
add_action( 'init', 'menu_setup' );

function set_option_menu() {
  register_nav_menus(
    array(
      'new-menu' => __( 'New Menu' ),
      'another-menu' => __( 'Another Menu' ),
      'an-extra-menu' => __( 'An Extra Menu' )
    )
  );
}
add_action( 'init', 'set_option_menu' );


/*********************************************************/
/*                  slider home setup                  */
/*********************************************************/
// add feature image first
add_theme_support('post-thumbnails');
// Create Slider Post Type
require( get_template_directory() . '/slider/slider_post_type.php' );
// Create Slider
require( get_template_directory() . '/slider/slider.php' );



/*********************************************************/
/*               Gallery Portfolio setup                 */
/*********************************************************/
remove_shortcode('gallery', 'gallery_shortcode');

add_shortcode('gallery', 'custom_gallery');



function custom_gallery($attr) {

  $post = get_post();



  static $instance = 0;

  $instance++;



  # hard-coding these values so that they can't be broken

  

  $attr['columns'] = 1;

  $attr['size'] = 'full';

  $attr['link'] = 'none';



  $attr['orderby'] = 'post__in';

  $attr['include'] = $attr['ids'];    



  #Allow plugins/themes to override the default gallery template.

  $output = apply_filters('post_gallery', '', $attr);

  

  if ( $output != '' )

    return $output;



  # We're trusting author input, so let's at least make sure it looks like a valid orderby statement

  if ( isset( $attr['orderby'] ) ) {

    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );

    if ( !$attr['orderby'] )

      unset( $attr['orderby'] );

  }



  extract(shortcode_atts(array(

    'order'      => 'ASC',

    'orderby'    => 'menu_order ID',

    'id'         => $post->ID,

    'itemtag'    => 'div',

    'icontag'    => 'div',

    'captiontag' => 'p',

    'columns'    => 1,

    'size'       => 'thumbnail',

    'include'    => '',

    'exclude'    => ''

  ), $attr));



  $id = intval($id);

  if ( 'RAND' == $order )

    $orderby = 'none';



  if ( !empty($include) ) {

    $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );



    $attachments = array();

    foreach ( $_attachments as $key => $val ) {

      $attachments[$val->ID] = $_attachments[$key];

    }

  } elseif ( !empty($exclude) ) {

    $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

  } else {

    $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

  }



  if ( empty($attachments) )

    return '';



  $gallery_style = $gallery_div = '';



  if ( apply_filters( 'use_default_gallery_style', true ) )

    $gallery_style = "<!-- see gallery_shortcode() in functions.php -->";

  

  $gallery_div = "<div id='homepage-gallery-wrap' class='gallery gallery-columns-1 gallery-size-full'>";

  

  $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

  

  foreach ( $attachments as $id => $attachment ) {

    $link = wp_get_attachment_link($id, 'full', true, false);



    $output .= "<div class='homepage-gallery-item'>";

    $output .= "

      <div class='homepage-gallery-icon'>

        $link

      </div>";

    if ( $captiontag && trim($attachment->post_excerpt) ) {

      $output .= "

        <p class='wp-caption-text homepage-gallery-caption'>

        " . wptexturize($attachment->post_excerpt) . "

        </p>";

    }

    $output .= "</div>";

  }



  $output .= "</div>\n";



  return $output;

}