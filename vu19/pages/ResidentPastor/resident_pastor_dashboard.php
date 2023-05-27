<?php
require_once './../class/user.php';
 require_once './../pdoconn/config.php';

  $a = 0;
  if(isset($_GET['m'])){
      $a = $_GET['m'];
  }

?> 
 
 <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                  
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title"><?php echo $user->greetings().", "." ". $user->get_user_firstName_by_userId(); ?> what do you want to do today? </h2>
                                <!-- <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p> -->
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"> Dashboard Overview </a></li>
                                            <!-- <li class="breadcrumb-item active" aria-current="page"></li> -->
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="ecommerce-widget">

                        
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                     
                 

                    <div style="border-radius:10px;" class="card">
                        <div class="card-body">
                           
                            <h3 style="color: #7b27d8;" class="mb-1">Tithes, Pledges & More</h3>
                            <div class="metric-value d-inline-block">
                                <h4 class="text-muted">Received payments today? </br> Record and send notifications now!</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <a href="./pages/r?inv17ml44=r_view_members_for_payments" class="btn btn-danger">Make entries for payments</a>
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
                                <a href="./pages/r?inv17ml44=r_metrics_charts" class="btn btn-primary">Go to charts</a>
                            </div>
                        </div>
                        <div id="sparkline-revenue3"></div>
                    </div>
                </div>
               

            </div>


            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h3 class="pageheader-title">Here are other things you can do! </h3>
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

                    <a href="./pages/r?inv17ml44=r_view_users">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">
                            <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-members-image" src="../images/group_users.png" />
                        </br>
                            <h3 style="color: #7b27d8;"  class="mb-1">Users</h3>
                            <div class="metric-value d-inline-block">
                                <h4  class="text-muted">Create your users and start team collaboration</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                   </a>

                </div>
   
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="./pages/r?inv17ml44=r_view_members_for_payments">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div  style="text-align: center;" class="card-body">
                            <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-payments-image" src="../images/payments.png" />
                        </br>
                            <h3 style="color: #7b27d8;" class="mb-1">Payments</h3>
                            <div class="metric-value d-inline-block">
                                <h4 class="text-muted">Record and view all members payments</h4>
                               
                            </div>
                            <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                               
                            </div>
                        </div>
                        <div id="sparkline-revenue3"></div>
                    </div>
                   </a>

                </div>
              
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="./pages/r?inv17ml44=r_metrics_list">
                        <div style="border-radius:10px; height:230px;" class="card">
                            <div style="text-align: center;" class="card-body">
                        <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-Metrics" src="../images/metrics.png" />
                            </br>
                            <h3 style="color: #7b27d8;" class="mb-1">Metrics</h3>
                            <div class="metric-value d-inline-block">
                                <h4 class="text-muted">View all trend and analysis</h4>
                               
                            </div>
                            <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                               
                            </div>
                        </div>
                        <div id="sparkline-revenue3"></div>
                    </div>
                    </a>
                </div>
                </div>



                <div class="row">

              

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <a href="./pages/r?inv17ml44=r_metrics_charts">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">
                            <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-Charts" src="../images/business_chart_report.png" />
                        </br> 
                            <h3 style="color: #7b27d8;" class="mb-1">Charts</h3>
                            <div class="metric-value d-inline-block">
                                <h4 class="text-muted">Get more data visualization on your metrics</h4>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                              
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                    </a>

                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
               
               </div>

              
              
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <!-- <a href="./pages/r?inv17ml44=view_members">
                    <div style="border-radius:10px; height:230px;" class="card">
                        <div style="text-align: center;" class="card-body">
                        <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-farmers" src="../images/friends.png" />
                        </br>
                            <h3 style="color: #7b27d8;" class="mb-1">Members</h3>
                            <div class="metric-value d-inline-block">
                                <h4 class="text-muted">New member? Here is a quick way to register</h4>
                               
                            </div>
                            <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                               
                            </div>
                        </div>
                        <div id="sparkline-revenue3"></div>
                    </div>
                   </a> -->

                </div>
            
             </div>

             <div class="row">

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
<!-- <a href="./pages/r?inv17ml44=view_members_birthdays">
        <div style="border-radius:10px; height:230px;" class="card">
            <div style="text-align: center;" class="card-body">
        <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-Birthdays" src="../images/balloons.png" />
            </br>
            <h3 style="color: #7b27d8;" class="mb-1">Birthday's</h3>
            <div class="metric-value d-inline-block">
                <h4 class="text-muted">View all Birthday's Today</h4>
               
            </div>
            <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
               
            </div>
        </div>
        <div id="sparkline-revenue3"></div>
    </div>
    </a> -->
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">

    <!-- <a href="#">
    <div style="border-radius:10px; height:230px;" class="card">
        <div style="text-align: center;" class="card-body">
            <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-Charts" src="../images/business_chart_report.png" />
        </br> 
            <h3 style="color: #7b27d8;" class="mb-1">Charts</h3>
            <div class="metric-value d-inline-block">
                <h4 class="text-muted">Get more data visualization on your metrics</h4>
            </div>
            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
              
            </div>
        </div>
        <div id="sparkline-revenue"></div>
    </div>
    </a>
     -->

</div>



<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">

<!-- <a href="./pages/r?inv17ml44=view_members">
    <div style="border-radius:10px; height:230px;" class="card">
        <div style="text-align: center;" class="card-body">
        <img style="width:60px; height:auto;display: block; margin-left: auto; margin-right: auto;" alt="Total-farmers" src="../images/friends.png" />
        </br>
            <h3 style="color: #7b27d8;" class="mb-1">Members</h3>
            <div class="metric-value d-inline-block">
                <h4 class="text-muted">New member? Here is a quick way to register</h4>
               
            </div>
            <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
               
            </div>
        </div>
        <div id="sparkline-revenue3"></div>
    </div>
   </a> -->

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