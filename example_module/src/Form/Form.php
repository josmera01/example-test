<?php

namespace Drupal\example_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Form.
 */
class Form extends FormBase {

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
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'formtest';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#required' => true,
      '#title' => $this->t('Name')
    ];

    $form['id_user'] = [
      '#type' => 'number',
      'required' => true,
      '#title' => $this->t('ID')
    ];

    $form['date'] = [
      '#type' => 'date',
      '#title' => $this->t('Date')
    ];

    $form['jobs'] = [
      '#type' => 'select',
      '#title' => $this->t('Jobs'),
      '#options' => [
        'Administrador',
        'WebMaster',
        'Desarrollador'
      ]
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    $date = $status =  0;

    if (!empty($form_state->getValue('date'))) {
      $date = strtotime($form_state->getValue('date'));
    }

    // Check if user is not admin.
    $current_user_roles = \Drupal::currentUser()->getRoles();
    if (in_array('administrator', $current_user_roles)) {
      $status = 1;
    }

    $this->database->insert('example_users')
      ->fields([
        'name' => $form_state->getValue('name'),
        'id_user' => $form_state->getValue('id_user'),
        'date' => $date,
        'jobs' => $form_state->getValue('jobs'),
        'status' => $status
      ])
      ->execute();
    \Drupal::messenger()->addMessage($this->t('Save you changes'), 'status');

  }

}
