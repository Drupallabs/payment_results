<?php

namespace Drupal\payment_results\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class BadPaymentController.
 */
class BadPaymentController extends ControllerBase {

  /**
   * Badpayment.
   *
   * Produces a page which says a payment was not successful.
   *
   * @return array
   *   Return Markup array
   */
  public function badPayment() {

    $config = \Drupal::service('config.factory')->getEditable('payment_results.paymentresultsconfiguration');
    $badmessage = $config->get('payment_results.bad_payment_message');
    return [
      '#type' => 'markup',
      '#markup' => $this->t('<div class=paymentresults>' . $badmessage . '</div>')
    ];
  }

}
