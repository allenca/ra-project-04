<?php
/**
 * Plugin Name: First Plugin
 * Plugin URI: http://test.com
 * Description: my first plugin
 * Version: 1.0.0
 * Author: Allen Chan
 * Author URI: http://test.com
 * License: GPL2
 */

// if wordpress didn't fire this file, die. protect against injections that try to hijack
if ( ! defined( 'WPINC' ) ) {
  die;
}

//define this php function, use it like a global variable, can now use rf_dir as a working directory
define( 'RF_DIR', dirname( __FILE__ ) );


include (RF_DIR . '/lib/post_tax.php');
?>