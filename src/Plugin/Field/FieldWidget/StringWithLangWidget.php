<?php

namespace Drupal\idc_field_widgets\Plugin\Field\FieldWidget;

use Drupal\Core\Field\Plugin\Field\FieldWidget\EntityReferenceAutocompleteWidget;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the typed note widget.
 *
 * @FieldWidget(
 *   id = "string_with_lang_default",
 *   label = @Translation("String With Language Widget"),
 *   field_types = {
 *     "string_with_lang"
 *   }
 * )
 */
class StringWithLangWidget extends EntityReferenceAutocompleteWidget {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $widget = parent::formElement($items, $delta, $element, $form, $form_state);

    $item =& $items[$delta];
    $settings = $item->getFieldDefinition()->getSettings();

    $widget['the_string'] = [
      '#type' => 'textfield',
      '#target_type' => 'taxonomy_term',
      '#selection_settings' => array(
        'target_bundles' => array('taxonomy_term', 'language'),
      ),
      '#placeholder' => "a string",
      '#title' => t('The String'),
      '#weight' => -1
    ];

    return $widget;
  }

}
