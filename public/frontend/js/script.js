$(function($){

  //banner slider 
  var swiper = new Swiper("#banner", {
    pagination: {
      el: ".swiper-pagination",
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-next",
      prevEl: ".swiper-prev",
    },
  });

  //counter up js 
  $('.counter').counterUp({
    delay: 10,
    time: 1500
  });

  //wow js 
  new WOW().init();

  // menu js 
  var main_menu = $('#main_navigation').offset().top;

  $(window).on('scroll',function(){

    var scroll_value = $(window).scrollTop();

    if(scroll_value > main_menu){
      $('#main_navigation').addClass('menuFix');
    }else{
      $('#main_navigation').removeClass('menuFix');
    }

  });

  //filter active button
  $('.product_menu ul li').on('click', function(){
    $('.product_menu ul li').removeClass('active');
    $(this).addClass('active');
  })


});