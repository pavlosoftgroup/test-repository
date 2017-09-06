(function ($) {
  Drupal.behaviors.ReportForm = {
    attach: function (context, settings) {
      try {
        $("select.reporter-list").msDropDown();
      }
      catch (e) {
        alert(e.message);
      }
      try {
        $('input.datepicker').datepicker({
          dateFormat: 'mm/dd/yy'
        });

      }
      catch (e) {
        alert(e.message);

      }
      if (!Modernizr.inputtypes.date) {
        $('input[type=date]').datepicker({
          dateFormat: 'mm/dd/yy'
        });
      }
    }
  };
})(jQuery);