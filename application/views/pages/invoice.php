<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <!-- CSS -->
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/invoice/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/invoice/css/datepicker.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script
      src="https://kit.fontawesome.com/605f445916.js"
      crossorigin="anonymous"
    ></script>

    <style>
    #popup{
      left: 0px !important;
    }
    </style>


    <title>Billing</title> 
  </head>
  <body>
<div class="vertical-centered-box">  
    <section class="billing-sec">
      <div class="widget-container">
        <ul class="tabs">
          <li><a href="#invoices">Invoices</a></li>
          <li><a href="#payments">Payments</a></li>
          <li><a href="#adjustments">Adjustments</a></li>
        </ul>
        <div class="tab_container">
          <div id="invoices" class="tab_content">
              <span class="balance-pay pt-5 mt-5">Balance $224.60</span>
              <div class="sec-row" style="width: 95%">
                <div class="sec-title">
                  <h3>Invoice</h3>
                </div>
                <div class="sec-filter">
                  <select class="js-example-basic-single">
                    <option>Filter</option>
                    <optgroup label="Invoice Status">
                      <option>On Hold</option>
                      <option>Paid</option>
                      <option>Partially Paid</option>
                      <option>Unpaid</option>
                      <option>Deleted</option>
                      <option>Adjusted</option>
                    </optgroup>
                    <optgroup label="Provider">
                      <option>Mr&nbsp;Anton&nbsp;Pearce</option>
                    </optgroup>
                    <optgroup label="Created Date">
                      <option>Last 7 days</option>
                      <option>Last 14 days</option>
                      <option>Last 30 days</option>
                      <option>Last 60 days</option>
                      <option>Last 90 days</option>
                    </optgroup>
                    <optgroup label="Invoice Type">
                      <option>At Billing</option>
                      <option>Invoice</option>
                      <option>Inpatient Invoice</option>
                      <option>Inpatient Quote</option>
                    </optgroup>
                  </select>
                </div>
              </div>
  
              <div class="sec-row" style="width: 95%">
                <a href="" class="btn-all btn-green bdr-radius btn-color-white js-open-modal new-inv" id="testing" data-modal-id="popup">New Invoice</a>
                <div class="srcblk">
                  <input type="text" placeholder="Search"> 
                </div>
              </div>
  
              <div class="resp-tbl">
              <table class="invoice-tbl" cellpadding="0" cellspacing="0" style="width: 95%">
                <tr>
                  <th><input type="checkbox"></th>
                  <th>Date</th>
                  <th>No.</th>
                  <th>Type</th>
                  <th>Provider</th>
                  <th>Payer</th>
                  <th>Location</th>
                  <th>Status</th>
                  <th>Amount</th>
                  <th>GST</th>
                </tr>
                <tr>
                  <td><input type="checkbox"></td>
                  <td>01/04/2019</td>
                  <td><a href="inv-1.html">INV-1</a></td>
                  <td>Invoice</td>
                  <td>Mr Anton Pearce</td>
                  <td>Mrs Jane Smith</td>
                  <td>Salvado</td>
                  <td>Unpaid</td>
                  <td>$224.60</td>
                  <td>$0.25</td>
                </tr>
              </table>
               </div>
               <div class="pagination-sec" style="width: 95%">
                  <div class="pagination">
                      <a href="#"><img src="images/prevL-icon.jpg" alt=""></a>
                      <a href="#"><img src="images/prev-icon.jpg" alt=""></a>
                      <a href="#" class="active">1</a>
                      <a href="#"><img src="images/next-icon.jpg" alt=""></a>
                      <a href="#"><img src="images/nextR-icon.jpg" alt=""></a>
                    </div>
               </div>
          </div>
          <div id="payments" class="tab_content">
             sadasd

          </div>
          <div id="adjustments" class="tab_content">
              <h1 style="text-align:center">Adjustments Content Here</h1>
          </div>
        </div>
      </div>
    </section>

   <?php if($this->session->flashdata('error') == "Please check the details and try again." || $this->session->flashdata('success') == "Verified") : ?>
    <script>
    
     $(function(){
        $('#popup').show('modal');
      });
      </script>

    <?php endif; ?>

    <div id="popup" class="modal-box modal" style="left: 0px !important"> 
        <a href="#" class="js-modal-close close">×</a>
      <div class="modal-body pt-3">
        <form action="<?php echo base_url('/verifyInvoice'); ?>" method="post">
        <div class="invoice-frm-sec">
          <div class="frm-widgt">
            <h2>New Invoice</h2>
            <div class="two-way-frm">
              <div class="form-half frm-group">
                <label>Patient</label>
                <select id="patient" name="patient" required>
                  <option value="0"></option>  
                  <?php foreach($patients as $patient) : ?>
                  <option value="<?php echo $patient['id'] ?>"> <?php echo $patient['last_name'] ?>, <?php echo $patient['first_name'] ?></option>
                  <?php endforeach; ?>
                </select>
                <input type="hidden" name="last_name" id="last_name">
                <input type="hidden" name="first_name" id="first_name">
                <!-- <input type="text" value="Griffith, Bernhardt" name="patient" required>
                <input type="hidden" name="last_name" value="Griffith">
                <input type="hidden" name="first_name" value="Bernhardt">
                <i class="infom">!</i> -->
              </div>
              <div class="form-half  frm-group">
                <label>Bill to</label>
                <select name="verify" required>
                  <!-- <option value="Patient">Patient</option> -->
                  <option value="Medicare">Medicare direct bill</option>
                  <option value="Head of family">Head of family</option>
                  <option value="DVA">DVA direct bill</option>
                  <option value="Work cover">Work cover</option>
                  <option value="Other">Other</option>
                </select>
                <i class="infom">!</i>
              </div>
              <div class="form-half  frm-group">
                <label>Provider</label>
                <select class="width190" name="provider" required>
                  <option>Mr Anton Pearce</option>
                  <option>Mr John</option>
                </select>
                <i class="infom">!</i>
              </div>
              <div class="form-half  frm-group">
                <label>Schedule</label>
                <select name="sched" required>
                  <option>MBS</option>
                  <option>Patient 2</option>
                </select>
                <i class="infom">!</i>
              </div>
              <div class="form-half  frm-group">
                <label>Gender</label>
                <select name="gender" id="gender" required>
                  <option value="M">Male</option>
                  <option value="F">Female</option>
                </select>
                <i class="infom">!</i>
              </div>
              <div class="form-half  frm-group">
                <label>Referral</label>
                <div class="referral-sec">
                  <select name="referral" required>
                    <option>Mr Anton Pearce</option>
                    <option>Mr John</option>
                  </select>
                  <span class="add-btn">+</span>
                </div>
                <i class="infom">!</i>
              </div>
              
              <!-- <div class="form-half  frm-group">
                <label>Location</label>
                <select id="country" class="width190" name="country" required>
                  <option value="Afganistan">Salvado</option>
                  <option value="Albania">Other</option>
                  
               </select>
                <i class="infom">!</i>
              </div> -->

              <div class="form-half  frm-group">
                <label>Service Date</label>
                <div class="dtpic">
                <input type="text" name="service_date" required placeholder="">
                <img src="images/calendar.png" alt="">
              </div>
              </div>

              <div class="form-half  frm-group">
                <label>Birth Date</label>
               
                <input type="text" id="birthday" name="birthday" required>
                <img src="images/calendar.png" alt="">
             
              </div>
              
              
            </div>
          </div>
          <div class="frm-widgt">
            <h2  class="txt-right">Balance $0.00</h2>
            <div class="frm-group">
              <label>Invoice No</label>
              <input class="light-grey" type="text" name="invoice_num" placeholder="INV-1">
            </div>
            <div class="frm-group">
              <label>invoice Date</label>
              <div class="dtpic">
              <input type="text" name="invoice_date" placeholder="" required>
              <img src="images/calendar.png" alt="">
            </div>
            </div>
            <div class="frm-group">
              <label>Terms</label>
              <select class="width190" name="terms" required>
                <option>7 Days</option>
                <option>15 Days</option>
              </select>
            </div>
            <!-- <div class="frm-group">
              <label>Due Date</label>
              <div class="dtpic">
                  <input type="text" placeholder="">
                  <img src="images/calendar.png" alt="">
                </div>
            </div> -->
          </div>
        </div>

        <div class="crinfo d-flex">
          <div class="form-half  frm-group">
            <div class="d-flex flex-column address-sec">
              <a href="#" class="mb-5 logonm" value="dasda">
              <span id="patient_name">  </span>
              </a>
              <span class="d-flex flex-column address-sec">
                  <span id="address"> </span>
                  <!-- <span>Mississippi 96522</span> -->
              </span>
            </div>
          </div>
          <div class="irnn">
            <div class="form-half frm-group irnn-main">
              <label>Medicare no/IRN</label>
              <div class="d-flex irnn-input">
              <input type="text" id="med_num" name="med_num" required>
              <input type="text" name="irn" id="irn" style="width: 35px; margin-left: 5px;">
            </div>
              <!-- <span>Verified 02-05-2020</span> -->

              <?php if($this->session->flashdata('success')){ ?>
    
            <p class="my-auto text-success"><?php echo $this->session->flashdata('success'); ?></p>
            <?php } ?>

      <?php if($this->session->flashdata('error')){ ?>
   
        <p class="my-auto text-danger"><?php echo $this->session->flashdata('error'); ?></p>
    
      <?php } ?>

            </div>
            <div class="row d-flex flex-row-reverse">
        <button type="submit" class="btn btn-all btn-outline bdr-radius mr-5">Verify</button>
            
            </div>

          </div>

        </div>

          <a href="" class="btn-all btn-outline bdr-radius">New Detailed Item</a>


        <div class="resp-tbl poptle">
          <table class="invoice-tbl tblexta" cellpadding="0" cellspacing="0">
            <tr>
              <th class="wid115">Date</th>
              <th class="wid75">Item#</th>
              <th class="wid270">Description</th>
              <th>Fee&nbsp;Type</th>
              <th>Amount</th>
              <th>Tax&nbsp;Type</th>
              <th>Total</th>
              <th class="text-center">Action</th>
            </tr>
            <tr>
                <td>
                  <div class="dtpic tbl-date">
                    <input class="wid115" type="text" placeholder="">
                    <img src="images/calendar.png" alt="">
                  </div>
                </td>
                <td>
                  <input class="wid75" type="text" placeholder="296">
                </td>
                <td>
                    <input class="w-100" type="text" placeholder="Professional attendance of more than 45">
                </td>
                <td>
                    <select class="w-100">
                        <option>Rebate85</option>
                        <option>Rebate86</option>
                      </select>
                </td>
                
                <td>
                    <input  class="wid75" type="text" placeholder="$224.60">
                </td>
                <td>
                    <select class="light-grey">
                        <option>Free</option>
                      </select>
                </td>
                <td>$224.60</td>
                <td class="text-center"><i class="fa fa-trash" aria-hidden="true"></i></td>
              </tr>
          </table>
        </div>
        <a href="" class="btn-all btn-outline bdr-radius">Add Item</a>
        <div class="sec-g">
          <div class="addi-notes">
            <div class="notearea">
              <textarea name="" id=""  rows="8"></textarea>
            </div>
            <div class="note-services">
              <ul>
                <li><label class="pl-3"><input type="checkbox" class="form-check-input"> Telehealth Service</label></li>
                <!-- <li><label><input type="checkbox" class="form-check-input"> Hospital Service</label></li>
                <li><label><input type="checkbox" class="form-check-input"> Print Medicare Statement</label></li> -->
              </ul>
            </div>
          </div>
          <div class="c-total">
              <ul>
                <li>
                  <span>Sub Total</span>
                  <span>$224.60</span>
                </li>
                <li>
                    <span>GST</span>
                    <span>$0.00</span>
                </li>
                <li>
                    <span>Total</span>
                    <span>$224.60</span>
                </li>
                <li>
                    <span>GAP</span>
                    <span>$0.00</span>
                </li>
              </ul>
          </div>
        </div>

        <div class="frm-grp">
            <a href="" class="btn-all bdr-radius grey-btn">Cancel</a>
            <button type="submit" class="btn btn-all btn-outline bdr-radius">Save</button>
            <a href="" class="btn-all btn-outline bdr-radius">Print</a>
            <a href="" class="btn-all btn-outline bdr-radius">Hold</a>
            <a href="JavaScript:Void(0);" class="btn-all btn-outline bdr-radius js-open-modal" id="morepay"  >Quick Pay</a>
            <a href="JavaScript:Void(0);" class="btn-all btn-green bdr-radius btn-color-white" id="shiv" data-modal-id="popup2">More Pay</a>
        </div>
      </form>
        <div class="online-claim">
          <p>Online Patient Claiming</p>
          <div class="frm-group">
          <input  type="text" placeholder="$224.60">
        </div>  
        <a href="" class="btn-all btnw250 btn-green bdr-radius btn-color-white">PAY NOW</a>
        </div>
        <div style="clear:both"></div>
      </div>
    </div>
    <div id="popup2" class="modal-box"> 
        <a href="#" class="js-modal-close close">×</a>
      <div class="modal-body">
        <div class="invoice-frm-sec">
          <div class="frm-widgt">
            <h2>New Payment</h2>
            <div class="two-way-frm">
              <div class="form-half frm-group">
                <label style="width: 88px;">Payment Date</label>
                <div class="dtpic">
                    <input type="text" placeholder="">
                    <img src="images/calendar.png" alt="">
                  </div>
              </div>
              <div class="form-half  frm-group">
                <label style="width:auto"><input type="checkbox"> Online&nbsp;Patient&nbsp;Claiming</label>
              </div>
              <div class="form-half  frm-group">
                <label>Amount</label>
                <input class="light-grey" type="text" placeholder="$224.60">
              </div>
                <!-- <div class="form-half frm-group radio-grp">
                    <ul>
                        <li>
                          <input type="radio" id="f-option" name="selector">
                          <label for="f-option">Full Amount</label>
                          
                          <div class="check"></div>
                        </li>
                        
                        <li>
                          <input type="radio" id="s-option" name="selector">
                          <label for="s-option">Pay GAP Only</label>
                          
                          <div class="check"><div class="inside"></div></div>
                        </li>
                        
                      </ul>
                </div> -->
            </div>
          </div>
          <div class="frm-widgt">
            <h2>Balance <span>$224.60</span></h2>
            <div class="frm-group">
              <label>Reference</label>
              <input type="text" placeholder="">
            </div>
           
          </div>
        </div>

          <a href="" class="btn-all btn-outline bdr-radius">Claimant</a>


        <div class="resp-tbl poptle">
          <table class="invoice-tbl tblexta" cellpadding="0" cellspacing="0">
            <tr>
              <th width="8"></th>
              <th>Type</th>
              <th>Drawer/Transaction Ref No</th>
              <th>Cheque</th>
              <th>Bank</th>
              <th>BSB</th>
              <th width="100">Amount</th>
            </tr>
            <tr>
              <td>
                  <a href="" class="plus-sign">+</a>
              </td>
                <td>
                    <select style="width:100%"> 
                        <option>Eftpos</option>
                        <option>Patient 2</option>
                      </select>
                </td>
                <td>
                  <input type="text" placeholder="296">
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <div class="amt-m">
                      <label>&nbsp;</label> <input type="text" placeholder="$0.00">
                    </div>
                    <div class="amt-m">
                      <label>Total</label> <input type="text" placeholder="$0.00">
                    </div>
                    <div class="amt-m">
                      <label>Change</label> <input type="text" placeholder="$0.00">
                    </div>
                </td>
              </tr>
          </table>
        </div>
        <a href="" class="btn-all btn-outline bdr-radius">Allocate</a>
        <div class="resp-tbl poptle">
            <table class="invoice-tbl tblexta" cellpadding="0" cellspacing="0">
              <tr>
                <th width="8"></th>
                <th>Date</th>
                <th>Invoice No</th>
                <th>Item Code</th>
                <th>Item Description</th>
                <th>Provider</th>
                <th>Patient</th>
                <th>Amount</th>
                <th>GST</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Owing</th>
                <th>Pay Now</th>
                <th class="text-center">Action</th>
              </tr>
              <tr>
                <td>
                    <input type="checkbox">
                </td>
                  <td>01/04/2019</td>
                  <td>INV-1</td>
                  <td>296</td>
                  <td>Professional attendance...</td>
                  <td>Mr Anton Pear...</td>
                  <td></td>
                  <td>$224.60</td>
                  <td>$0</td>
                  <td>$224.60</td>
                  <td>$0</td>
                  <td>$224.60</td>
                  <td>
                    <div class="frm-group">
                        <input type="text" style="width:70px" placeholder="$0.00">
                    </div>
                  </td>
                  <td class="text-center"><i class="fa fa-trash" aria-hidden="true"></i></td>
                </tr>
            </table>
          </div>
        <div class="frm-grp">
            <a href="" class="btn-all bdr-radius grey-btn">Cancel</a>
            <a href="" class="btn-all btn-green bdr-radius btn-color-white">Pay and Claim</a>
        </div>
        <div style="clear:both"></div>
      </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/invoice/js/bootstrap-datepicker.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/invoice/js/custom.js"></script>

    <script type='text/javascript'>
      $(document).ready(function(){
    
      $('#patient').change(function(){
        var id = $(this).val();
        $.ajax({
        url:'<?=base_url()?>index.php/selectPatient',
        method: 'post',
        data: {id: id},
        dataType: 'json',
        success: function(response){
          var len = response.length;
          if(len > 0){
            // Read values
            var med_num = response[0].med_num;
            var first_name = response[0].first_name;
            var last_name = response[0].last_name;
            var address = response[0].address;
            var irn = response[0].irn;
            var birthday = response[0].birthday;
            var gender = response[0].gender;


            $('#first_name').val(first_name);
            $('#last_name').val(last_name);
            $('#med_num').val(med_num);
            $('#patient_name').text(first_name + ' ' + last_name);
            $('#address').text(address);
            $('#irn').val(irn);
            $('#birthday').val(birthday);
            $('#gender').val(gender);
    
          }
    
        }
      });

      if(id == 0){
         $('#first_name').val();
            $('#last_name').val();
            $('#med_num').val("");
            $('#patient_name').text("");
            $('#address').text("");
            $('#irn').val("");
            $('#birthday').val("");
            $('#gender').val();
        }
      });
    });
 </script>

  </body>
</html>