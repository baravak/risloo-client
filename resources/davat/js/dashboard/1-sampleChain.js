function sampleChain(el){
    console.log(el);
    el.hover(function(){
        var chain = $(this).attr('data-chain')
    }, function(){

    });
}
