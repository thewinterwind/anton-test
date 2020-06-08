<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>

<script src="https://js.stripe.com/v3/"></script>
<div id="payment-request-button">
  <!-- A Stripe Element will be inserted here. -->
</div>

<script src="<?php echo base_url(); ?>assets/bootstrap.js"></script>


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

</script>



</body>
</html>