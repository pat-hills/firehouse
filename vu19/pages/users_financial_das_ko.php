<?php 
require_once './../class/accountant.php';

require_once './../pdoconn/accountantconfig.php';

require_once './../class/secretary.php';

require_once './../pdoconn/secretaryconfig.php';

 

?>
<div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                  
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Metrics Dashboard </h2>

                                
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"> Metrics Dashboard </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                  
                                        <h5 class="text-muted">Total Guest</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                
                                            <?php


                                            // if(!$accountant->total_revenue()){
                                            //     echo '<a class="nav-link" href="./pages/r?inv17ml44=add_acc_inexp">Add Account</a>';
                                            // }else{

                                            //     echo "GHS ". number_format($accountant->total_revenue(), 2, '.', ',');
                                               
                                            // }

                                          
                                            if(!$secretary->count_all_members()){
                                                echo '<a class="nav-link" href="./pages/r?inv17ml44=add_members">Add Guest</a>';
                                            }else{
                                                echo  $secretary->count_all_members();
                                            }
                                           
                                            
                                            ?> 

                                            </h1>
                                            

                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <!-- <img style="margin-top: -50px;" width=90px height=auto; src="./../images/revenue.png"/> -->
                                            <!-- <span><i class="fa fa-fw fa-arrow-up"></i></span><span></span> -->
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Available Rooms</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                
                                            <?php

                                            // if(!$accountant->total_payments()){
                                            //     echo '<a class="nav-link" href="./pages/r?inv17ml44=add_bill_items">Add Item</a>';
                                            // }else{

                                            //     echo "GHS ". number_format($accountant->total_payments(), 2, '.', ',');
                                               
                                            // }


                                            if(!$secretary->count_all_events()){
                                                echo 'NA';
                                            }else{
                                                echo  $secretary->count_all_events();
                                            }
                                           
                                           
                                            
                                            ?> 


                                            </h1>
                                        </div>

                                        <div  class="metric-label d-inline-block float-right text-success font-weight-bold">
                                               <!-- <img style="margin-top: -50px;" width=90px height=auto; src="./../images/payment-method.png"/> -->
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Weekly Bookings</h5>
                                        <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">
                                                
                                                <?php

                                                // if(!$accountant->total_income()){
                                                //     echo '<a class="nav-link" href="./pages/r?inv17ml44=add_bill_items">Add Item</a>';
                                                // }else{
    
                                                //     echo "GHS ". number_format($accountant->total_income(), 2, '.', ',');
                                                   
                                                // }

                                                if(!$accountant->total_guest_weekly_booking()){
                                                    echo 'NA';
                                                }else{
                                                    echo  $accountant->total_guest_weekly_booking();
                                                }
                                               
                                               
                                                
                                                ?> 
    
    
                                                </h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                        <!-- <img style="margin-top: -50px;" width=90px height=auto; src="./../images/coins.png"/> -->
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Booking Amount Today</h5>
                                        <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">
                                                
                                                <?php

                                                
                                                // if(!$accountant->total_income()){
                                                //     echo '<a class="nav-link" href="./pages/r?inv17ml44=add_bill_items">Add Item</a>';
                                                // }else{
    
                                                //     echo "GHS ". number_format($accountant->total_income(), 2, '.', ',');
                                                   
                                                // }

                                                
                                            if(!$accountant->total_booking_amount_today()){
                                                echo 'NA';
                                            }else{
                                                echo "GH&#x20B5; ".number_format($accountant->total_booking_amount_today(), 2, '.', ',');;
                                            }
                                               
                                                
                                                ?> 
    
    
                                                </h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                        <!-- <img style="margin-top: -50px;" width=90px height=auto; src="./../images/coins.png"/> -->
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>

                            <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Expense</h5>
                                        <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">
                                                
                                                <?php
                                                // if(!$accountant->total_expense()){
                                                //     echo '<a class="nav-link" href="./pages/r?inv17ml44=add_amt_inexp">Add Item</a>';
                                                // }else{
    
                                                //     echo "GHS ". number_format($accountant->total_expense(), 2, '.', ',');
                                                   
                                                // }
                                               
                                                
                                                ?> 
    
    
                                                </h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                          
                                        </div>
                                    </div>
                                    
                                </div>
                            </div> -->



                        </div>

                     
                        <div class="row">

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Expense</h5>
                                        <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">
                                                
                                        <?php
                                                if(!$accountant->total_expense()){
                                                    echo '<a class="nav-link" href="./pages/r?inv17ml44=add_amt_inexp">Add Item</a>';
                                                }else{
    
                                                    echo "GHS ". number_format($accountant->total_expense(), 2, '.', ',');
                                                   
                                                }
                                               
                                                
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
                                        <h5 class="text-muted">Total Added Income</h5>
                                        <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">
                                                
                                                <?php
                                                if(!$accountant->total_income()){
                                                    echo '<a class="nav-link" href="./pages/r?inv17ml44=add_bill_items">Add Item</a>';
                                                }else{
    
                                                    echo "GHS ". number_format($accountant->total_income(), 2, '.', ',');
                                                   
                                                }
                                                
                                                ?> 
    
    
                                                </h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <!-- <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                          
                           
                            
                          
                          
                           
                      
                        </div>

<!-- 
                        
                        <div class="row" >
                            
                               
                            <div  class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div  class="card">
                                    <div class="card-header">
                                      
                                        <h5 class="mb-0">Expense Report Chart</h5>
                                    </div>
                                    <div style="background : whitesmoke;" class="card-body">
                                    <div style="height : 270px; width :auto;" id="expense_chart" style=""></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div  class="card">
                                    <div class="card-header">
                                      
                                        <h5 class="mb-0">Added Income Report Chart</h5>
                                    </div>
                                    <div style="background : whitesmoke;" class="card-body">
                                    <div style="height : 270px; width :auto;" id="income_added" style=""></div>
                                    </div>
                                </div>
                            </div>

                       
                          
                           
                        </div> -->

 

                         
                        <div class="row">
	                       
	                        <div class="col-lg-12">
	                            <div class="section-block">
	                                <h3 class="section-title"> Monthly Bookings</h3>
	                            </div>
	                            <div class="card">
	                                <div class="campaign-table table-responsive">
                                    <table id="usersactivityfinancials" class="table table-striped table-bordered second" style="width:100%">
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
                                    
                                        
                                    $accountant->bookings_last_30_days(); 
                                        
                                        
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
                </div>
            </div>
           
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