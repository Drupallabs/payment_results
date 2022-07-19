# About
Generates pages to show if a payment has been successful.

To send to a good payment page use : return $this->redirect('payment_results.good_payment_controller_goodPayment')

To send to a bad payment page use : return $this->redirect('payment_results.bad_payment_controller_badPayment')

Provides a configuration page to set text for the above pages at: /admin/config/payment_results/paymentresultsconfiguration