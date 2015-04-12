<?php 
/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */


/*********************************************************/
/*                      theme setup                     */
/*********************************************************/
function theme_setup() {
  wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'theme_setup' );

function js_setup() { 
  wp_register_script( 'jquery','','');
  wp_register_script('jquery2', get_template_directory_uri().'/assets/js/jquery-1.11.1.js', '', '') ;
  wp_register_script('scripts', get_template_directory_uri().'/assets/js/partial/scripts.js', '', '') ;

  wp_enqueue_script( array('jquery', 'jquery2', 'scripts'));   
}  
add_action('wp_enqueue_scripts', 'js_setup');


/*********************************************************/
/*                 menu navigation setup               */
/*********************************************************/
function menu_setup() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'menu_setup' );

function set_option_menu() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' )
      // 'another-menu' => __( 'Another Menu' ),
      // 'an-extra-menu' => __( 'An Extra Menu' )
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


/*********************************************************/
/*                 Form Contact Setup                   */
/*********************************************************/
// response generation function
$response = "";

//function to generate response
function my_contact_form_generate_response($type, $message){
    global $response;

    if($type == "success"){
      $response = "<div class='success'>{$message}</div>";
    }
    else{
      $response = "<div class='error'>{$message}</div>";
    }
}

//response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";

//user posted variables
$name = $_POST['message_name'];
$email = $_POST['message_email'];
$date = $_POST['date'];
$place = $_POST['place'];
$message = $_POST['message_text'];
$human = $_POST['message_human'];

//php mailer variables
$to = get_option('admin_email');
$subject = "Someone sent a message from ".get_bloginfo('name');
$content_email = $date  . "\r\n" . $place  . "\r\n" . $message  . "\r\n";
$headers = 'From: '. $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

if (isset($_POST['send--button'])){
    if(empty($name) || empty($message) || empty($email) || empty($human) || empty($date) || empty($place)){        
        my_contact_form_generate_response("error", $missing_content);
    }
    else{        
        if($human == 2 ){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                my_contact_form_generate_response("error", $email_invalid);
            }
            else{
                if(!empty($name) || !empty($message) || !empty($email) || !empty($human) || !empty($date) || !empty($place)){
                    $sent = wp_mail($to, $subject, strip_tags($content_email), $headers);
                    if($sent){
                        my_contact_form_generate_response("success", $message_sent); //message sent!
                    } 
                    else{
                        my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
                    }   
                }                
            }     
        }
        else{            
            my_contact_form_generate_response("error", $not_human);
        }
    }
}


/*********************************************************/
/*                  Form Comment Setup                   */
/*********************************************************/
function add_custom_comment_field( $comment_id ) {
    add_comment_meta( $comment_id, 'my_custom_comment_field', $_POST['my_custom_comment_field'] );
}
add_action( 'comment_post', 'add_custom_comment_field' );
