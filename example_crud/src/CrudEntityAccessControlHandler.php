<?php

namespace Drupal\example_crud;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Crud entity entity.
 *
 * @see \Drupal\example_crud\Entity\CrudEntity.
 */
class CrudEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\example_crud\Entity\CrudEntityInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished crud entity entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published crud entity entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit crud entity entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete crud entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add crud entity entities');
  }


}
