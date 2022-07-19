<?php

namespace Drupal\payment_results\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class PaymentResultsConfigurationForm.
 *
 * Produces form to make configurable text for goodpayment and badpayment pages.
 *
 */
class PaymentResultsConfigurationForm extends ConfigFormBase
{

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames()
  {
    return [
      'payment_results.paymentresultsconfiguration',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'payment_results_configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = \Drupal::service('config.factory')->getEditable('payment_results.paymentresultsconfiguration');
    $form['good_payment_message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Good payment message'),
      '#description' => $this->t('Message displayed when a payment has been accepted'),
      '#default_value' => $config->get('payment_results.good_payment_message'),
    ];
    $form['good_payment_message_line2'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Good payment message second line'),
      '#description' => $this->t('Message displayed when a payment has been accepted. Second line'),
      '#default_value' => $config->get('payment_results.good_payment_message'),
    ];
    $form['bad_payment_message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Bad payment message'),
      '#description' => $this->t('Message displayed when a bad has been received'),
      '#default_value' => $config->get('payment_results.bad_payment_message'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    parent::submitForm($form, $form_state);
    $config = \Drupal::service('config.factory')->getEditable('payment_results.paymentresultsconfiguration');

    $config
      ->set('payment_results.good_payment_message', $form_state->getValue('good_payment_message'))
      ->set('payment_results.good_payment_message_line2', $form_state->getValue('good_payment_message_line2'))
      ->set('payment_results.bad_payment_message', $form_state->getValue('bad_payment_message'))
      ->save();
  }
}
