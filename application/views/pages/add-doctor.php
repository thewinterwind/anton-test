<div class="row d-flex justify-content-between">
<h1>Add Doctor</h1>

<select id="type">
    <option value="1">Company</option>
    <option value="0">Individual</option>
</select>
</div>

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


<form action="<?php echo base_url('/add-doctors-account'); ?>" method="POST" id="individual" hidden>
    <input type="hidden" name="type" value="0">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">First Name:</label>
            <input type="text" name="individual_first_name" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Last Name:</label>
            <input type="text" name="individual_last_name" class="form-control" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Birthdate:</label>
            <input type="date" name="individual_birthday" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Phone:</label>
            <input type="tel" name="individual_phone" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Email:</label>
            <input type="email" name="individual_email" class="form-control" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="individual_line_1" placeholder="Line 1" required>
        </div>
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="individual_line_2" placeholder="Line 2" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="individual_city" placeholder="City" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="individual_state" placeholder="State" required>
        </div>
        <div class="form-group col-md-1">
            <input type="text" class="form-control" name="individual_postal" placeholder="Postal" required>
        </div>
        <div class="form-group col-md-1">
            <select name="individual_country" class="form-control">
                <option value="AU">AU</option>
                <option value="US">US</option>
            </select>
        </div>  
    </div>

    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Account Holder:</label>
            <input type="text" name="account_holder" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Account Type:</label>
            <input type="text" name="account_type" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Routing Number:</label>
            <input type="text" name="routing_number" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Account Number:</label>
            <input type="text" name="account_number" class="form-control" required>
        </div>
    </div>

    <button class="btn btn-success" type="submit">Submit</button>
</form>





















<!-- Company -->
<form action="<?php echo base_url('/add-doctors-account'); ?>" method="POST" id="company">
    <input type="hidden" name="type" value="1">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Company Name:</label>
            <input type="text" name="company_name" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Company Email:</label>
            <input type="email" name="company_email" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Phone Number:</label>
            <input type="text" name="company_phone_number" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">ABN:</label>
            <input type="text" name="company_tax_id" class="form-control" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="company_line_1" placeholder="Line 1" required>
        </div>
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="company_line_2" placeholder="Line 2" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="company_city" placeholder="City" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="company_state" placeholder="State" required>
        </div>
        <div class="form-group col-md-1">
            <input type="text" class="form-control" name="company_postal" placeholder="Postal" required>
        </div>
        <div class="form-group col-md-1">
            <select name="company_country" class="form-control" required>
                <option value="AU">AU</option>
                <option value="US">US</option>
            </select>
        </div>  
    </div>

    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Account Holder:</label>
            <input type="text" name="company_account_holder" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Account Type:</label>
            <input type="text" name="company_account_type" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Routing Number:</label>
            <input type="text" name="company_routing_number" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Account Number:</label>
            <input type="text" name="company_account_number" class="form-control" required>
        </div>
    </div>




    <!-- Company Reprensentative -->
    <!-- <div class="form-group border-primary pt-5">
    <h6> Company Representative: </h6>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">First Name:</label>
            <input type="text" name="representative_first_name" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Last Name:</label>
            <input type="text" name="representative_last_name" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Title:</label>
            <input type="text" name="representative_title" class="form-control" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Birthdate:</label>
            <input type="date" name="representative_birthday" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Phone:</label>
            <input type="tel" name="representative_phone" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Email:</label>
            <input type="email" name="representative_email" class="form-control" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="representative_line_1" placeholder="Line 1" required>
        </div>
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="representative_line_2" placeholder="Line 2" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="representative_city" placeholder="City" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="representative_state" placeholder="State" required>
        </div>
        <div class="form-group col-md-1">
            <input type="text" class="form-control" name="representative_postal" placeholder="Postal" required>
        </div>
        <div class="form-group col-md-1">
            <select name="representative_country" class="form-control" required>
                <option value="AU">AU</option>
                <option value="US">US</option>
            </select>
        </div>  
    </div>
    </div> -->

    <!-- Company Director -->
    <!-- <div class="form-group border-primary pt-5">
    <h6> Company Director: </h6>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">First Name:</label>
            <input type="text" name="director_first_name" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Last Name:</label>
            <input type="text" name="director_last_name" class="form-control" required>
        </div>
        <div class="form-group col-md-2">
            <label for="">Title:</label>
            <input type="text" name="director_title" class="form-control" required>
        </div>
        <div class="form-group col-md-2">
            <label for="">Email:</label>
            <input type="email" name="director_email" class="form-control" required>
        </div>
        <div class="form-group col-md-2">
            <label for="">Birthdate:</label>
            <input type="date" name="director_birthday" class="form-control" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="director_line_1" placeholder="Line 1" required>
        </div>
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="director_line_2" placeholder="Line 2" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="director_city" placeholder="City" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="director_state" placeholder="State" required>
        </div>
        <div class="form-group col-md-1">
            <input type="text" class="form-control" name="director_postal" placeholder="Postal" required>
        </div>
        <div class="form-group col-md-1">
            <select name="director_country" class="form-control" required>
                <option value="AU">AU</option>
                <option value="US">US</option>
            </select>
        </div>  
    </div>

    </div> -->




    <!-- Company Owner -->
    <!-- <div class="form-group border-primary pt-5">
    <h6> Company Owner: </h6>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">First Name:</label>
            <input type="text" name="owner_first_name" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Last Name:</label>
            <input type="text" name="owner_last_name" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Email:</label>
            <input type="text" name="owner_title" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="">Birthdate:</label>
            <input type="date" name="owner_birthday" class="form-control" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="owner_line_1" placeholder="Line 1" required>
        </div>
        <div class="form-group col-md-3">
            <input type="text" class="form-control" name="owner_line_2" placeholder="Line 2" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="owner_city" placeholder="City" required>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="owner_state" placeholder="State" required>
        </div>
        <div class="form-group col-md-1">
            <input type="text" class="form-control" name="owner_postal" placeholder="Postal" required>
        </div>
        <div class="form-group col-md-1">
            <select name="owner_country" class="form-control">
                <option value="AU">AU</option>
                <option value="US">US</option>
            </select>
        </div>  
    </div> -->

    <!-- </div> -->

    <button class="btn btn-success mb-5" type="submit">Submit</button>
</form>




<script>
  $('#type').change(function(){
      var type = $(this).val();

      if(type == 0){
        $('#company').attr('hidden', true);
        $('#individual').attr('hidden', false);
      } else {
        $('#company').attr('hidden', false);
        $('#individual').attr('hidden', true);
      }

  });
</script>