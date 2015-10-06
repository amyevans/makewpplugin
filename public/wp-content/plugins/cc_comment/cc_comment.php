<?php
/*
Plugin Name: CC Comment Plugin
Plugin URI: https://github.com/amyevans
Description: This plugin sends an email when a comment is made.
Author: Amy Evans
Version: 1.0
Author URI: http://amyevans.github.io
*/

function cc_comment() {
	global $_REQUEST;

	$to = "amyevanstx@gmail.com";
	$subject = "New comment posted at your blog " . $_REQUEST['subject'];
	$message = "Message from: " . $_REQUEST['name'] . " at email " . $_REQUEST['email'] . 
				": \n" . $_REQUEST['comments'];
	wp_mail($to, $subject, $message);
}

add_action('comment_post', 'cc_comment' );

function cccomm_init() {
	register_setting('cccomm_options', 'cccomm_cc_email' );
}

add_action('admin_init', 'cccomm_init' );

function cccomm_option_page() {
	?>
	<div class="wrap">
		<h2>CC comments options</h2>
		<p>Welcome to the CC comments plugin.</p>
		<form action="options.php" method="post" id="cc-comments-email-options-form">
			<?php settings_fields('cccomm_options'); ?>
			<h3><label for="cccomm_cc_email">Email to send CC to:</label>
				<input type="text" id="cccomm_cc_email" name="cccomm_cc_email" value="<?php echo esc_attr(get_option('cccomm_cc_email')); ?>" /></h3>
				<p><input type="submit" name="submit" value="Save Email" /></p>
		</form>
	</div>
	<?php
}

function cccomm_plugin_menu() {
	add_options_page('CC Comments Settings', 'CC Comments', 'manage_options', 'cc-comments-plugin', 'cccomm_option_page' );
}

add_action('admin_menu', 'cccomm_plugin_menu' );


?>