(function($) {
  "use strict"; // Start of use strict

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 54
  });

  // Collapse the navbar when page is scrolled
  $(window).scroll(function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  });

  $(document).ready(function(){
      var email = ['v','e','d'];
      var host  = ['m', 'o', 'c', '.', 'e', 'v', 'i', 't', 'c', 'a', 'r', 'e', 't', 'n', 'i', 'a', 'l', 'o', 'n'];
      email     = email.reverse();
      host      = host.reverse();
      $('a.email-link').each(function(i){
          $(this).attr('href', 'mailto:' + email.join('') + '@' + host.join(''));
      });
  })

})(jQuery); // End of use strict
