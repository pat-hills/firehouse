<?php
require_once './../class/user.php';
 require_once './../pdoconn/config.php';


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
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                  
                   
                   
                    <div class="ecommerce-widget">

<!--                         
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                     
                 

                    <div style="border-radius:10px;" class="card">
                        <div class="card-body">
                           
                            <h3 style="color: #7b27d8;" class="mb-1">Tithes, Pledges & More</h3>
                            <div class="metric-value d-inline-block">
                                <h4 class="text-muted">Received payments today? </br> Record and send notifications now!</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <a href="./pages/r?inv17ml44=view_members_for_payments" class="btn btn-danger">Make entries for payments</a>
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
 
                </div>
               
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div style="border-radius:10px;" class="card">
                        <div class="card-body">
                            <h3 style="color: #7b27d8;" class="mb-1">Visualize Metrics </h3>
                            <div class="metric-value d-inline-block">
                                <h4 class="text-muted">Things might have piled up,  </br> 
                                keep observing your metrics everyday.</h4>
                               
                            </div>
                            <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                <a href="#" class="btn btn-primary">Go to charts</a>
                            </div>
                        </div>
                        <div id="sparkline-revenue3"></div>
                    </div>
                </div>
               

            </div>
 -->

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h3 class="pageheader-title">Financials - Payments </h3>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                     
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> 


            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">

                    <a href="#">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">

                     
                          
                        <!-- <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-members-image" src="../images/group_users.png" />
                        -->
                        </br>
                        </br> 
                        </br> 
                            <h1 style="color: #7b27d8;"  class="mb-1">
                            <?php

                             if(!$accountant->metric_sum_payments_today()){
                                                echo '0.00';
                                            }else{

                                                echo "GHS ". number_format($accountant->metric_sum_payments_today(), 2, '.', ',');
                                               
                                            }
                            
                             
                            ?>
                         
                        </h1>
                            <div class="metric-value d-inline-block">
                                <h4  class="text-muted">Payment Received Today</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                   </a>

                </div>
   
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="#">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">

                     
                          
                        <!-- <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-members-image" src="../images/group_users.png" />
                        -->
                        </br>
                        </br>
                        </br>
                            <h1 style="color: #7b27d8;"  class="mb-1">
                        
                            <?php

if(!$accountant->metric_sum_payments_weekly()){
                   echo '0.00';
               }else{

                   echo "GHS ". number_format($accountant->metric_sum_payments_weekly(), 2, '.', ',');
                  
               }


?>
                        
                        </h1>
                            <div class="metric-value d-inline-block">
                                <h4  class="text-muted">Payment Received This Week</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                   </a>

                </div>
              
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="#">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">

                     
                          
                        <!-- <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-members-image" src="../images/group_users.png" />
                        -->
                        </br>
                        </br>
                        </br>
                            <h1 style="color: #7b27d8;"  class="mb-1">
                        
                            <?php

if(!$accountant->metric_sum_payments_monthly()){
                   echo '0.00';
               }else{

                   echo "GHS ". number_format($accountant->metric_sum_payments_monthly(), 2, '.', ',');
                  
               }


?>
                        
                        </h1>
                            <div class="metric-value d-inline-block">
                                <h4  class="text-muted">Payment Received This Month</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                   </a>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="#">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">

                     
                          
                        <!-- <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-members-image" src="../images/group_users.png" />
                        -->
                        </br>
                        </br>
                        </br>
                            <h1 style="color: #7b27d8;"  class="mb-1">
                        
                            <?php

if(!$accountant->metric_sum_payments_yearly()){
                   echo '0.00';
               }else{

                   echo "GHS ". number_format($accountant->metric_sum_payments_yearly(), 2, '.', ',');
                  
               }


