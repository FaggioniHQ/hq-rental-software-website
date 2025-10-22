<?php
require_once('HQWebsiteTrialForm/HQWebsiteTrialForm.php');
require_once('HQWebsitePricingCalculator/HQWebsitePricingCalculatorShortcode.php');
require_once('HQWebsiteTrialFormSupport/HQWebsiteTrialFormSupport.php');
require_once('HQWebsiteTrialFormJS/HQWebsiteTrialFormJS.php');
function hq_website_assets()
{
    wp_register_style('hq-trial-form-css', plugin_dir_url(__FILE__) . 'assets/css/hq-website-forms.css', array(), '0.0.1', 'all');
    wp_register_script('jquery-blockui-js', plugin_dir_url(__FILE__) . 'assets/js/jquery.blockUI.js', array('jquery'), '2.7.0', true);
    
    wp_register_script('hq-scripts', plugin_dir_url(__FILE__) . 'assets/js/hq.js?ver=0.0.3', array('jquery'), '0.0.3', true);
    wp_register_script('hq-jivo', plugin_dir_url(__FILE__) . 'assets/js/jivo.js', array('jquery'), '1.0.0', true);
    wp_register_script('hq-jivo-es', plugin_dir_url(__FILE__) . 'assets/js/jivoes.js', array('jquery'), '1.0.0', true);
    wp_register_script('hq-jivo-pt', plugin_dir_url(__FILE__) . 'assets/js/jivopt.js', array('jquery'), '1.0.0', true);
    wp_register_script('jquery-form-js', plugin_dir_url(__FILE__) . 'assets/js/jquery.form.min.js', array('jquery'), '4.2.1', true);
    wp_register_script('hq-calculator-shortcode-js', plugin_dir_url(__FILE__) . 'HQWebsitePricingCalculator/HQWebsitePricingCalculator.js', array(), '0.1.6', true);
    wp_register_script( 'hq-trial-form-support-shortcode-js', plugin_dir_url(__FILE__) . 'HQWebsiteTrialFormSupport/HQWebsiteTrialFormSupport.js', array(), '0.0.6', true);

   
    /*Enqueues*/
    wp_enqueue_script('hq-scripts');
}
add_action('wp_enqueue_scripts', 'hq_website_assets');


function hq_website_metatags_on_header()
{
    ?>
    <meta name="google-site-verification" content="A7vml0VZozaTovlhGRb_rbwo5ve42PsnOLcQJutW8s8" />
    <meta name="theme-color" content="#213559">
    <?php
}
add_action('wp_head', "hq_website_metatags_on_header");
function hq_date()
{
    return date("Y");
}
add_shortcode('hq_date','hq_date');

$trialForm = new HQWebsiteTrialForm();
$trialJS = new HQWebsiteTrialFormJS();
$calculator = new HQWebsitePricingCalculatorShortcode();
$trialFormSupport = new HQWebsiteTrialFormSupport();
