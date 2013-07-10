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
	}
}

new Publish_UX;
