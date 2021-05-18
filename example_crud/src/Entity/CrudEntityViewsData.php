<?php

namespace Drupal\example_crud\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Crud entity entities.
 */
class CrudEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
