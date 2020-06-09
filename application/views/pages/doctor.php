<h1>Doctor Page</h1>

<h5>Requested Prescription</h5>


<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($medications as $med) : ?>
            <?php  if($med['status'] == 1) : ?>
                <tr>
                    <td> <?php echo $med['name']; ?> </td>
                    <td> <?php echo $med['description']; ?> </td>
                    <td> 
                        <a class="btn btn-warning text-white" href="<?php echo site_url('view-requested-prescription/'. $med['id']); ?>">Requested</a>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>


<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success text-center my-auto">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p class="my-auto"><?php echo $this->session->flashdata('success'); ?></p>
    </div>
<?php } ?>
<?php if (count($transactions) != 0) : ?>

<h5 class="mt-5 pt-5">Transactions</h5>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Doctor's Comment</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($transactions as $trans) : ?>
        <tr>
            <td> <?php echo $trans['name']; ?> </td>
            <td> <?php echo $trans['description']; ?> </td>
            <td> <?php echo $trans['doctors_comment']; ?> </td>
            <td> <?php echo $trans['price']; ?> </td>
            <td>
                <?php  if($trans['status'] == 2 ) : ?>
                    <a class=" bg-warning text-black">Awaiting Payment</a> 
                <?php  else : ?>
                    <a class=" bg-success text-white">Paid</a> 
                <?php  endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php endif; ?>