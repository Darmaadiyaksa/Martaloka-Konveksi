// ==================================================
// Project Name  :  Quizo
// File          :  JS Base
// Version       :  1.0.0
// Author        :  jthemes (https://themeforest.net/user/jthemes)
// ==================================================
$(function(){
  "use strict";
  $(window).on('load', function(){
    $(".stepnya").on('click', function(){
      $(this).parent().parent().find(".stepnya").removeClass("active");
      $(this).addClass("active");
    });
  });

  // ================== CountDown function ================
  $('.countdown_timer').each(function(){
    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = '2022/10/24';
      $this.countdown(finalDate, function(event) {
        var $this = $(this).html(event.strftime(''
        + '<div class="count_hours"><h3>%H</h3><span class="text-uppercase">jam</span></div>'
        + '<div class="count_min"><h3>%M</h3><span class="text-uppercase">menit</span></div>'
        + '<div class="count_sec"><h3>%S</h3><span class="text-uppercase">detik</span></div>'));
      });
    });
  });



var currentTab = 0; // Current tab is set to be the first tab (0)
