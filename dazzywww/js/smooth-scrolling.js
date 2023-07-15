$(document).ready(function() {
    $('a[href^="#"]').on('click', function(event) {
      if (this.hash !== "" && this.hash.indexOf("#") === 0) {
        event.preventDefault();

        var hash = this.hash;

        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function() {
          window.location.hash = hash;
        });
      } else {
        $('html, body').animate({
          scrollTop: 0
        }, 900);
      }
    });
  });  