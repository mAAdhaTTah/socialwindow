var socwin = socwin || {};

(function($) {
'use strict';

socwin.header = (function() {
  var $header;
  var $banner;
  var url;

  function setUpVariables() {
    $header = $('[data-socwin-header-container]');
    $banner= $('[data-socwin-header-banner]');

  }

  function getImageURL() {
    if (url) { return url; }

    if (window.matchMedia('(max-width: 48.75em)').matches) {
     url = $header.data('bg-image-small');
    } else if (window.matchMedia('(max-width: 64em)').matches) {
     url = $header.data('bg-image-medium');
    } else if (window.matchMedia('(max-width: 90em)').matches) {
     url = $header.data('bg-image-large');
    } else {
      url = $header.data('bg-image-default');
    }

    return url;
  }

  function animation() {
    $header.velocity('fadeIn', { duration: 700 });

    $banner
      .velocity('fadeIn',{ duration: 250, delay: 250 })
      .find('[data-socwin-icon]')
      .each(function(i) {
        var $this = $(this);
        $this
          .velocity('fadeIn', {
            duration: 400,
            delay: (i * 200) + 500
          })
          .velocity('fadeOut', {
            duration: 400,
            delay: 200,
            visibility: 'hidden',
            display: ''
          });
      })
      .velocity({
        opacity: [1, 0]
      }, {
        duration: 'slow',
        visibility: ''
      });
  }

  return function(animate) {
    setUpVariables();

    var image = new Image();

    image.onload = function() {
      $header.css('background-image', 'url(' + getImageURL() + ')');

      if (animate) {
        setTimeout(animation, 200);
      }

    };
    image.src = getImageURL();
  };
})();

})(jQuery);
