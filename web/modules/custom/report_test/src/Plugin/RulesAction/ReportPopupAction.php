<?php

namespace Drupal\report_test\Plugin\RulesAction;

use Drupal\rules\Core\RulesActionBase;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

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

  protected function doExecute($value) {


    $title = 'Popup Title';
    $title = $value;
    kint($title);
    drupal_set_message(t('You have been redirected because...'), 'status', TRUE);
    $response = new RedirectResponse('/report_test/modal');
    $response->send();
//    exit;
  }

}

