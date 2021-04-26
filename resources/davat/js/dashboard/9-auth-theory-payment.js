$('body').on('statio:auth:theory:payment', function () {
    if($('#payment-status').val() == 'success' && opener){
        if(opener.PaymentSuccess){
            opener.PaymentSuccess();
        }
        window.close();
    }
});
