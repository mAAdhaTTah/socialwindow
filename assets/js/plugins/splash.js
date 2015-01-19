var swSplash;

(function($){
  swSplash = {
    init: function() {
      this.$header = $("#splash");
      this.$banner = $(".banner");
      this.$nav = $(".nav-container");
      this.$window = $(window);

      this.resize();
      this.$window.stellar({
        horizontalScrolling: false,
        responsive: true,
        hideDistantElements: true,
      });

      this.$window.resize(_.debounce($.proxy(this.resize, this), 250));
    },

    resize: function() {
      this.$header.height(this.$window.height() + this.$nav.outerHeight());
      this.$header.width(this.$window.width());
    }
  };
})(jQuery);