?>
                        
                        </h1>
                            <div class="metric-value d-inline-block">
                                <h4  class="text-muted">Payment Received This Year</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                   </a>
                </div>


                </div>




                <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h3 class="pageheader-title">People - Members Population </h3>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                     
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
               </div> 


            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">

                    <a href="#">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">

                     
                          
                        <!-- <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-members-image" src="../images/group_users.png" />
                        -->
                        </br>
                        </br> 
                        </br> 
                            <h1 style="color: #7b27d8;"  class="mb-1">
                            <?php

                             if(!$secretary->count_all_members()){
                                                echo '0';
                                            }else{

                                                echo " ".$secretary->count_all_members();
                                               
                                            }
                            
                             
                            ?>
                         
                        </h1>
                            <div class="metric-value d-inline-block">
                                <h4  class="text-muted">Total Members</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                   </a>

                </div>
   
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="#">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">

                     
                          
                        <!-- <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-members-image" src="../images/group_users.png" />
                        -->
                        </br>
                        </br>
                        </br>
                            <h1 style="color: #7b27d8;"  class="mb-1">
                        
                            <?php

if(!$secretary->count_all_members_females()){
    echo '0';
}else{

    echo " ".$secretary->count_all_members_females();
   
}


?>
                        
                        </h1>
                            <div class="metric-value d-inline-block">
                                <h4  class="text-muted">Total Females</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                   </a>

                </div>
              
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                  <a href="#">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">

                     
                          
                        <!-- <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-members-image" src="../images/group_users.png" />
                        -->
                        </br>
                        </br>
                        </br>
                            <h1 style="color: #7b27d8;"  class="mb-1">
                        
                            <?php

if(!$secretary->count_all_members_males()){
    echo '0';
}else{

    echo " ".$secretary->count_all_members_males();
   
}


?>
                        
                        </h1>
                            <div class="metric-value d-inline-block">
                                <h4  class="text-muted">Total Males</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                   </a>
                </div>

         


                </div>



  

                <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h3 class="pageheader-title">People - Visitors Population </h3>
                        <p class="pageheader-text"></p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                     
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
               </div> 


            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">

                    <a href="#">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">

                     
                          
                        <!-- <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-members-image" src="../images/group_users.png" />
                        -->
                        </br>
                        </br> 
                        </br> 
                            <h1 style="color: #7b27d8;"  class="mb-1">
                            <?php

                             if(!$secretary->count_all_visitors_this_month()){
                                                echo '0';
                                            }else{

                                                echo " ".$secretary->count_all_visitors_this_month();
                                               
                                            }
                            
                             
                            ?>
                         
                        </h1>
                            <div class="metric-value d-inline-block">
                                <h4  class="text-muted">Total Visitors This Month</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                   </a>

                </div>
   
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="#">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">

                     
                          
                        <!-- <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-members-image" src="../images/group_users.png" />
                        -->
                        </br>
                        </br>
                        </br>
                            <h1 style="color: #7b27d8;"  class="mb-1">
                        
                            <?php

if(!$secretary->count_all_visitors_this_year()){
    echo '0';
}else{

    echo " ".$secretary->count_all_visitors_this_year();
   
}


?>
                        
                        </h1>
                            <div class="metric-value d-inline-block">
                                <h4  class="text-muted">Total Visitors This Year</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                   </a>

                </div>
              
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                  <a href="#">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">

                     
                          
                        <!-- <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-members-image" src="../images/group_users.png" />
                        -->
                        </br>
                        </br>
                        </br>
                            <h1 style="color: #7b27d8;"  class="mb-1">
                        
                            <?php

if(!$secretary->count_all_visitors()){
    echo '0';
}else{

    echo " ".$secretary->count_all_visitors();
   
}


?>
                        
                        </h1>
                            <div class="metric-value d-inline-block">
                                <h4  class="text-muted">Total Visitors All Time</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                   </a>
                </div>

         


                </div>  




                    </div>
                </div>
            </div>
           
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2023 Firehouse. All rights reserved. Dashboard by <a href="firehouse.com">Fire House</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>