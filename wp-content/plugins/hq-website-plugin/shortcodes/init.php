<?php
require_once('HQWebsitePricingCalculator/HQWebsitePricingCalculatorShortcodeCurrent.php');
require_once('HQWebsitePricingCalculator2022/HQWebsitePricingCalculatorShortcode2022.php');
require_once('HQWebsiteTrialFormJS/HQWebsiteTrialFormJSCurrent.php');

function hq_website_assets_plugin_current()
{
    wp_register_style('hq-trial-form-css-current', plugin_dir_url(__FILE__) . 'assets/css/hq-website-forms.css', array(), '0.0.1', 'all');
    wp_register_script('jquery-blockui-js-current', plugin_dir_url(__FILE__) . 'assets/js/jquery.blockUI.js', array('jquery'), '2.7.0', true);
    
    wp_register_script('hq-scripts-current', plugin_dir_url(__FILE__) . 'assets/js/hq.js?ver=0.0.3', array('jquery'), '0.0.3', true);
    wp_register_script('hq-jivo-current', plugin_dir_url(__FILE__) . 'assets/js/jivo.js', array('jquery'), '1.0.0', true);
    wp_register_script('hq-jivo-es-current', plugin_dir_url(__FILE__) . 'assets/js/jivoes.js', array('jquery'), '1.0.0', true);
    wp_register_script('hq-jivo-pt-current', plugin_dir_url(__FILE__) . 'assets/js/jivopt.js', array('jquery'), '1.0.0', true);
    wp_register_script('jquery-form-js-current', plugin_dir_url(__FILE__) . 'assets/js/jquery.form.min.js', array('jquery'), '4.2.1', true);
    wp_register_script('hq-calculator-shortcode-js-current', plugin_dir_url(__FILE__) . 'HQWebsitePricingCalculator/HQWebsitePricingCalculator.js', array(), HQ_WEBSITE_PLUGIN_VERSION, true);
    wp_register_script('hq-calculator-shortcode-js-2022', plugin_dir_url(__FILE__) . 'HQWebsitePricingCalculator2022/HQWebsitePricingCalculator2022.js', array(), HQ_WEBSITE_PLUGIN_VERSION, true);
    wp_register_script( 'hq-trial-form-support-shortcode-js-current', plugin_dir_url(__FILE__) . 'HQWebsiteTrialFormSupport/HQWebsiteTrialFormSupport.js', array(), HQ_WEBSITE_PLUGIN_VERSION, true);
    /*Enqueues*/
    wp_enqueue_script('hq-scripts');
}
add_action('wp_enqueue_scripts', 'hq_website_assets_plugin_current');


function hq_website_metatags_on_header_plugin_current()
{
    ?>
    <meta name="google-site-verification" content="A7vml0VZozaTovlhGRb_rbwo5ve42PsnOLcQJutW8s8" />
    <meta name="theme-color" content="#213559">
    <?php
}
add_action('wp_head', "hq_website_metatags_on_header_plugin_current");
function hq_date_plugin_current()
{
    return date("Y");
}
add_shortcode('hq_date_current','hq_date_plugin_current');
$trialJS = new HQWebsiteTrialFormJSCurrent();
$calculator = new HQWebsitePricingCalculatorShortcodeCurrent();
$calculator2022 = new HQWebsitePricingCalculatorShortcode2022();