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
                            <h2 class="pageheader-title">Checkout Guest</h2>
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
          <strong><i class="icon-user icon-large"></i>&nbsp;Guest CheckOut Completed Sucessfully;    


          <!-- <a style = "color :green;" class="nav-link" href="./pages/r?inv17ml44=appraisal_list">Click To Member List</a> -->
        
        </strong> 
          
          
          <!-- <br/> -->

       

      </div>
       </div>
         
                <?php } ?>

             
          
                <div class="row">
                       
                       <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                           <div class="card">
                               <h5 class="card-header">Guest Information</h5>
                               <br/>
                               <div class="text-center">

                               <?php 
                               
                               $customer = $accountant ->get_member_detail_by_id_();
                               
                               ?>
                               
	                                            <img src="assets/images/avatar-1.jpg" 
                                              alt="User Avatar" class="rounded-circle user-avatar-xxl">

	                                            </div>
                               <div class="card-body">
                                   <form action="#" id="basicform" data-parsley-validate="">
                                       <div class="form-group">
                                           <label for="inputUserName">First name</label>
                                           <input readonly id="inputUserName" type="text" name="name" data-parsley-trigger="change" required="" placeholder="Enter first name" autocomplete="off" 
                                           value="<?php  
                                          echo $customer['fullname'];
                                           ?>"
                                           class="form-control">
                                       </div>
                                       
                                       <div class="form-group">
                                           <label for="inputPassword">Phone number</label>
                                           <input readonly id="inputPassword" type="text" placeholder="Password" required=""
                                           
                                           value="<?php
                                                echo $customer['contact'];
                                       
                                           
                                           ?>"
                                           class="form-control">
                                       </div>
                                       <div class="form-group">
                                           <label for="inputRepeatPassword"> Address</label>
                                           <input readonly id="inputRepeatPassword" data-parsley-equalto="#inputPassword" type="text" required=""
                                           
                                             
                                           value="<?php
                                                echo $customer['address'];
                                       
                                           
                                           ?>"
                                           placeholder="House Address" class="form-control">
                                       </div>

                                       
                                   </form>
                               </div>
                           </div>
                       </div>
                      
                       <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                           <div class="card">
                               <h5 class="card-header">Checkout Form</h5>
                               <div class="card-body">

                               <?php 
                               
                               $members_appraisals_checkout = $secretary -> members_appraisals_checkout();
                               
                               
                               ?>

                                

                                   <form method="post" action="pages/checkout_booking_add_action.php" class='form-horizontal' role='form'>
                                  
                                   <div class="form-group row">
                                                                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right"> Room No</label>
                                                                            <div class="col-9 col-lg-10">
                                                                            <input autocomplete="off"
                                                                            
                                                                            value="<?php 
                                                                            
                                                                            if($members_appraisals_checkout != null){
                                                                                 $room_id = $members_appraisals_checkout['room_id'];

                                                                                 echo $room_id;

                                                                              //  $rooms = $secretary->get_room_detail_by_id($room_id);

                                                                              //  echo $rooms['room_no'];

                                                                            }
                                                                            
                                                                            ?>"
                                                                            
                                                                            type="number" readonly required name="room_id" placeholder="" class="form-control">
                                                                             
                                                                            </div>
                                                         </div>
                                                          <div class="form-group row">
                                                                            <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">No. of nights</label>
                                                                            <div class="col-9 col-lg-10">
                                                                                <input autocomplete="off"
                                                                                
                                                                                value="<?php 
                                                                            
                                                                            if($members_appraisals_checkout != null){
                                                                                echo $members_appraisals_checkout['number_of_days'];
                                                                            }
                                                                            
                                                                            ?>"
                                                                                
                                                                                type="number" readonly required name="nights" placeholder="" class="form-control">
                                                                            </div>
                                                         </div>

                                                         <input autocomplete="off"
                                                                            
                                                                            value="<?php 
                                                                            
                                                                            if($members_appraisals_checkout != null){
                                                                                echo $members_appraisals_checkout['id'];
                                                                            }
                                                                            
                                                                            ?>"
                                                                            
                                                                            type="hidden" readonly required name="booking_id" placeholder="" class="form-control">

                                       
                                       <div class="row pt-2 pt-sm-5 mt-1">
                                           <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                               <!-- <label class="be-checkbox custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                               </label> -->
                                           </div>
                                           <div class="col-sm-6 pl-0">
                                               <p class="text-right">

                                               <?php if ($members_appraisals_checkout != null) { ?>
       
                                                <button name="submitt" class="btn btn-space btn-primary">Checkout</button>
                                                  <?php } ?>

                                                 
                                             <a style="float :right;" href="./pages/r?inv17ml44=add_members" class="btn btn-danger" >
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
                                <h5 class="mb-0">All Bookings By This Guest</h5>
                           
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Room</th>
                                                <th>No. Of Nights</th>
                                                
                                                <th>Booked Date</th>
                                                <th>Checkout Date</th>
                                                <th>Checkout Status</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                    
                                        
                                      $secretary->members_appraisals(); 
                                        
                                        
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Room</th>
                                                <th>No. Of Nights</th>
                                                
                                                <th>Booked Date</th>
                                                <th>Checkout Date</th>
                                                <th>Checkout Status</th>
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


    