// $(function(){
// });
// という書き方もあるが、お行儀がいいのは下の書き方。
(function($){
  // jQuery

  // --------------------------
  // ページ内リンク
  // --------------------------
  $('a[href^=#]').click(function() {
    var $href, $height, $position, target;
    $href = $(this).attr("href");
    target = $($href === "#" || $href === "" ? 'html' : $href);
    $position = target.offset().top;
    $("html, body").animate({
      scrollTop: $position
    }, 800);
    return false;
  });

  // ------------------------------
  // navを一定以上行くと固定
  // ------------------------------
  var $nav_position = $("nav").offset().top;
  var $now_position;
  $(window).scroll(function(){
    $now_position = $(window).scrollTop();
    if ($nav_position <= $now_position) {
      $("nav").addClass("nav-fixed");
    } else if ($nav_position >= $now_position) {
      $("nav").removeClass("nav-fixed");
    }
  });

  // ------------------------------
  // detail & overlay
  // ------------------------------
  $(".work-box span").on("click",function(){
    var $attr = $(this).attr("class");
    var $attrArray = $attr.split(" ");
    $(".overlay").fadeIn();
    $(".detail-"+$attrArray[2]+"").fadeIn();
  });
  $(".remove").on("click",function(){
    $(".overlay").fadeOut();
    $(".detail").fadeOut();
  });
})(jQuery);
