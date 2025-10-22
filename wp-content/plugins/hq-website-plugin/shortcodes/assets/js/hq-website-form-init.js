(function($){
    var emailDefault = '';
    if(typeof(window.email) === 'string' && window.email !== ''){
        emailDefault = window.email;
    }
    $("#email").val(emailDefault);
    $("#business_sector_id").val(defaultBusinessSector);
})(jQuery);