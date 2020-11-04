<?php

namespace Drupal\idc_field_widgets\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceLabelFormatter;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'StringWithLangFormatter'.
 *
 * @FieldFormatter(
 *   id = "string_with_lang_default",
 *   label = @Translation("String with Language Formatter"),
 *   field_types = {
 *     "string_with_lang"
 *   }
 * )
 */
class StringWithLangFormatter extends EntityReferenceLabelFormatter {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = parent::viewElements($items, $langcode);

    foreach ($items as $key => $item) {
      $elements[$key]['#prefix'] = $item->the_string . '  (';
      $elements[$key]['#suffix'] = ')';
    }

    return $elements;
  }
}
