<?php

namespace Drupal\controlled_access_terms\Plugin\Field\FieldWidget;

use Drupal\Core\Field\Plugin\Field\FieldWidget\EntityReferenceAutocompleteTagWidget;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the typed note widget.
 *
 * @FieldWidget(
 *   id = "string_with_Lang",
 *   label = @Translation("String With Language Widget"),
 *   field_types = {
 *     "string_with_lang"
 *   }
 * )
 */
class StringWithLangWidget extends EntityReferenceAutocompleteTagWidget {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $widget = parent::formElement($items, $delta, $element, $form, $form_state);

    $item =& $items[$delta];
    $settings = $item->getFieldDefinition()->getSettings();

    $widget['the_string'] = [
      '#title' => t('String Information'),
      '#type' => 'text',
      '#weight' => -1,
    ];

    return $widget;
  }

}
