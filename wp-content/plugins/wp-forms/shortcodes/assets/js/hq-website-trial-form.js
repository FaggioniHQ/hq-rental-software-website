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
            var size = $('#fleet_size').val()

            if(isNaN(size)){
                alert('The fleet size should be a number greater than 0')
                return false
            }

            if(size < 1){
                alert('The fleet size should be greater than 0')
                return false
            }

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
