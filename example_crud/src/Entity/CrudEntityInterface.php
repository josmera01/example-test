<?php

namespace Drupal\example_crud\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Crud entity entities.
 *
 * @ingroup example_crud
 */
interface CrudEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Crud entity name.
   *
   * @return string
   *   Name of the Crud entity.
   */
  public function getName();

  /**
   * Sets the Crud entity name.
   *
   * @param string $name
   *   The Crud entity name.
   *
   * @return \Drupal\example_crud\Entity\CrudEntityInterface
   *   The called Crud entity entity.
   */
  public function setName($name);

  /**
   * Gets the Crud entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Crud entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Crud entity creation timestamp.
   *
   * @param int $timestamp
   *   The Crud entity creation timestamp.
   *
   * @return \Drupal\example_crud\Entity\CrudEntityInterface
   *   The called Crud entity entity.
   */
  public function setCreatedTime($timestamp);

}
