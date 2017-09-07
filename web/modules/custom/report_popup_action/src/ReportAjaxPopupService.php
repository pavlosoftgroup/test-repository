<?php

namespace Drupal\report_popup_action;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class ReportAjaxPopupService.
 */
class ReportAjaxPopupService implements ReportAjaxPopup {

  /**
   * Constructs a new ReportAjaxPopupService object.
   */
  public function __construct() {


  }

  public function reportPopupAjaxCallback() {

    $title = 'Popup title';
    //  $description = $form_state->getValue('body');
    //      kint($date);
    $response = new AjaxResponse();
    drupal_set_message(t('deeweeeeeeewwwwwwwwwweeeeeeeeeeweeeeeeeeeee'), 'status', TRUE);


    $response->addCommand(new OpenModalDialogCommand($title, 'ASDASDADAD', [
      'dialogClass' => 'popup-dialog-class',
      'width' => '400',
      'height' => '400',
    ]));
//    $response->setAttachments();
//    $response->send();
//    kint($response);
//    exit;
        return $response;
//        return new Response($response);



  }


}
