<?php 
require_once './../class/user.php';

require_once './../pdoconn/config.php';
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
	                            
	                            <div class="page-breadcrumb">
	                                <nav aria-label="breadcrumb">
	                                    <ol class="breadcrumb">
	                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
	                                        <li class="breadcrumb-item active" aria-current="page">Users & Members Dashboard</li>
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
	                                        <h5 class="text-muted">Total Users</h5>
                                            <h2 class="mb-0">
												
												<?php
                                            if(!$user->count_all_users()){
                                                echo '<a class="nav-link" href="./pages/r?inv17ml44=add_u_sers">N/A</a>';
                                            }else{
                                                echo  $user->count_all_users();
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
	                                        <h5 class="text-muted">Activities Done Today</h5>
	                                        <h2 class="mb-0">
											<?php
                                            if(!$user->count_total_activities_done_today()){
                                                echo '<a class="nav-link" href="./pages/r?inv17ml44=add_u_sers">0</a>';
                                            }else{
                                                echo  $user->count_total_activities_done_today();
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
	                                        <h5 class="text-muted">Monthly Activities Done</h5>
	                                        <h2 class="mb-0">
											<?php
                                            if(!$user->count_total_activities_done_monthly()){
                                                echo '<a class="nav-link" href="./pages/r?inv17ml44=add_u_sers">0</a>';
                                            }else{
                                                echo  $user->count_total_activities_done_monthly();
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
	                                        <h5 class="text-muted">Yearly Activities Done</h5>
											<h2 class="mb-0">
											<?php
                                            if(!$user->count_total_activities_done_yearly()){
                                                echo '<a class="nav-link" href="./pages/r?inv17ml44=add_u_sers">0</a>';
                                            }else{
                                                echo  $user->count_total_activities_done_yearly();
                                            }
                                           
                                            
											?> 
											</h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
	                                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                      
						</div>
						

	                   
	                    <!-- <div class="row"> -->
	                        
	                        <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">

	                            <div class="card">
	                                <h5 class="card-header">Followers by Gender</h5>
	                                <div class="card-body">
	                                    <div id="gender_donut" style="height: 230px;"></div>
	                                </div>
	                                <div class="card-footer p-0 bg-white d-flex">
	                                    <div class="card-footer-item card-footer-item-bordered w-50">
	                                        <h2 class="mb-0"> 60% </h2>
	                                        <p>Female </p>
	                                    </div>
	                                    <div class="card-footer-item card-footer-item-bordered">
	                                        <h2 class="mb-0">40% </h2>
	                                        <p>Male </p>
	                                    </div>
	                                </div>
								</div>
								
	                        </div> -->
	                       
	                        <!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12"> -->

	                            <!-- <div class="card">
	                                <h5 class="card-header">Followers by Age</h5>
	                                <div class="card-body">
	                                    <div class="mb-3">
	                                        <div class="d-inline-block">
	                                            <h4 class="mb-0">15 - 20</h4>
	                                        </div>
	                                        <div class="progress mt-2 float-right progress-md">
	                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 45%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
	                                        </div>
	                                    </div>
	                                    <div class="mb-3">
	                                        <div class="d-inline-block">
	                                            <h4 class="mb-0">20 - 25</h4>
	                                        </div>
	                                        <div class="progress mt-2 float-right progress-md">
	                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 55%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
	                                        </div>
	                                    </div>
	                                    <div class="mb-3">
	                                        <div class="d-inline-block">
	                                            <h4 class="mb-0">25 - 30</h4>
	                                        </div>
	                                        <div class="progress mt-2 float-right progress-md">
	                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
	                                        </div>
	                                    </div>
	                                    <div class="mb-3">
	                                        <div class="d-inline-block">
	                                            <h4 class="mb-0">30 - 35</h4>
	                                        </div>
	                                        <div class="progress mt-2 float-right progress-md">
	                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 35%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
	                                        </div>
	                                    </div>
	                                    <div class="mb-3">
	                                        <div class="d-inline-block">
	                                            <h4 class="mb-0">35 - 40</h4>
	                                        </div>
	                                        <div class="progress mt-2 float-right progress-md">
	                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 21%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
	                                        </div>
	                                    </div>
	                                    <div class="mb-3">
	                                        <div class="d-inline-block">
	                                            <h4 class="mb-0">45 - 50</h4>
	                                        </div>
	                                        <div class="progress mt-2 float-right progress-md">
	                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 85%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
	                                        </div>
	                                    </div>
	                                    <div class="mb-3">
	                                        <div class="d-inline-block">
	                                            <h4 class="mb-0">50 - 55</h4>
	                                        </div>
	                                        <div class="progress mt-2 float-right progress-md">
	                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
	                                        </div>
	                                    </div>
	                                </div>
								</div>
								
								 -->
	                        <!-- </div> -->
	                     
	                        <!-- <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12">
	                            <div class="card">
	                                <h5 class="card-header">Top Folllowes by Locations </h5>
	                                <div class="card-body">
	                                    <canvas id="chartjs_bar_horizontal"></canvas>
	                                </div>
	                            </div>
	                        </div> -->
	                        
						<!-- </div> -->


						
	                    <div class="row">
	                        <!-- ============================================================== -->
	                        <!-- campaign activities   -->
	                        <!-- ============================================================== -->
	                        <div class="col-lg-12">
	                            <div class="section-block">
	                                <h3 class="section-title">User's Activities Timelines</h3>
	                            </div>
	                            <div class="card">
	                                <div class="campaign-table table-responsive">
	                                    <table id="usersactivitydashboard" class="table">

										<thead>
                                            <tr>
                                            <th>Task</th>
                                                <th>Summary</th>
												<th>Time</th>
												<th>Name Of User</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                    
                                        
                                      $user->all_users_activities(); 
                                        
                                        
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
											<th>Task</th>
                                                <th>Summary</th>
												<th>Time</th>
												<th>Name Of User</th>
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
											  
											Copyright © <?php echo date("Y") ?> Spencam. All rights reserved. Dashboard by <a href="#">Spencam Group</a>.
											</div>
	                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
	                                            <div class="text-md-right footer-links d-none d-sm-block">
	                                                <a href="javascript: void(0);"></a>
	                                                <a href="javascript: void(0);"></a>
	                                                <a href="javascript: void(0);"> </a>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            
	                        </div>
	                        
	                    </div>