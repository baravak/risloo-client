(function(window){
    JResp.opener = function(e, data){
        if(data && data.window_open){
            window.open(data.window_open);
            var _self = this;
            window.PaymentSuccess = function(){
                $(_self).trigger('submit');
                window.PaymentSuccess = undefined;
            }
        }
    }
})(this)
