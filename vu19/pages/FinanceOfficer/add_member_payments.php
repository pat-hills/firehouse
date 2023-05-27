<?php
require_once './../class/accountant.php';

require_once './../pdoconn/accountantconfig.php';
require_once './../class/secretary.php';

require_once './../pdoconn/secretaryconfig.php';

  $a = 0;
  if(isset($_GET['m'])){
      $a = $_GET['m'];
  }

?>

<div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Member Payments</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                          
                            <!-- <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                                    </ol>
                                </nav>
                            </div> -->

                        </div>
                    </div>
                </div>

                
                <?php if ($a == 5) { ?>
                <div>
        <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><i class="icon-user icon-large"></i>&nbsp;Action Completed Sucessfully;    


          <!-- <a style = "color :green;" class="nav-link" href="./pages/r?inv17ml44=appraisal_list">Click To Member List</a> -->
        
        </strong> 
          
          
          <!-- <br/> -->

       

      </div>
       </div>
         
                <?php } ?>

             
          
                <div class="row">
                       
                       <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                           <div class="card">
                               <h5 class="card-header">Member Information</h5>
                               <br/>
                               <div class="text-center">

                               <?php 
                               
                               $member = $secretary ->get_member_detail_by_id_();
                               
                               ?>
                               
	                                            <img src="assets/images/avatar-1.jpg" 
                                              alt="User Avatar" class="rounded-circle user-avatar-xxl">

	                                            </div>
                               <div class="card-body">
                                   <form action="#" id="basicform" data-parsley-validate="">
                                       <div class="form-group">
                                           <label for="inputUserName">Fullname</label>
                                           <input readonly id="inputUserName" type="text" name="fullname" data-parsley-trigger="change" required="" placeholder="Enter first name" autocomplete="off" 
                                           value="<?php  
                                          echo $member['first_name']." ".$member['other_name'];
                                           ?>"
                                           class="form-control">
                                       </div>
                                       
                                       <div class="form-group">
                                           <label for="inputPassword">Phone number</label>
                                           <input readonly id="inputPassword" name="sms_format_1" type="text" placeholder="Password" required=""
                                           
                                           value="<?php
                                                echo $member['sms_format_1'];
                                       
                                           
                                           ?>"
                                           class="form-control">
                                       </div>

                                       <div class="form-group" style="">
                                           <label for="inputPassword">Email ID</label>
                                           <input readonly id="inputPassword" name="email_id" type="text" placeholder="Password" required=""
                                           
                                           value="<?php
                                                echo $member['email_id'];
                                       
                                           
                                           ?>"
                                           class="form-control">
                                       </div>
                                       <div class="form-group">
                                           <label for="inputRepeatPassword"> Address</label>
                                           <input readonly id="inputRepeatPassword" data-parsley-equalto="#inputPassword" type="text" required=""
                                           
                                             
                                           value="<?php
                                                echo $member['residence'];
                                       
                                           
                                           ?>"
                                           placeholder="House Address" class="form-control">
                                       </div>

                                       
                                   </form>
                               </div>
                           </div>
                       </div>
                      
                       <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                           <div class="card">
                               <h5 class="card-header">Payment Details</h5>
                               <div class="card-body">

                                

                                   <form method="post" action="pages/FinanceOfficer/Actions/payments_ledger_action.php" class='form-horizontal' role='form'>
                                  
                                                                    <div class="form-group row">
                                                                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right"> Amount </label>
                                                                            <div class="col-9 col-lg-10">
                                                                            

                                                                                   <input required autocomplete="off"   type="text" name="AmountReceived" placeholder="" class="form-control">
                                                                            </div>
                                                                     </div>

                                                                          <div class="form-group row">
                                                                                <label for="inputWebSite" class="col-3 col-lg-2 col-form-label text-right"> Type</label>
                                                                                <div class="col-9 col-lg-10">

                                                                                    <select required class="form-control" name="paymenttype" id="typebooking">
                                                                                     <option></option>
                                                                                     <option value="TITHE">TITHE</option>
                                                                                     <option value="SPECIAL-OFFERING">SPECIAL OFFERING</option>
                                                                                     <option value="PLEDGE">PLEDGE</option>
                                                                                     <option value="SEED">SEED</option>
                                                                                    

                                                                                   </select>
                                                                                
                                                                                </div>
                                                                            </div>


                                                                        

                                                         

                                                        


                                                         <div class="form-group row">
                                                                                <label for="inputWebSite" class="col-3 col-lg-2 col-form-label text-right"> Mode</label>
                                                                                <div class="col-9 col-lg-10">

                                                                                    <select required class="form-control" name="mop">
                                                                                     <option></option>
                                                                                    
                                                                                     <option>CASH</option>
                                                                                     <option>MOMO</option>
                                                                                     <option>CHEQUE</option>
                                                                                     <option>BANK TRANSFER</option>


                                                                                   </select>
                                                                                
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Paid by</label>
                                                                            <div class="col-9 col-lg-10">
                                                                            

                                                                                   <input autocomplete="off"   type="text" name="paidby" placeholder="" class="form-control">
                                                                            </div>
                                                                     </div>




                                       <div class="form-group row">
                                           <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Comments</label>
                                           <div class="col-9 col-lg-10">
                                               <textarea name="Comments" id="inputEmail2"   class="form-control">
                                             </textarea>
                                           </div>
                                       </div>

                                       <input readonly id="inputUserName" type="hidden" name="fullname" data-parsley-trigger="change" required="" placeholder="Enter first name" autocomplete="off" 
                                           value="<?php  
                                          echo $member['first_name']." ".$member['other_name'];
                                           ?>"
                                           class="form-control">

                                           <input readonly id="inputPassword" name="sms_format_1" type="hidden" placeholder="Password" required=""
                                           
                                           value="<?php
                                                echo $member['sms_format_1'];
                                       
                                           
                                           ?>"
                                           class="form-control">

                                           <input readonly id="inputPassword" name="email_id" type="hidden" placeholder="Password" required=""
                                           
                                           value="<?php
                                                echo $member['email_id'];
                                       
                                           
                                           ?>"
                                           class="form-control">

                                       <div class="row pt-2 pt-sm-5 mt-1">
                                           <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                               <!-- <label class="be-checkbox custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                               </label> -->
                                           </div>
                                           <div class="col-sm-6 pl-0">
                                               <p class="text-right">
                                                   <button  onclick='return confirm("Are you sure you want to contitnue with action? This would send notification to member on payment received")' name="submitt" class="btn btn-space btn-primary">Save Payment</button>
                                                   <a style="float :right;" href="./pages/r?inv17ml44=view_members_for_payments" class="btn btn-danger" >
                                            Cancel
                                        </a> 
                                               </p>
                                           </div>

                                       </div>

                                       
                                   </form>
                               </div>
                           </div>
                       </div>
                      
                   </div>
               
                                           
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">

                            <!-- <a style="float :right; margin-left:15px;" target="_blank" href="pages/pr_mem" class="btn btn-primary">
                                            Print members list
                                        </a> -->
                                    
                                    <!-- <a style="float :right;" href="pages/members_ind_payment_print" target="_blank" class="btn btn-primary" >
                                           Print Member Payments
                                        </a> -->
                                <h5 class="mb-0">All Payments By Member</h5>
                           
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Payment Date</th>
                                                <th>Payment Type</th>
                                                <th>Payment Mode</th>
                                                <th>Amount</th> 
                                                <th>Received By</th> 
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                    
                                        
                                      $accountant->all_payments_of_member_list(); 
                                        
                                        
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Payment Date</th>
                                                <th>Payment Type</th>
                                                <th>Payment Mode</th>
                                                <th>Amount</th> 
                                                <th>Received By</th> 
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
                </div>

              
            </div>            
                                    
                                   
 
            <div class="footer"> 
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Copyright © <?php echo date("Y") ?> Spencam.
                        </div>

                        <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
            
        </div>


    