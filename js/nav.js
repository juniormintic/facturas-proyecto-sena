$(document).ready(function(){
    
    var show = 1;
    
    $('.lnr-menu').on('click', function(){
        
        if(show == 1){
            $('.menu').toggleClass("menu-show");
            show = 0;
        }else{
            $('.menu').removeClass("menu-show");
            show = 1;
        }
        
        
    });
    
});
