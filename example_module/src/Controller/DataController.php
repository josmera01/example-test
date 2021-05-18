<?php

namespace Drupal\example_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class DataController.
 */
class DataController extends ControllerBase {

  /**
   * Drupal\Core\Database\Driver\mysql\Connection definition.
   *
   * @var \Drupal\Core\Database\Driver\mysql\Connection
   */
  protected $database;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->database = $container->get('database');
    return $instance;
  }

  /**
   * Get.
   *
   * @return string
   *   Return Hello string.
   */
  public function get() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: get')
    ];
  }

}
