<style>

.sub-header{
    font-size: 18px;
}

</style>
<div class="d-flex justify-content-between">

<span class="sub-header">TAX INVOICE/RECEIPT</span>

<h4>Invoice Number: INV-<?php echo$trans['id']; ?></h4>

<span  class="sub-header">ABN: 0123456789</span>

</div>

<hr class="p-0 m-0">

<div class="row pt-5 pl-5 ml-3">
    <div class="col-md-6">
        <h5>Private and Confidential</h5>
        <p class="p-0 m-0">Bernhardt Griffith</p>
        <p class="p-0 m-0">1 Albert Street</p>
        <p>Collingwood 3111</p>
    </div>
</div>

<!-- 
<div class="d-flex justify-content-between">
<h3></h3>

<?php if($trans['status'] == 3 ) : ?>
    <h3>Balance: $0</h3>
<?php else :?>
<h3>Balance: $<?php echo $trans['price']; ?></h3>
<?php endif; ?>

</div> -->

<div class="row pb-3">
    <div class="col-md-6">
       <h6>Date Invoice Issued: 25/09/2019</h6> 
        <h6>Date of Consultation: 25/09/2019</h6>
        <h6>Client Name: Bernhardt Griffith</h6>
    </div>

</div>

<table class="table">
    <thead>
        <tr>
            <th>Service Date</th>
            <th>Service Type</th>
            <th>QTY</th>
            <th>Fee</th>
            <th>GST</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
   
        <tr>
            <td> <?php echo $trans['created_at']; ?> </td>
            <td> <?php echo $trans['name']; ?> </td>
            <td> 1</td>
            <td> $<?php echo $trans['price']; ?> </td>
            <!-- <td>
                <?php  if($trans['status'] == 2 ) : ?>
                    <a class=" bg-warning text-black">Awaiting Payment</a> 
                <?php  else : ?>
                    <a class=" bg-success text-white">Paid</a> 
                <?php  endif; ?>
            </td> -->
            <td>$0.00</td>
            <td> $<?php echo $trans['price']; ?> </td>
            
          
        </tr>
    
    </tbody>

</table>