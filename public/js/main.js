
// ハンバーガーメニューon、off
$(function(){
  var flg = "off";
  $('.humburger-menu-trigger').on('click', function() {
    $(this).toggleClass('active');
    $('.menu-content').toggleClass('active');

    if(flg == "off"){
      $("#menu-text").text('close');
      flg = "on";
    }else{
      $("#menu-text").text('menu');
      flg = "off";
    }
  });
});

$(function(){
  $(".notice-item").hover(function(){
    $(this).children('.notice-title').toggleClass('on')
    $(this).children('.notice-list-link').toggleClass('on')

  })
});