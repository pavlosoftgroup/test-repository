(function($) {
  Drupal.behaviors.reportAjax = {
    'attach': function(context) {
            console_log(resporse.data);
      $('body', context)
          .addClass('mymodule-processed')
          .bind('click', function() {
            $.get('/report_test/modal/nojs', null);
            return false;
          });
    }
  };

  var imageDetails = function(response) {
    $('div.message').html(response.data);
  }
})(jQuery);
