<?php

namespace Drupal\report_test\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Entity\User;
use Drupal\image\Entity\ImageStyle;

/**
 * Plugin implementation of the 'entity_reference_reporter' widget.
 *
 * @FieldWidget(
 *   id = "entity_reference_reporter",
 *   label = @Translation("Reporter field widget"),
 *   field_types = {
 *     "entity_reference"
 *   }
 * )
 */
class ReporterFieldWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
        'size' => 60,
      ] + parent::defaultSettings();
    //    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = [];

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function getUserArray() {

    $ids = \Drupal::entityQuery('user')
      ->condition('status', 1)
      ->execute();

    if (empty($ids)) {
      return FALSE;
    }

    $users = User::loadMultiple($ids);
    $userList = [];
    foreach ($users as $key => $user) {
      if (!empty($user->user_picture) && $user->user_picture->isEmpty() === FALSE) {
        $image = $user->get('user_picture')->entity->url();
      }
      else {
        $source_file_uri = drupal_get_path('module', 'report_test') . '/images';
        $image_path = $GLOBALS['base_url'] . '/' . $source_file_uri . '/drush_logo.png';
        //        $image = \Drupal\image\Entity\ImageStyle::load('medium')->buildUrl($image_path);
        $image = ImageStyle::load('thumbnail')
          ->buildUrl('public://drush_logo.png');
      }
      $name = $user->name->value;
      $mail = $user->mail->value;
      $userList['options'][$key] = '<b>' . $name . '</b><div>' . $mail . '</div>';
      $userList['attributes'][$key] = ['data-image' => $image];
    }

    return $userList;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $node = \Drupal::routeMatch()->getParameter('node');
    $target_id = isset($node) ? $node->get('field_reporter')->getValue() : 0;


    $userList = $this->getUserArray();
    $options = isset($userList) ? $userList['options'] : [];
    $attributes = isset($userList) ? $userList['attributes'] : [];

    $element['reporter'] = $element + [
        '#type' => 'select',
        '#title' => t('Reporter'),
        '#empty_option' => $this->t('Select Reporter'),
        '#options' => $options,
        '#options_attributes' => $attributes,
        '#default_value' => $target_id,
        '#attached' => [
          'library' => [
            'report_test/global-styling',
          ],
        ],
        '#attributes' => [
          'class' => [
            'reporter-list',
          ],
        ],
      ];

    return $element;
  }

}
