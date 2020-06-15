<script src="https://js.stripe.com/v3/"></script>
<div id="payment-request-button">
  <!-- A Stripe Element will be inserted here. -->
</div>


<script>
    var stripe = Stripe('pk_test_7neec305ANOc3kX0BZhA1oC300Oj8rZOV7');
    var paymentRequest = stripe.paymentRequest({
    country: 'US',
    currency: 'usd',
    total: {
        label: 'Demo total',
        amount: 1099,
    },
    requestPayerName: true,
    requestPayerEmail: true,
    });

    var elements = stripe.elements();
    var prButton = elements.create('paymentRequestButton', {
    paymentRequest: paymentRequest,
    });

    // Check the availability of the Payment Request API first.
    paymentRequest.canMakePayment().then(function(result) {
    if (result) {
        prButton.mount('#payment-request-button');
    } else {
        document.getElementById('payment-request-button').style.display = 'none';
    }
    });


    paymentRequest.on('paymentmethod', function(ev) {
    // Confirm the PaymentIntent without handling potential next actions (yet).
    stripe.confirmCardPayment(
        clientSecret,
        {payment_method: ev.paymentMethod.id},
        {handleActions: false}
    ).then(function(confirmResult) {
        if (confirmResult.error) {
        // Report to the browser that the payment failed, prompting it to
        // re-show the payment interface, or show an error message and close
        // the payment interface.
        ev.complete('fail');
        } else {
        // Report to the browser that the confirmation was successful, prompting
        // it to close the browser payment method collection interface.
        ev.complete('success');
        // Let Stripe.js handle the rest of the payment flow.
        stripe.confirmCardPayment(clientSecret).then(function(result) {
            if (result.error) {
            // The payment failed -- ask your customer for a new payment method.
            } else {
            // The payment has succeeded.
            }
        });
        }
    });
    });

    elements.create('paymentRequestButton', {
  paymentRequest: paymentRequest,
  style: {
    paymentRequestButton: {
      type: 'default',
      // One of 'default', 'book', 'buy', or 'donate'
      // Defaults to 'default'

      theme: 'dark',
      // One of 'dark', 'light', or 'light-outline'
      // Defaults to 'dark'

      height: '64px'
      // Defaults to '40px'. The width is always '100%'.
    },
  },
});
paymentRequest.show();
</script>