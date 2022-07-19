<?php

namespace Drupal\payment_results\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class GoodPaymentController.
 *
 * Proces a page saying a successful payment was made
 *
 */
class GoodPaymentController extends ControllerBase {

  /**
   * Goodpayment.
   *
   * @return array
   *   Return Markup array
   */
  public function goodPayment() {

    $config = \Drupal::service('config.factory')->getEditable('payment_results.paymentresultsconfiguration');
    $goodmessage = $config->get('payment_results.good_payment_message');
    $goodmessage_line2 = $config->get('payment_results.good_payment_message_line2');
    
    return [
      '#type' => 'markup',
      '#markup' => $this->t('<div class=paymentresults>' . $goodmessage . '</div>' . '<div class=paymentresultsline2>' . $goodmessage_line2 . '</div>')
    ];
  }

}
