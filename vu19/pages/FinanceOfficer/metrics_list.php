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
                            <h2 class="pageheader-title">Metrics & Records</h2>
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
                  <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title">Alert On Activity</h2>
                          <div class="alert alert-success" role="alert">
                            <strong>Successfully</strong>Done!.
                          </div>
                          
                          
                          
                      </div>
                  </div>
              </div>
          </div>
         
                <?php } ?>

                <?php if ($a == 6) { ?>
                  <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title">Alert On Activity</h2>
                          <div class="alert alert-danger" role="alert">
                            <strong>Failed On</strong> Activity!.
                          </div>
                          
                          
                          
                      </div>
                  </div>
              </div>
          </div>
         
                <?php } ?>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->

               
                                    
                             

                             
                <div class="row">
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                

                                <a style="float :right; margin-left:15px;"   href="./pages/r?inv17ml44=f_metrics" class="btn btn-success">
                                          View Metrics
                                        </a>
                                    
                                  
                                
                           
                            </div>

                            <div class="card-body">
                            <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                                <div class="section-block">
                                <h3 class="section-title">Financials - Payments</h3>
                                <p>Records show current payments and types with their durations</p>
                                </div>
                            <div class="tab-regular">
                                <ul class="nav nav-tabs " id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Today</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">This Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">This Month</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="ThisYear-tab" data-toggle="tab" href="#ThisYear" role="tab" aria-controls="ThisYear" aria-selected="false">This Year</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3>Payment Received - Today</h3>

                                    <div class="table-responsive">
                                    <table id="all_payments_today" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                            
                                            <th>Date </th>
                                            <th>Member Name </th>
                                                <th>Item</th>
                                                <th>Mode of Payment</th>
                                                <th>Amount</th>
                                                <th>Received By</th>
                                                
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                    
                                        
                                      $accountant->all_payments_today(); 
                                        
                                        
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Date </th>
                                            <th>Member Name </th>
                                                <th>Item</th>
                                                <th>Mode of Payment</th>
                                                <th>Amount</th>
                                                <th>Received By</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                   
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <h3>Payment Received - This Week</h3>
                                        
                                    <div class="table-responsive">
                                    <table id="all_payments_weekly" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                            
                                            <th>Date </th>
                                            <th>Member Name </th>
                                                <th>Item</th>
                                                <th>Mode of Payment</th>
                                                <th>Amount</th>
                                                <th>Received By</th>
                                                
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                    
                                        
                                      $accountant->all_payments_weekly(); 
                                        
                                        
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Date </th>
                                            <th>Member Name </th>
                                                <th>Item</th>
                                                <th>Mode of Payment</th>
                                                <th>Amount</th>
                                                <th>Received By</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                    </div>

                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                      <h3>Payment Received - This Month</h3>
                                      <div class="table-responsive">
                                      <table id="all_payments_monthly" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                            
                                            <th>Date </th>
                                            <th>Member Name </th>
                                                <th>Item</th>
                                                <th>Mode of Payment</th>
                                                <th>Amount</th>
                                                <th>Received By</th>
                                                
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                    
                                        
                                      $accountant->all_payments_monthly(); 
                                        
                                        
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Date </th>
                                            <th>Member Name </th>
                                                <th>Item</th>
                                                <th>Mode of Payment</th>
                                                <th>Amount</th>
                                                <th>Received By</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                       </div>
                                       
                                </div>

                                <div class="tab-pane fade" id="ThisYear" role="tabpanel" aria-labelledby="ThisYear-tab">
                                      <h3>Payment Received - This Year</h3>
                                      <div class="table-responsive">
                                      <table id="all_payments_yearly" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                            
                                            <th>Date </th>
                                            <th>Member Name </th>
                                                <th>Item</th>
                                                <th>Mode of Payment</th>
                                                <th>Amount</th>
                                                <th>Received By</th>
                                                
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                    
                                        
                                      $accountant->all_payments_yearly(); 
                                        
                                        
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Date </th>
                                            <th>Member Name </th>
                                                <th>Item</th>
                                                <th>Mode of Payment</th>
                                                <th>Amount</th>
                                                <th>Received By</th>
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
                        </div>
                    </div>
                     
                </div>

              
              
            </div>
            
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Copyright © 2022 Firehouse. All rights reserved. Dashboard by <a href="#">Firehouse</a>.
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


    <!-- </div>
   
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../../../../../cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
     <script src="../assets/vendor/datatables/js/data-table.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="../../../../../cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="../../../../../cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="../../../../../cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
</body>
 
</html> -->