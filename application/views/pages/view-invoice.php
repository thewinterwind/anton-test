<h1>Invoice</h1>

<div class="d-flex justify-content-between">
<h3></h3>

<?php if($trans['status'] == 3 ) : ?>
    <h3>Balance: $0</h3>
<?php else :?>
<h3>Balance: $<?php echo $trans['price']; ?></h3>
<?php endif; ?>

</div>

<div class="row">
    <div class="col-md-6">
        <h3>Medicare</h3>
        <h4>IRN: 2952631861</h4>
        <h4>First Name: Bernhardt</h4>
        <h4>Last Name: Griffith</h4>
    </div>

    <div class="col-md-6">
        <h4>Ref: 1</h4>
        <h4>Gender: Male</h4>
        <h4>Date of Birth: 1974-02-28</h4>
        
    </div>

</div>

<table class="table">
    <thead>
        <tr>
            <th>Service Name</th>
            <th>Description Name</th>
            <th>Doctors Comment</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
   
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
    
    </tbody>

</table>