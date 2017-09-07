<?php

namespace Drupal\report_popup_action\Plugin\RulesAction;

use Drupal\node\NodeInterface;
use Drupal\rules\Core\RulesActionBase;
use Symfony\Component\HttpFoundation\Response;


/**
 * Provides a 'Report Popup Ajax' action.
 *
 * @RulesAction(
 *   id = "report_popup_action",
 *   label = @Translation("Report Popup Ajax"),
 *   category = @Translation("Node"),
 *   context = {
 *     "entity" = @ContextDefinition("entity",
 *       label = @Translation("entity"),
 *       description = @Translation("Specifies the node.")
 *     )
 *   }
 * )
 */
class ReportPopupRulesAction extends RulesActionBase {
  /**
   * The plugin configuration.
   *
   * @var array
   */
  protected $configuration;

  /**
   * Deletes the Entity.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *    The entity to be deleted.
   */
  protected function doExecute(NodeInterface $entity) {
    kint($entity);
    drupal_set_message(t('1111111111111ddddddddddZZ'), 'status', TRUE);
    $book_list = \Drupal::service('report_popup_action.default')->reportPopupAjaxCallback();

    kint($book_list);
    return $book_list;
//    return new Response($book_list);

  }

}
