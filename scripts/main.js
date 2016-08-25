/* eslint-env jquery */

(function ($) {

    $(window).on('load resize', function(event) {

    var articleHeight = $('.single-post__body').height();
    var toTop;
    var perc;
    var windowHeight = $(window).height();

    $(window).on('scroll', function(){
      checkProg();
    });

    function checkProg(){
      toTop = ($(window).scrollTop()+windowHeight)-$('.single-post__body').offset().top;
      perc = toTop/articleHeight;
      fillProgressBar(perc);
    }

    function fillProgressBar(p){
      p = (p*100)+"%";
      $('.global-header__progress-bar').width(p);
    };

    checkProg();
  })


  $('.js-reveal-header').on('click', function(event) {
    $('.single-post').toggleClass('single-post--reveal-cover')
  })

})( jQuery );
