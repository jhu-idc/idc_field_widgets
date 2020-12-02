<?php

namespace Drupal\idc_field_widgets\Plugin\Field\FieldType;

use Drupal\Core\Field\Plugin\Field\FieldType\EntityReferenceItem;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Implements a String With Language Tag field.
 *
 * @FieldType(
 *   id = "string_with_lang_tag",
 *   label = @Translation("String With Language Tag"),
 *   module = "idc_field_widgets",
 *   description = @Translation("Implements a string field with a language tag attached"),
 *   default_formatter = "string_with_lang_tag_formatter",
 *   default_widget = "string_with_lang_tag_widget",
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
      'type' => 'varchar_ascii',
      'length' => '512',
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
  public static function getPreconfiguredOptions() {
       return [];
  }

/**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    return ['the_string' => []] + parent::defaultFieldSettings();
  }

  /**
   * Callback for settings form.
   *
   * @param array $element
   *   An associative array containing the properties and children of the
   *   generic form element.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form for the form this element belongs to.
   *
   * @see \Drupal\Core\Render\Element\FormElement::processPattern()
   */
  public static function validateValues(array $element, FormStateInterface $form_state) {

      // We may want to validate key values in the future...
    //  $form_state->setValueForElement($element, $values);
  }
}
