(function($){
    $("#hq-trial-form").ajaxForm({
        dataType:  'json',
        success: function (data) {
            window.location.href = data.link;
        },
        error: function (data) {
            alert(data.responseJSON.errors.all_errors[0]);
            $.unblockUI();
            grecaptcha.reset();
        },
        beforeSubmit: function(){
            if( $('#policy').prop('checked') && $('#term').prop('checked')){
                $.blockUI({message: '<h3 class="caag-wait-message"><i class="fa fa-spin fa-spinner" />Please wait</h3>'});
                return true;
            }else{
                var alertText = `Please Accept the Terms of Service\nPlease Accept the Privacy Policy`;
                alert(alertText);
                return false;
            }
        }
    });
})(jQuery);