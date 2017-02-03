jQuery(document).ready(function($){
  
  var mn = $(".site-header");
      mns = "scrolled";
      hdr = $('.site-header').height();

  $(window).scroll(function() {
    if( $(this).scrollTop() > hdr ) {
      mn.addClass(mns);
      $('.site-content').css('margin-top',hdr);
    } else {
      mn.removeClass(mns);
      $('.site-content').css('margin-top','0');
    }
  });
});