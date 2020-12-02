<?php

namespace Drupal\idc_field_widgets\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceLabelFormatter;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'StringWithLangTagFormatter'.
 *
 * @FieldFormatter(
 *   id = "string_with_lang_tag_formatter",
 *   label = @Translation("String with Language Tag Formatter"),
 *   field_types = {
 *     "string_with_lang_tag"
 *   }
 * )
 */
class StringWithLangTagFormatter extends EntityReferenceLabelFormatter {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $elements = parent::viewElements($items, $langcode);
    foreach ($items as $key => $item) {
      print_r("Key is '$key': '$item'");
      $elements[$key]['#prefix'] = $item->the_string . '  (';
      $elements[$key]['#suffix'] = ')';
    }

    print_r($elements);
    return $elements;
  }
}
