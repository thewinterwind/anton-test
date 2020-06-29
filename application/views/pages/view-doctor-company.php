<h1>Update Doctor</h1>

<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success text-center my-auto">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p class="my-auto"><?php echo $this->session->flashdata('success'); ?></p>
    </div>
<?php } ?>

<?php if($this->session->flashdata('error')){ ?>
    <div class="alert alert-danger text-center my-auto">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p class="my-auto"><?php echo $this->session->flashdata('error'); ?></p>
    </div>
<?php } ?>


<!-- Company -->
<form action="<?php echo base_url('/update-doctor/'. $acct['id']); ?>" method="POST" id="company">
    <input type="hidden" name="type" value="1">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Company Name:</label>
            <input type="text" name="company_name" class="form-control" value="<?php echo $acct['business_profile']['name'] ?>" readonly required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Company Email:</label>
            <input type="email" name="company_email" class="form-control" value="<?php echo $acct['email'] ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Phone Number:</label>
            <input type="text" name="company_phone_number" class="form-control" value="<?php echo $acct['company']['phone'] ?>" required>
        </div>
        
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="company_line_1" placeholder="Line 1" value="<?php echo $acct['company']['address']['line1'] ?>" required>
        </div>
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="company_line_2" placeholder="Line 2" value="<?php echo $acct['company']['address']['line2'] ?>" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="company_city" placeholder="City" value="<?php echo $acct['company']['address']['city'] ?>" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="company_state" placeholder="State" value="<?php echo $acct['company']['address']['state'] ?>" required>
        </div>
        <div class="form-group col-md-1">
            <input type="text" class="form-control" name="company_postal" placeholder="Postal" value="<?php echo $acct['company']['address']['postal_code'] ?>" required>
        </div>
        <div class="form-group col-md-1">
            <select name="company_country" class="form-control" required>
                <option value="AU">AU</option>
                <option value="US">US</option>
            </select>
        </div>  
    </div>

    <!-- <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Account Holder:</label>
            <input type="text" name="company_account_holder" class="form-control" value="<?php echo $acct['external_accounts']['data'][0]['account_holder_name'] ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Account Type:</label>
            <input type="text" name="company_account_type" class="form-control" value="<?php echo $acct['external_accounts']['data'][0]['account_holder_type'] ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Routing Number:</label>
            <input type="text" name="company_routing_number" class="form-control" value="<?php echo $acct['external_accounts']['data'][0]['routing_number'] ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Account Number:</label>
            <input type="text" name="company_account_number" class="form-control">
        </div>
    </div> -->


    <button class="btn btn-success mb-5" type="submit">Update</button> 
    <a class="btn btn-danger mb-5" href="<?php echo site_url('view-all-doctors') ?>">Cancel</a> 
</form>

<!-- <?php print_r($acct['company']['phone']); ?>

<?php echo '<br><br><br><br><br>'; ?>
<?php print_r($acct); ?> -->

