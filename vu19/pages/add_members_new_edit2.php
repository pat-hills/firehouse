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
                            <h2 class="pageheader-title">Editing Information</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                                    </ol>
                                </nav>
                            </div>
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
                                <h5 class="card-header">Member Form</h5>
                                <div class="card-body">
                                    <form method="post" action="pages/add_members_action_edit" enctype="multipart/form-data">

                                    <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Member ID</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="id" readonly
                                                
                                                value="<?php
                                             $id =  $secretary -> get_all_member_detail_by_id();
                                             echo $id['member_id'];
                                           
                                           
                                           ?>"
                                                
                                                
                                                 required placeholder="Last Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Last Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input style="text-align: left;" type="text" name="last_name"
                                                
                                                value="<?php
                                             $last_name =  $secretary -> get_all_member_detail_by_id();
                                             echo $last_name['last_name'];?>"
                                                
                                                
                                                 required placeholder="Last Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">First Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input style="text-align: left;" type="text" required name="first_name"
                                                
                                                value="<?php
                                             $first_name =  $secretary -> get_all_member_detail_by_id();
                                             echo $first_name['first_name'];
                                       
                                           
                                           ?>"  placeholder="First Name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Tittle</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select name="tittles" type="text"  class="form-control">
                                                    <option>
                                                    <?php   $tittle = $secretary->get_all_member_detail_by_id();
                                                    echo $tittle['tittles'];
                                                    ?>
                                                    </option>
                                                    <option>Dr.</option>
                                                    <option>Prof.</option>
                                                    <option>Rev. Fr.</option>
                                                    <option>Rev. Msgr. Dr.</option>
                                                    <option>Rev. Msgr. Prof.</option>
                                                    <option>Justice.</option>
                                                    <option>Esq.</option>
                                                    <option>H.E</option>
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Date Of Birth</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="date" value="
                                                <?php   $dob = $secretary->get_all_member_detail_by_id();
                                                    echo $dob['dob'];
                                                    ?>
                                                " required name="dob"  placeholder="Max 6 chars." class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Place Of Birth</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input style="text-align: left;" type="text" name="place_of_birth"
                                                value=" <?php   $place_of_birth = $secretary->get_all_member_detail_by_id();
                                                    echo $place_of_birth['place_of_birth'];
                                                    ?>"
                                                
                                                 required placeholder="Place Of Birth" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Region Of Birth</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select name="region_of_birth" type="text" required  class="form-control">
                                                    <option>
                                                    <?php   $region_of_birth = $secretary->get_all_member_detail_by_id();
                                                    echo $region_of_birth['region_of_birth'];
                                                    ?>
                                                    </option>
                                                    <option>Ashanti Region</option>
                                                    <option>Eastern Region</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Country Of Birth</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select name="country_of_birth" type="text" required  class="form-control">
                                                    <option>
                                                    <?php   $country_of_birth = $secretary->get_all_member_detail_by_id();
                                                    echo $country_of_birth['country_of_birth'];
                                                    ?>
                                                    </option>
                                                    <option>Ghana</option>
                                                    <option>Benin</option>
                                                </select>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Profession</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input name="profession" style="text-align:left;" type="text"
                                                
                                                value="
                                                <?php   $profession = $secretary->get_all_member_detail_by_id();
                                                    echo $profession['profession'];
                                                    ?>
                                                "
                                                 required placeholder="Profession" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email ID</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input name="email_id" type="email"
                                                value="
                                                <?php   $email_id = $secretary->get_all_member_detail_by_id();
                                                    echo $email_id['email_id'];
                                                    ?>
                                                "
                                                
                                                 required  placeholder="Email ID" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Phone Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="phone_number"
                                                
                                                value="
                                                <?php   $phone_number = $secretary->get_all_member_detail_by_id();
                                                    echo $phone_number['phone_number'];
                                                    ?>
                                                " house_address
                                                   required  placeholder="Phone Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">House Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input required type="text" name="house_address" 
                                                value="
                                                <?php   $house_address = $secretary->get_all_member_detail_by_id();
                                                    echo $house_address['house_address'];
                                                    ?>
                                                " 
                                                
                                                 placeholder="House Address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row"> 
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">How Long Have You Lived There?</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="long_lived_house"
                                                value="
                                                <?php   $long_lived_house = $secretary->get_all_member_detail_by_id();
                                                    echo $long_lived_house['long_lived_house'];
                                                    ?>
                                                " 
                                                  placeholder="How Long Have You Lived There?" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Former Residence (If (9) Less Than 3 years</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="house_less_than_3" 
                                                value="
                                                <?php   $house_less_than_3 = $secretary->get_all_member_detail_by_id();
                                                    echo $house_less_than_3['house_less_than_3'];
                                                    ?>
                                                " 
                                                  placeholder="Former Residence (If (9) Less Than 3 years" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row"> 
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Postal Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"   value="
                                                <?php   $postal_address = $secretary->get_all_member_detail_by_id();
                                                    echo $postal_address['postal_address'];
                                                    ?>
                                                "  name="postal_address"  placeholder="Postal Address" class="form-control">
                                            </div>
                                        </div>

                                       

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Are you married</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select type="text" name="married"  placeholder="Postal Address" class="form-control">
                                                <option> 
                                                <?php   $married = $secretary->get_all_member_detail_by_id();
                                                    echo $married['married'];
                                                    ?>
                                                </option>
                                                    <option>YES</option>
                                                    <option>NO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">What Kind Of Marriage</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select type="text" name="married_type"  placeholder="Postal Address" class="form-control">
                                                <option>
                                                <?php   $married_type = $secretary->get_all_member_detail_by_id();
                                                    echo $married_type['married_type'];
                                                    ?>
                                                </option>
                                                    <option>CUSTOMARY</option>
                                                    <option>REGISTRY</option>
                                                    <option>CHURCH</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Welfare PIN</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="welfare_pin" 
                                                value="  <?php   $welfare_pin = $secretary->get_all_member_detail_by_id();
                                                    echo $welfare_pin['welfare_pin'];
                                                    ?> "
                                                
                                                
                                                  placeholder="Welfare PIN" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-sm-right">INNITIATION DATA</label>
                                            <div class="col-sm-6">
                                                <div class="custom-controls-stacked">
                                                    
                                                    <div id="error-container1"></div>
                                                </div>
                                            </div>
                                        </div>


                                        
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Date Of Initiation</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="date" name="date_of_initiation" required  class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Council/Court Of Initiation</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input   type="text" name="court_initiation"
                                                
                                                value="  <?php   $court_initiation = $secretary->get_all_member_detail_by_id();
                                                    echo $court_initiation['court_initiation'];
                                                    ?> "
                                                
                                                 required="" placeholder="Council/Court Of Initiation" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Select House</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select required  name="house" class="form-control">
                                                    <option>
                                                    <?php   $house_name = $secretary->get_all_member_detail_by_id();
                                                    echo $house_name['house_name'];
                                                    ?>
                                                    </option>
                                                    <?php $secretary->housesdropdown() ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Current Rank</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select required name="rank" type="text"  placeholder="Postal Address" class="form-control">
                                                <option>
                                                    <?php   $ranks = $secretary->get_all_member_detail_by_id();
                                                    echo $ranks['ranks'];
                                                    ?>
                                                    </option>
                                                     <option>Bro.</option>
                                                    <option>W/Bro.</option>
                                                    <option>Sir Kt. Bro.</option>
                                                    <option>Sir Kt. Bro.</option>
                                                    <option>Sis.</option>
                                                    <option>RL.</option>
                                                    <option>MRL.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">LDE Status</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <select type="text" name="lde_status"  placeholder="Postal Address" class="form-control">
                                                <option>
                                                    <?php   $lde_status = $secretary->get_all_member_detail_by_id();
                                                    echo $lde_status['lde_status'];
                                                    ?>
                                                    </option>
                                                    <option>PASSED</option>
                                                    <option>PASSED WITH DISTINCTION</option>
                                                    <option>YET TO WRITE</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Proposer's Name(s) NB: Saparate each <br/> with comma (,)</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <textarea name="prospers_names"  required=""  class="form-control">
                                                <?php   $prospers_names = $secretary->get_all_member_detail_by_id();
                                                    echo $prospers_names['prospers_names'];
                                                    ?>
                                                
                                                
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name Of Parish</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input  type="text" name="name_of_parish" required=""
                                                
                                                value=" <?php   $name_of_parish = $secretary->get_all_member_detail_by_id();
                                                    echo $name_of_parish['name_of_parish'];
                                                    ?> "
                                                
                                                 placeholder="Name Of Parish" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Place Of Baptism</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input name="place_of_baptism"  type="text" required=""
                                                
                                                value=" <?php   $place_of_baptism = $secretary->get_all_member_detail_by_id();
                                                    echo $place_of_baptism['place_of_baptism'];
                                                    ?> "
                                                
                                                
                                                 placeholder="Place Of Baptism" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-sm-right">FAMILY DATA</label>
                                            <div class="col-sm-6">
                                                <div class="custom-controls-stacked">
                                                    
                                                    <div id="error-container1"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Father's Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input  type="text" name="fathers_name" required
                                                
                                                
                                                value=" <?php   $fathers_name = $secretary->get_all_member_detail_by_id();
                                                    echo $fathers_name['fathers_name'];
                                                    ?> "
                                                 placeholder="Father's Name" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Father's Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input  type="text" name="fathers_address" required=""
                                                
                                                value=" <?php   $fathers_address = $secretary->get_all_member_detail_by_id();
                                                    echo $fathers_address['fathers_address'];
                                                    ?> "
                                                
                                                 placeholder="Father's Name" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mother's Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input  type="text"  name="mothers_name" 
                                                
                                                value=" <?php   $mothers_name = $secretary->get_all_member_detail_by_id();
                                                    echo $mothers_name['mothers_name'];
                                                    ?> "
                                                
                                                 required="" placeholder="Father's Name" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Mother's Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input  type="text" name="mothers_address" 
                                                
                                                value=" <?php   $mothers_address = $secretary->get_all_member_detail_by_id();
                                                    echo $mothers_address['mothers_address'];
                                                    ?> "
                                                 placeholder="Father's Name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name of Spouse</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input  type="text" required="" 
                                                
                                                value=" <?php   $name_of_spouse = $secretary->get_all_member_detail_by_id();
                                                    echo $name_of_spouse['name_of_spouse'];
                                                    ?> "
                                                 name="name_of_spouse" placeholder="Name of Spouse" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Spouse's Phone number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input name="spouse_number"    value=" <?php   $spouse_number = $secretary->get_all_member_detail_by_id();
                                                    echo $spouse_number['spouse_number'];
                                                    ?> " type="text" required="" placeholder="Spouse's Phone number" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Spouse's Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input  type="text" name="spouse_address" 
                                                value=" <?php   $spouse_address = $secretary->get_all_member_detail_by_id();
                                                    echo $spouse_address['spouse_address'];
                                                    ?> "
                                                
                                                 placeholder="Spouse's Address" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Number Of Children</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input   
                                                value=" <?php   $number_of_children = $secretary->get_all_member_detail_by_id();
                                                    echo $number_of_children['number_of_children'];
                                                    ?> "
                                                
                                                 type="text" name="number_of_children"  class="form-control">
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Names of Childeren NB: Saparate each <br/> with comma (,)</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <textarea name="names_of_children" required="" class="form-control">
                                                <?php   $names_of_children = $secretary->get_all_member_detail_by_id();
                                                    echo $names_of_children['names_of_children'];
                                                    ?> "
                                                
                                                </textarea>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Browse For Picture</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input  type="file" name="file_image" required="" placeholder="Spouse's Address" class="form-control">
                                            </div>
                                        </div> -->


                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button onclick="return(confirm('Are you sure you want to edit? Click OK to finish action or Cancel'))" type="submit" class="btn btn-space btn-primary">EDIT</button>
                                                <a href="./pages/r?inv17ml44=add_members" class="btn btn-space btn-secondary">Cancel</a>
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
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
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