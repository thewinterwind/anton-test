<!DOCTYPE html>
<html>
<head>
    <title>Codeigniter Stripe Payment Integration Example</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">
<script src="<?php echo base_url(); ?>assets/bootstrap.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .card-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">Stripe</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
     
    </ul>
  </div>
</nav>
<div class="container">
     
    <div class="row mt-5">
        <div class="col-md-12 col-md-offset-3">
            <div class="card card-default credit-card-box p-3">
                <div class="card-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="card-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="card-body">
    
                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success text-center my-auto">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p class="my-auto"><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                    <?php } ?>
     
                    <form role="form" action="<?php echo base_url(); ?>stripePost" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                                                    id="payment-form">
     
                        <div class='form-row row'>
                            <div class='col-md-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' type='text' required> 
                            </div>
                        </div>
     
                        <div class='form-row row'>
                            <div class='col-md-12 form-group required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number'
                                    type='text' required>
                            </div>
                        </div>
      
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text' required>
                            </div>
                        </div>
      
                       
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($20)</button>
                            </div>
                        </div>
                             
                    </form>
                </div>
            </div>        
        </div>
    </div>
         
</div>
     
</body>  
     
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
     
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
     
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
    
  });
      
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
</html>