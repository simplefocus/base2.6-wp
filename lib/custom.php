<?php 
// Custom Functions

// Remove the admin bar from the front end
add_filter( 'show_admin_bar', '__return_false' );


// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');


// Obscure login screen error messages
function wpfme_login_obscure(){ return '<strong>Error</strong>: Either the username or password is incorrect.';}
add_filter( 'login_errors', 'wpfme_login_obscure' );


// Disable the theme / plugin text editor in Admin
define('DISALLOW_FILE_EDIT', true);

// is_tree()
function is_tree( $pid ) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;               // load details about this page
 
    if ( is_page($pid) )
        return true;            // we're at the page or at a sub page
 
    $anc = get_post_ancestors( $post->ID );
    foreach ( $anc as $ancestor ) {
        if( is_page() && $ancestor == $pid ) {
            return true;
        }
    }
 
    return false;  // we arn't at the page, and the page is not an ancestor
}

?>