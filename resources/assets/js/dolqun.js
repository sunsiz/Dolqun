$(function(){
    // 顶部导航区域固定效果
    // $(window).scroll(function(){
    //     var fixedTop=$(window).scrollTop();
    //     if(fixedTop>=30){
    //         $('#fixedTop').addClass('fixedTops');
    //     }else{
    //         $('#fixedTop').removeClass('fixedTops');
    //     }
    // })
    // 顶部下拉菜单效果


    /*
        ==========================
                首页轮播图功能
        ==========================
    */

    // 1.自动轮播
    var slider=0;
    function autoSlide(){
        slider++;
        slider= slider==3?0:slider;
        $(".slider-area li").eq(slider).fadeIn(500).siblings(".slider-area li").fadeOut(500);
        //$(".slideFocus-nums li").eq(slider).addClass('cur').siblings('.slideFocus-nums li').removeClass('cur');
    }
    //自动滚动定时器
    timer = setInterval(autoSlide,5000);
    // 手动控制轮播
    // $(".slideFocus-nums li").mouseover(function(){
    //     slider  =  $(this).index();
    //     $(".slide-items li").eq(slider).stop().fadeIn(500).siblings(".slide-items li").stop().fadeOut(500);
    //     $(".slideFocus-nums li").eq(slider).addClass('cur').siblings('.slideFocus-nums li').removeClass('cur');
    // })
    // 鼠标移入停止，移出开始
    $('.slider-area').hover(function(){
        // 清除定时器
        clearInterval(timer);
    },function(){
        // 重启定时器
        timer = setInterval(autoSlide,3000);
    })



})