<?php

namespace Drupal\idc_field_widgets\Plugin\Field\FieldWidget;

use Drupal\Core\Field\Plugin\Field\FieldWidget\EntityReferenceAutocompleteWidget;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the typed note widget.
 *
 * @FieldWidget(
 *   id = "string_with_lang_tag_default",,
 *   label = @Translation("String With Language Tag Widget"),
 *   field_types = {
 *     "string_with_lang_tag"
 *   }
 * )
 */
class StringWithTagLangWidget extends EntityReferenceAutocompleteTagWidget {
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $widget = parent::formElement($items, $delta, $element, $form, $form_state);

    $item =& $items[$delta];
    $settings = $item->getFieldDefinition()->getSettings();

    /* @TODO use these to adjust the entity reference */
    // '#target_type' => 'taxonomy_term',
    // '#selection_settings' => array(
    //  'target_bundles' => array('taxonomy_term', 'language'),
    //  )
    
    $widget['the_string'] = [
      '#type' => 'textfield',
      '#placeholder' => "a string",
      '#default_value' => isset($item->the_string) ? $item->the_string : '',
      '#title' => t('The String'),
      '#weight' => -1
    ];

    return $widget;
  }

}
