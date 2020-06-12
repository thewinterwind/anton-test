<h1>Test Form API</h1>


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


<form action="<?php echo base_url('/verifyRequest'); ?>" method="POST">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Verify:</label>
            <select name="verify" class="form-control" required>
                <option value="Medicare">Medicare</option>
                <option value="DVA">DVA</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="">Ref No.:</label>
            <input type="number" name="ref" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Medicare no/IRN:</label>
            <input type="text" name="irn" class="form-control" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">First Name:</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Last Name:</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">Birthdate:</label>
            <input type="date" name="birthday" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Gender:</label>
            <select name="gender" class="form-control" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Verify</button>
</form>


