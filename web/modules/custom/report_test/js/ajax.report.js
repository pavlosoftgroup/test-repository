(function ($, Drupal, drupalSettings) {

  'use strict';

  Drupal.behaviors.reportTestPopup = {
    attach: function (context, settings) {
      var reportModal = Drupal.dialog('<div>Modal content</div>', {
        title: 'Modal after Rules Action',
        dialogClass: 'popup-modal',
        width: 500,
        height: 400,
        autoResize: true,
        close: function (event) {
          $(event.target).remove();
        },
        buttons: [
          {
            text: 'Close the window',
            icons: {
              primary: 'ui-icon-close'
            },
            click: function () {
              $(this).dialog('close');
            }
          }
        ]
      });
      reportModal.showModal();
    }
  }

}(jQuery, Drupal, drupalSettings));