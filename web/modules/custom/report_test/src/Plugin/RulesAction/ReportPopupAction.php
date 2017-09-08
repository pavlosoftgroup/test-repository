<?php

namespace Drupal\report_test\Plugin\RulesAction;

use Drupal\rules\Core\RulesActionBase;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Core\Ajax\AjaxResponse;

/**
 * Provides a 'Report Popup' action.
 *
 * @RulesAction(
 *   id = "rules_report_popup",
 *   label = @Translation("Report Popup"),
 *   category = @Translation("Custom"),
 *   context = {
 *     "Message" = @ContextDefinition("any",
 *       label = @Translation("Value"),
 *       description = @Translation("Show popup after submit node form"),*     )
 *   }
 * )
 */
class ReportPopupAction extends RulesActionBase {

  protected function doExecute($node ) {

//    $response = new AjaxResponse();

    drupal_set_message(t('You have been redirected because...'), 'status', TRUE);

    kint($node);
    $response = \Drupal\report_test\Controller\ReportTestController::reportAjaxCallback();
    kint($response);
//    $response->send();




    exit;

//    $title = 'Popup Title';
//    $title = $value;
//    kint($title);
//    $response = new RedirectResponse('/report_test/modal/nojs');
//    $response->send();
//    exit;
//    return $response;
  }

}

