<?php

namespace Drupal\controlled_access_terms\Plugin\Field\FieldType;

use Drupal\Core\Field\Plugin\Field\FieldType\EntityReferenceItem;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Implements a String With Lang Tag field.
 *
 * @FieldType(
 *   id = "string_with_lang_tag"
 *   label = @Translation("String With Language Tag"),
 *   module = "idc_field_widgets",
 *   description = @Translation("Implements a string field with a language tag attached"),
 *   default_formatter = "string_with_lang_tag_default",
 *   default_widget = "string_with_lang_tag_default",
 *   list_class = "\Drupal\Core\Field\EntityReferenceFieldItemList",
 * )
 */
class StringWithLangTag extends EntityReferenceItem {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = parent::schema($field_definition);
    $schema['columns']['the_string'] = [
      'type' => 'text',
      'size' => 'tiny',
    ];

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = parent::propertyDefinitions($field_definition);
    //@TODO - limit the taxonomy for the Entity Ref to just Language
    $properties['the_string'] = DataDefinition::create('string')
      ->setLabel(t('Type'))
      ->setRequired(TRUE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $parentEmpty = parent::isEmpty();

    // All must have a value.
    if ($this->the_string !== NULL &&
         !empty($this->the_string) &&
         !($parentEmpty)
       ) {
      return FALSE;
    }

    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    return ['the_string' => []] + parent::defaultFieldSettings();
  }
