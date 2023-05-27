<?php 
require_once './../class/secretary.php';

require_once './../pdoconn/secretaryconfig.php';

 

?>
	    <div class="dashboard-wrapper">
	        <div class="dashboard-influence">
	            <div class="container-fluid dashboard-content">
	                <!-- ============================================================== -->
	                <!-- pageheader  -->
	                <!-- ============================================================== -->
	                <div class="row">
	                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                        <div class="page-header">
	                            <h3 class="mb-2">Hello <?php echo $_SESSION['full_name']; ?>, This An Overview Of Your Dashboard </h3>
	                       
	                            <div class="page-breadcrumb">
	                                <nav aria-label="breadcrumb">
	                                    <ol class="breadcrumb">
	                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
	                                        <li class="breadcrumb-item active" aria-current="page">Activities & Metrics Dashboard</li>
	                                    </ol>
	                                </nav>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	               
	                    <div class="row">
	                      
                            
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Total Guests</h5>
                                            <h2 class="mb-0">

											 <?php

                                            if(!$secretary->count_all_members()){
                                                echo '<a class="nav-link" href="./pages/r?inv17ml44=add_members">Add Guest</a>';
                                            }else{
                                                echo  $secretary->count_all_members();
                                            }
                                           
                                            
                                            ?> 
											
											</h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
	                                        <i class="fa fa-user fa-fw fa-sm text-primary"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                      
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Total Available Rooms</h5>
	                                        <h2 class="mb-0">
											
											<?php
                                            if(!$secretary->count_all_events()){
                                                echo 'NA';
                                            }else{
                                                echo  $secretary->count_all_events();
                                            }
                                           
                                            
                                            ?> 
											
											</h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
	                                        <i class="fa fa-eye fa-fw fa-sm text-info"></i>
	                                    </div>
	                                </div>
	                            </div>
                            </div>
	                        
	                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Total Weekly Bookings </h5>
	                                        <h2 class="mb-0">

											<?php
                                            if(!$secretary->total_roll_call()){
                                                echo 'NA';
                                            }else{
                                                echo  $secretary->total_roll_call();
                                            }
                                           
                                            
                                            ?> 
											
											</h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
	                                        <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                       
	                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
										<h5 class="text-muted">Amount Received Today </h5>
	                                        <h3 class="mb-0">
											
										<?php
										
                                            if(!$secretary->count_incoming_birthday()){
                                                echo 'NA';
                                            }else{
                                                echo "GH&#x20B5; ".number_format($secretary->count_incoming_birthday(), 2, '.', ',');;
                                            }
                                           
                                            
                                            ?> 
											
											
											</h3>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
	                                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                      
	                    </div>

<!-- 
						
                        <div class="row">
                           
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Recent Added Appraisals</h5>
                                        <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">
                                                
                                                <?php
                                                
											//	if(!$secretary->total_member_appraisals()){
												//	echo '<a class="nav-link" href="./pages/r?inv17ml44=appraisal_list">Add appraisal</a>';
											//	}else{
												//	echo  $secretary->total_member_appraisals() . ", ".$secretary->total_member_appraisals_count()." member(s) appraised";
											//	}
											   
                                                
                                                ?> 
    
    
                                                </h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                         
									    </div>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Recent Role Calls Conducted</h5>
                                        <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">
                                                
                                                <?php
                                                
												// if(!$secretary->total_member_rollcalls()){
												// 	echo '<a class="nav-link" href="./pages/r?inv17ml44=appraisal_list">Add appraisal</a>';
												// }else{
												// 	echo $secretary->total_member_rollcalls()." member(s) present";
												// }
											   
                                                ?> 
    
    
                                                </h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                         
									    </div>
                                    </div>
                                </div>
                            </div>
                           
                            
                          
                            -->
                           
                        </div>


	                   
	                    <div class="row">
