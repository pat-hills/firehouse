<?php
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
                            <h2 class="pageheader-title">EDIT GUEST DETAILS FORM</h2>
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
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Guest Form</h5>
                                <div class="card-body">
                                    <form method="post" action="pages/add_members_action_edit" enctype="multipart/form-data">
                                    <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Member ID</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="id" readonly
                                                
                                                value="<?php
                                             $id =  $secretary -> get_all_member_detail_by_id();
                                             echo $id['id'];
                                           
                                           
                                           ?>"
                                                
                                                
                                                 required placeholder="Last Name" class="form-control">
                                            </div>
                                        </div>

                                    <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Fullname</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required name="fullname"
                                                  
                                                value="<?php
                                             $first_name =  $secretary -> get_all_member_detail_by_id();
                                             echo $first_name['fullname'];?>"

                                                  placeholder="Fullname" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  name="email" 
                                                value="<?php
                                             $email =  $secretary -> get_all_member_detail_by_id();
                                             echo $email['email'];?>"
                                                
                                                  placeholder="Email" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Contact</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"
                                                value="<?php
                                             $contact =  $secretary -> get_all_member_detail_by_id();
                                             echo $contact['contact'];?>"
                                                
                                                 name="contact" required placeholder="Contact" class="form-control">
                                            </div>
                                        </div>
                                        

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Card</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select name="identity_card" type="text"  class="form-control">
                                                    <option>
                                                    <?php
                                             $identity_card =  $secretary -> get_all_member_detail_by_id();
                                             echo $identity_card['identity_card'];?>
                                                    </option>
                                                    <option>GHANA CARD</option>
                                                                                     <option>SSNIT</option>
                                                                                     <option>PASSPORT</option>
                                                                                     <option>VOTER ID</option>
                                                                                     <option>DRIVING LICENSE</option>
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">ID Card No</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"
                                                value="<?php
                                             $id_number =  $secretary -> get_all_member_detail_by_id();
                                             echo $id_number['id_number'];?>"
                                                
                                                 name="id_number" required placeholder="ID Card No" class="form-control">
                                            </div>
                                        </div>

                                   
                                         
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input
                                                value="<?php
                                             $address =  $secretary -> get_all_member_detail_by_id();
                                             echo $address['address'];?>"
                                                
                                                 name="address" type="text" required placeholder="Address" class="form-control">
                                            </div>
                                        </div>



                                       

                                     
                                      


                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                <button class="btn btn-space btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

              
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
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
                        </div>
                    </div> -->

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