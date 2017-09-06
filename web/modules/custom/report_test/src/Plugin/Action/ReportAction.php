<?php

namespace Drupal\report_test\Plugin\Action;

use Drupal\rules\Core\RulesActionBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;


/**
 * Provides a 'Show popup' action.
 *
 * @Action(
 *   id = "rules_report=[_action",
 *   label = @Translation(" * Provides a 'Show popup' action.
),
 *   category = @Translation("Custom"),
 *   context = {...}
 *   }
 * )
 */
class ReportAction extends RulesActionBase {

  /**
   * {@inheritdoc}
   */
  public function execute() {
    $title = 'Popup Title';
    $response = new AjaxResponse();
    $response->addCommand(new OpenModalDialogCommand($title, 'ASDASDADAD', [
      'dialogClass' => 'popup-dialog-class',
      'width' => '400',
      'height' => '400',
    ]));
    return $response;

  }

}

