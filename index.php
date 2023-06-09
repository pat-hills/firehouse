<?php

  $a = 0;
  if(isset($_GET['m'])){
      $a = $_GET['m'];
  }

?>


<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fire House</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="./assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/libs/css/style.css">
    <link rel="stylesheet" href="./assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background: url("back-cover.jpg") no-repeat center center fixed !important;
    background-size: cover !important;
        /* background-size: cover !important; */
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" action="v19/pages/a_reg_con" method="POST">
        <div class="card">
            <div class="card-header">
            <div style="margin-left:70px" class=""><a href="#"><img class="logo-img" height="auto" width="150" src="./assets/images/logo20.png" alt="logo"></a></div>
                <h3 class="mb-1" style="margin-left:35px">Create Admin Account</h3>
                <!-- <p>Please enter your user information.</p> -->

                <?php if ($a == 5) { ?>
                  <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <!-- <h2 class="card-title">Alert On Activity</h2> -->
                          <div class="alert alert-danger" role="alert">
                            <strong>Password Does Not Match</strong>!.
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
                          <!-- <h2 class="card-title">Alert On Activity</h2> -->
                          <div class="alert alert-danger" role="alert">
                            <strong>Contact Should Be 10 digits</strong>!.
                          </div>
                          
                          
                          
                      </div>
                  </div>
              </div>
          </div>
         
                <?php } ?>

            </div>
            <div class="card-body">

            <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="name_of_church" required placeholder="Name of church" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="location_of_church" required placeholder="Address or location of church" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="primary_contact_of_church" required placeholder="Primary contact of church" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="admin_firstname" required placeholder="Admin first name" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="admin_surname" required placeholder="Admin surname" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" name="admin_contact" required placeholder="Admin contact" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="admin_email" required placeholder="Admin email" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <input class="form-control form-control-lg"  type="password" name="password" required placeholder="Password" minlength="6">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" required name="confirm_password"  type="password" placeholder="Confirm Password" minlength="6">
                </div>
              
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-lg" value="Ghana" required="" name="country" placeholder="Country">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" name="submit" type="submit">Create Account</button>
                </div>
                <!-- <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                    </label>
                </div> -->
                
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="login" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>