const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.react('react/PricingCalculatorShortcodeApp.js', 'shortcodes/HQWebsitePricingCalculator/HQWebsitePricingCalculator.js');
mix.react('react/PricingCalculatorShortcodeApp2022.js', 'shortcodes/HQWebsitePricingCalculator2022/HQWebsitePricingCalculator2022.js');