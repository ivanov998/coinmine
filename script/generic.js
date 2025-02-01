/*
*
*
*     GENERIC.JS
*        2015
*
*/

$( document ).ready(function()
{
    $('.fixed-header').hide(0,function()
        {
            $('.fixed-header .logo').hide(); 
            $('.inner-header .nav').hide(); });
            $('.fixed-header').show(0,function()
                {
                    $('.fixed-header .logo').fadeIn(600,function()
                        {
                            $(".inner-header .nav").slideDown(200); 
                        });
            });
});

$( document ).ready(function() { var cont = $('.content'); cont.hide(); cont.fadeIn(400); });
//NOTIFICATION HANDLER
window.onload = function() 
    {
        var ntf = $('.notification');
        //CLICK EVENT LISTENER
        document.getElementById('notification').addEventListener("click",function(){ntf.slideUp(500);});
        setTimeout(function(){ ntf.slideUp(); },5*1000);
    }

function introductionScroll() 
{ 
    var targ = $(".introduction");
    $('html, body').animate({scrollTop: targ.offset().top-55 }, 1000); 
}
function close_prompt(obj)
{
    $(obj).slideUp(200);
}
