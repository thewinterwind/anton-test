<?php if (count($invoices) != 0) : ?>

<h5 class="mt-5 pt-5">Invoices</h5>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Doctor's Comment</th>
            <th>Price</th>
            <th>Status</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($invoices as $trans) : ?>
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
            <td>
                <a href="<?php echo site_url('viewInvoice/'. $trans['medication_id']); ?>" class="btn btn-primary">View</a>
            </td>
          
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php else : ?>

<h1>No Invoices </h1>

<?php endif; ?>



