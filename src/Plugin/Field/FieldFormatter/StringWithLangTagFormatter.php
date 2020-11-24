<?php

namespace Drupal\controlled_access_terms\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceLabelFormatter;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'StringWithLangTagFormatter'.
 *
 * @FieldFormatter(
 *   id = "string_with_lang_tag_default",
 *   label = @Translation("String with Language Tag Formatter"),
 *   field_types = {
 *     "string_with_lang_tag"
 *   }
 * )
 */
class StringWithLangTagFormatter extends EntityReferenceLabelFormatter {
}
