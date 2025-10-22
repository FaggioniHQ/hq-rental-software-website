<?php

function hq_jivo_chat_widget()
{
    $locale = get_locale();
    if($locale == 'es_ES'){
        echo '<script src="//code.jivosite.com/widget/4PSEFY3sFj" async></script>';
        return;
    }
    if($locale == 'pt_BR'){
        echo '<script src="//code.jivosite.com/widget/gU5srwLEIJ" async></script>';
        return;
    }
    echo '<script src="//code.jivosite.com/widget/7oUdrnykHs" async></script>';
}
add_shortcode("hq_jivo_chat_widget", "hq_jivo_chat_widget");
