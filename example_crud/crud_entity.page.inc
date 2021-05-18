<?php

/**
 * @file
 * Contains crud_entity.page.inc.
 *
 * Page callback for Crud entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Crud entity templates.
 *
 * Default template: crud_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_crud_entity(array &$variables) {
  // Fetch CrudEntity Entity Object.
  $crud_entity = $variables['elements']['#crud_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
