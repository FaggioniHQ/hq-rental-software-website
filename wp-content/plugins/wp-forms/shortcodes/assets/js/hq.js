(function($){
    $("#form-field-hq_home_email").on("change",function(){
        $("#email").val($(this).val());
        window.email = $(this).val();
    });
    $("#form-field-hq_home_email_bottom").on("change",function( ){
        window.email = $(this).val();
    });
})(jQuery);