<?php
/*
Plugin Name: Caag Helpful Functions
Description: Sets of Functions Helpful for the Developers of Caag Software
Version: 0.0.1
Author: Miguel Faggioni
Author URI: http://caagsoftware.com
Text Domain: caagsoftware
*/


/*
 * Defining Global Varibles
 */
define('CAAG_HELPFUL_FUNCTIONS_VERSION','0.0.1');
define('CAAG_HELPFUL_ROOT', plugin_dir_url( __FILE__ ) );
/*
 * Includes
 */
require_once 'shortcodes/trial_forms.php';

require_once('shortcodes/trial-form-ip.php');
require_once('shortcodes/trial-form-ip-selection.php');
require_once('shortcodes/jivo-widget.php');