<!-- 						 
	                        
	                        <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <h5 class="card-header">Members Chart Population</h5>
	                                <div class="card-body">
	                                    

										<div id="members_grahph_populationchart" style="height: 230px;"></div>

	                                </div>
	                                <div class="card-footer p-0 bg-white d-flex">
	                                    <div class="card-footer-item card-footer-item-bordered w-50">
	                                        <h2 class="mb-0"> 
											
											  -->
										 <?php
										//  if(!$secretary->count_all_members()){
										// 	 echo '<a class="nav-link" href="./pages/r?inv17ml44=add_members">Add member</a>';
										//  }else{

										// $all = $secretary->count_all_members();
										// $male = $secretary->count_all_male_members();
										// $female = $secretary->count_all_female_members();

										// $percentagefemale =  ($female / $all) * 100 ;
										
										// echo round($percentagefemale). "%";

										//  }
										
										 
										 ?> 	
											
										 
<!-- 											
											</h2>
	                                        <p>Female </p>
	                                    </div>
	                                    <div class="card-footer-item card-footer-item-bordered">
	                                        <h2 class="mb-0">

											 -->
											<?php
										//  if(!$secretary->count_all_members()){
										// 	 echo '<a class="nav-link" href="./pages/r?inv17ml44=add_members">Add member</a>';
										//  }else{

										// $all = $secretary->count_all_members();
										// $male = $secretary->count_all_male_members();
										// $female = $secretary->count_all_female_members();

										// $percentagemale =  ($male / $all) * 100 ;
										
										// echo round($percentagemale). "%";

										//  }
										
										 
										 ?> 	
<!-- 											
											 </h2>
	                                        <p>Male </p>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
 -->

 




	                     
	                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <h5 class="card-header">My Bookings Today </h5>
	                                <div class="card-body" >
									<div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
									<thead>
                                            <tr>
                                                <th>Room</th>
                                                <th>No. Of Nights</th>
                                                
                                                <th>Booked Date</th>
                                                <th>Checkout Date</th>
                                                <th>Checkout Status</th>
                                                <th>Amount Charged ( <?php echo "GH&#x20B5;" ?> )</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                    
                                        
                                      $secretary->bookings_today(); 
                                        
                                        
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Room</th>
                                                <th>No. Of Nights</th>
                                                
                                                <th>Booked Date</th>
                                                <th>Checkout Date</th>
                                                <th>Checkout Status</th>
												<th>Amount Charged ( <?php echo "GH&#x20B5;" ?> )</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>   
	                                </div>
	                            </div>
	                        </div>
	                        
						</div>


						
	                    <div class="row">
	                        <!-- ============================================================== -->
	                        <!-- campaign activities   -->
	                        <!-- ============================================================== -->
	                        <div class="col-lg-12">
	                            <div class="section-block">
	                                <h3 class="section-title">My Monthly Bookings</h3>
	                            </div>
	                            <div class="card">
	                                <div class="campaign-table table-responsive">
	                                    <table id="usersactivity" class="table">
										<thead>
                                            <tr>
                                                <th>Room</th>
                                                <th>No. Of Nights</th>
                                                
                                                <th>Booked Date</th>
                                                <th>Checkout Date</th>
                                                <th>Checkout Status</th>
                                                <th>Amount Charged ( <?php echo "GH&#x20B5;" ?> )</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                    
                                        
                                      $secretary->bookings_last_30_days(); 
                                        
                                        
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Room</th>
                                                <th>No. Of Nights</th>
                                                
                                                <th>Booked Date</th>
                                                <th>Checkout Date</th>
                                                <th>Checkout Status</th>
												<th>Amount Charged ( <?php echo "GH&#x20B5;" ?> )</th>
                                            </tr>
                                        </tfoot>
	                                    </table>
	                                </div>
	                            </div>
	                        </div>
	                        <!-- ============================================================== -->
	                        <!-- end campaign activities   -->
	                        <!-- ============================================================== -->
						</div>

 
	                                </div>
	                            </div>
	                            <!-- ============================================================== -->
	                            <!-- footer -->
	                            <!-- ============================================================== -->
	                            <div class="footer">
	                                <div class="container-fluid">
	                                    <div class="row">
	                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
											Copyright © <?php echo date("Y") ?> Spencam.
	                                        </div>
	                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
	                                            <div class="text-md-right footer-links d-none d-sm-block">
	                                                <!-- <a href="javascript: void(0);">About</a>
	                                                <a href="javascript: void(0);">Support</a>
	                                                <a href="javascript: void(0);">Contact Us</a> -->
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                        </div>
	                        
	                    </div>

