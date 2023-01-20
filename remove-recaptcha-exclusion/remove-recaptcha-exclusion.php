<?php
/**
 * Plugin Name: Remove Recaptcha Exclusion
 * Description: Removes the built-in exclusion for the recaptcha/api.js script and allows it to be delayed with the Delay JavaScript Execution feature of WP Rocket.
 * Version: 1.0
 * Author: Shameem Reza
 * Author URI: https://shameem.dev
 */

 function remove_recaptcha_exclusion( $excluded_scripts ) {
  $key = array_search( 'recaptcha/api.js', $excluded_scripts );
  if ( $key !== false ) {
      unset( $excluded_scripts[$key] );
  }
  return $excluded_scripts;
}
add_filter( 'rocket_exclude_js', 'remove_recaptcha_exclusion' );
