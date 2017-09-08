<?php

namespace Drupal\report_test\Plugin\RulesAction;

use Drupal\rules\Core\RulesActionBase;

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
  protected function doExecute($node) {
    drupal_set_message(t('Action Rules is Done'), 'status', TRUE);
    \Drupal\report_test\Controller\ReportTestController::index();
  }

}

