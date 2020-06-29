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
<form action="<?php echo base_url('/update-doctor/'. $acct['id']); ?>" method="POST" id="individual">
    <input type="hidden" name="type" value="0">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">First Name:</label>
            <input type="text" name="individual_first_name" class="form-control" value="<?php echo $acct['individual']['first_name'] ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Last Name:</label>
            <input type="text" name="individual_last_name" class="form-control" value="<?php echo $acct['individual']['last_name'] ?>" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Birthdate:</label>
            <?php
                if($acct['individual']['dob']['month'] <= 9){
                    $mm = '0'.$acct['individual']['dob']['month'];
                } else {
                    $mm = $acct['individual']['dob']['month'];
                }
            ?>
            <input type="date" name="individual_birthday" class="form-control" value="<?php echo $acct['individual']['dob']['year'].'-'.$mm.'-'.$acct['individual']['dob']['day'] ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Phone:</label>
            <input type="tel" name="individual_phone" class="form-control" value="<?php echo $acct['individual']['phone'] ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Email:</label>
            <input type="email" name="individual_email" class="form-control"  value="<?php echo $acct['individual']['email'] ?>" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="individual_line_1" placeholder="Line 1"  value="<?php echo $acct['individual']['address']['line1'] ?>" required>
        </div>
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="individual_line_2" placeholder="Line 2" value="<?php echo $acct['individual']['address']['line2'] ?>" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="individual_city" placeholder="City" value="<?php echo $acct['individual']['address']['city'] ?>" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="individual_state" placeholder="State" value="<?php echo $acct['individual']['address']['state'] ?>" required>
        </div>
        <div class="form-group col-md-1">
            <input type="text" class="form-control" name="individual_postal" placeholder="Postal" value="<?php echo $acct['individual']['address']['postal_code'] ?>" required>
        </div>
        <div class="form-group col-md-1">
            <select name="individual_country" class="form-control">
                <option value="AU">AU</option>
                <option value="US">US</option>
            </select>
        </div>  
    </div>

    <!-- <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Account Holder:</label>
            <input type="text" name="individual_account_holder" class="form-control" value="<?php echo $acct['external_accounts']['data'][0]['account_holder_name'] ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Account Type:</label>
            <input type="text" name="individual_account_type" class="form-control" value="<?php echo $acct['external_accounts']['data'][0]['account_holder_type'] ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Routing Number:</label>
            <input type="text" name="individual_routing_number" class="form-control" value="<?php echo $acct['external_accounts']['data'][0]['routing_number'] ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Account Number:</label>
            <input type="text" name="individual_account_number" class="form-control">
        </div>
    </div> -->

    <button class="btn btn-success" type="submit">Update</button>
    <a class="btn btn-danger" href="<?php echo site_url('view-all-doctors') ?>">Cancel</a> 

</form>


<!-- <?php print_r($acct); ?> -->