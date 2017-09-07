<?php

namespace Drupal\report_test\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Entity\Query\QueryFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Form\FormStateInterface;


/**
 * Class ReporttTestController.
 */
class ReportTestController extends ControllerBase {

  /**
   * @var QueryFactory
   */
  protected $queryFactory;

  /**
   * @var EntityTypeManager
   */
  protected $entityTypeManager;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity.query'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * Generates an example page.
   */
  public function demo() {
    return [
      '#markup' => t('Hello World!'),
    ];
  }


  /**
   * Realisation ajax callback for report creat/edit form.
   */
  public static function reportAjaxCallback() {

    $title = 'Popup title';
    //  $description = $form_state->getValue('body');
    //      kint($date);
    $response = new AjaxResponse();

    $response->addCommand(new OpenModalDialogCommand($title, 'ASDASDADAD', [
      'dialogClass' => 'popup-dialog-class',
      'width' => '400',
      'height' => '400',
    ]));
        $response->send();
        exit;
//    return $response;


  }


  /**
   * Content.
   *
   * @return string
   *   Return Hello string.
   */
  public function content(Request $request) {
    $node = $this->entityManager()->getStorage('node')->create([
      'type' => 'report_user',
    ]);
    $node_create_form = $this->entityFormBuilder()->getForm($node);

    return [
      '#type' => 'markup',
      '#attributes' => [],
      '#markup' => render($node_create_form),
    ];
  }

}
