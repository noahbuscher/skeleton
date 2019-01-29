/**
 * Typing animation
 */
$(function() {
  $('.menu-open').click(function(){
    $('.menu-close').fadeIn();
    $('.menu-open').fadeOut();
    $('nav').fadeIn();
  });

  $('.menu-close').click(function(){
    $('.menu-close').fadeOut();
    $('.menu-open').fadeIn();
    $('nav').fadeOut();
  });

  $(window).on('resize', function(){
    var win = $(this); //this = window
    if (win.width() >= 970) {
        $('nav').attr('style','');
        $('.menu-open').attr('style','');
        $('.menu-close').attr('style','');
    }
  });
});
