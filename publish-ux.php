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
		wp_enqueue_script( 'jquery-ui-button' );
		wp_enqueue_script( 'jquery-ui-menu' );
		wp_enqueue_style( 'jquery-ui-smoothness', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css' );
		wp_enqueue_style( 'publish-ux', plugins_url( 'publish-ux.css', __FILE__ ) );
		?>
		<div class="publish-ux-button">
			<div>
				<button type="submit" id="publish-ux-button">Publish</button>
				<button>Select an action</button>
			</div>
			<ul>
				<li><a href="#">Publish</a></li>
				<li><a href="#">Save Draft</a></li>
				<li><a href="#">Preview</a></li>
				<li><a href="#">Move to Trash</a></li>
			</ul>
		</div>
		<script>
			// Largely lifted straight off of http://jqueryui.com/button/#splitbutton
			jQuery(document).ready(function($) {
				$( "#publish-ux-button" )
					.button()
					.click(function( event ) {
						event.preventDefault();
						alert( "You clicked the mockup button!" );
					})
					.next()
						.button({
							text: false,
							icons: {
								primary: "ui-icon-triangle-1-s"
							}
						})
						.click(function() {
							var menu = $( this ).parent().next().show().position({
								my: "left top",
								at: "left bottom",
								of: this
							});
							$( document ).one( "click", function() {
								menu.hide();
							});
							return false;
						})
						.parent()
							.buttonset()
							.next()
								.hide()
								.menu()
								.find('a').each(function(){
									$(this).click(function( event ){
										event.preventDefault();
										$( "#publish-ux-button .ui-button-text" ).text( $(this).text() );
									});
								});
			});
		</script>
		<?php
	}
}

new Publish_UX;
