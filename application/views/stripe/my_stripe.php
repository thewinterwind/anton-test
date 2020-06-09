  
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
         
