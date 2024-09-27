<?php
/**
 * Remove authors' ability to publish content.
 *
 */
// function return_publish_permissions() {
// $user = new WP_User(5);
// $user->add_cap( 'publish_posts' );
// }
// register_deactivation_hook( __FILE__, 'return_publish_permissions' );

function remove_publish_permissions() {
$user = get_role( 'author' );
$user->add_cap('publish_posts',false);
}
register_activation_hook( __FILE__, 'remove_publish_permissions' );