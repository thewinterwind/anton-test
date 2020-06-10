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


    <title>Billing</title> 
  </head>
  <body>
    <section class="billing-sec">
      <div class="widget-container">
        <ul class="tabs">
          <li><a href="#invoices">Invoices</a></li>
          <li><a href="#payments">Payments</a></li>
          <li><a href="#adjustments">Adjustments</a></li>
        </ul>
        <div class="tab_container">
          <div id="invoices" class="tab_content">
              <span class="balance-pay">Balance $224.60</span>
              <div class="sec-row">
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
  
              <div class="sec-row">
                <a href="" class="btn-all btn-green bdr-radius btn-color-white js-open-modal" data-modal-id="popup">New Invoice</a>
                <div class="srcblk">
                  <input type="text" placeholder="Search"> 
                </div>
              </div>
  
              <div class="resp-tbl">
              <table class="invoice-tbl" cellpadding="0" cellspacing="0">
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
               <div class="pagination-sec">
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

    <div id="popup" class="modal-box"> 
        <a href="#" class="js-modal-close close">×</a>
      <div class="modal-body">
        
        <div class="invoice-frm-sec">
          <div class="frm-widgt">
            <h2>New Invoice</h2>
            <div class="two-way-frm">
              <div class="form-half frm-group">
                <label>Patient</label>
                <input type="text" placeholder="Smith, jane">
                <i class="infom">!</i>
              </div>
              <div class="form-half  frm-group">
                <label>Bill to</label>
                <select>
                  <option>Patient</option>
                  <option>Medicare direct bill</option>

                  <option>Head of family</option>
                  <option>DVA direct bill</option>
                  <option>Work cover</option>
                  <option>Other</option>
                </select>
                <i class="infom">!</i>
              </div>
              <div class="form-half  frm-group">
                <label>Provider</label>
                <select class="width190">
                  <option>Mr Anton Pearce</option>
                  <option>Mr John</option>
                </select>
                <i class="infom">!</i>
              </div>
              <div class="form-half  frm-group">
                <label>Schedule</label>
                <select>
                  <option>MBS</option>
                  <option>Patient 2</option>
                </select>
                <i class="infom">!</i>
              </div>
              <div class="form-half  frm-group">
                <label>Referral</label>
                <div class="referral-sec">
                  <select>
                    <option>Mr Anton Pearce</option>
                    <option>Mr John</option>
                  </select>
                  <span class="add-btn">+</span>
                </div>
                <i class="infom">!</i>
              </div>
              
              <div class="form-half  frm-group">
                <label>Location</label>
                <select id="country" class="width190" name="country">
                  <option value="Afganistan">Salvado</option>
                  <option value="Albania">Other</option>
                  
               </select>
                <i class="infom">!</i>
              </div>

              <div class="form-half  frm-group">
                <label>Service Date</label>
                <div class="dtpic">
                <input type="text" placeholder="">
                <img src="images/calendar.png" alt="">
              </div>
              </div>
              
              
            </div>
          </div>
          <div class="frm-widgt">
            <h2  class="txt-right">Balance $0.00</h2>
            <div class="frm-group">
              <label>Invoice No</label>
              <input class="light-grey" type="text" placeholder="INV-1">
            </div>
            <div class="frm-group">
              <label>invoice Date</label>
              <div class="dtpic">
              <input type="text" placeholder="">
              <img src="images/calendar.png" alt="">
            </div>
            </div>
            <div class="frm-group">
              <label>Terms</label>
              <select class="width190">
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
              <a href="#" class="mb-5 logonm">
                Jane Smith
              </a>
              <span class="d-flex flex-column address-sec">
                  <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
                  <span>Mississippi 96522</span>
              </span>
            </div>
          </div>
          <div class="irnn">
            <div class="form-half frm-group irnn-main">
              <label>Medicare no/IRN</label>
              <div class="d-flex irnn-input">
              <input type="text" placeholder="627685212">
              <input type="text" placeholder="1" style="width: 35px; margin-left: 5px;">
            </div>
              <span>Verified 02-05-2020</span>
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
                <li><label><input type="checkbox" class="form-check-input"> Telehealth Service</label></li>
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
            <a href="" class="btn-all btn-outline bdr-radius">Print</a>
            <a href="" class="btn-all btn-outline bdr-radius">Hold</a>
            <a href="JavaScript:Void(0);" class="btn-all btn-outline bdr-radius js-open-modal" id="morepay"  >Quick Pay</a>
            <a href="JavaScript:Void(0);" class="btn-all btn-green bdr-radius btn-color-white" id="shiv" data-modal-id="popup2">More Pay</a>
        </div>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/invoice/js/bootstrap-datepicker.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/invoice/js/custom.js"></script>
  </body>
</html>