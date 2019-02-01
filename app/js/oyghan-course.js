$(function(){
   $('.oyghan-chapter h3').on('click',function(){
       $(this).parent('.oyghan-chapter').find('.video-list').slideToggle();
   })
});