(function($) {
  "use strict";

  var $container = $('.casts-thumbnails');

  $container.isotope({
    // options
    itemSelector: '.casts-thumbnails__item',
    layoutMode: 'fitRows',
    filter: '*',
    animationEngine: 'best-available',
    animationOptions: {
      duration: 750,
      easing: 'linear',
      queue: false
    },
    masonry: {}
  });

  // layout Isotope again after all images have loaded
  $container.imagesLoaded(function() {
    setColumns();
    $container.isotope('layout');
  });

  function setColumns() {
    var winWidth = $(window).width(),
      columnNumber = getColumnNumber(),
      itemWidth = Math.floor(winWidth / columnNumber);

    $container.find('.casts-thumbnails__item').each(function() {
      $(this).css({
        width: itemWidth + 'px'
      });
    });
  }

  function getColumnNumber() {
    var winWidth = $(window).width(),
      columnNumber = 1;

    if (winWidth > 1200) {
      columnNumber = 5;
    } else if (winWidth > 950) {
      columnNumber = 4;
    } else if (winWidth > 600) {
      columnNumber = 3;
    } else if (winWidth > 400) {
      columnNumber = 2;
    } else if (winWidth > 250) {
      columnNumber = 1;
    }
    return columnNumber;
  }

})(jQuery);
