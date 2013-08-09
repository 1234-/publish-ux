<?php
/*
Plugin Name: Publish UX
Plugin URI: https://github.com/georgestephanis/publish-ux
Description: This plugin breaks the edit posts screen.  You shouldn't use it.
Author: George Stephanis
Version: 0.1
Author URI: http://wordpress.org/
*/

class Publish_UX {
	static $instance;

	function __construct() {
		self::$instance = $this;

		add_action( 'submitpage_box', array( __CLASS__, 'new_publish_button' ) );
		add_action( 'submitpost_box', array( __CLASS__, 'new_publish_button' ) );
	}

	static function new_publish_button() {
		wp_enqueue_style( 'publish-ux', plugins_url( 'publish-ux.css', __FILE__ ) );
		wp_enqueue_script( 'splitbutton', plugins_url( 'splitbutton.js', __FILE__ ), array( 'jquery' ) );
		?>
		<div class="publish-ux-button">
			<select>
				<option>Publish</option>
				<option>Save Draft</option>
				<option>Preview</option>
				<option>Move to Trash</option>
			</select>
			<button class="splitbutton">Go &rarr;</button>
		</div>
		<?php
	}
}

new Publish_UX;
