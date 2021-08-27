<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php
      include ("style.php");

  ?>
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <?php

        include("header.php")
    ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php
        include("menu.php");
    ?>
    <!-- /.sidebar -->
  </aside>
  <?php 
  include("style.php");
  include("queries/connection.php");
?>
<?php
 $reg=@$_POST['txtreg'];
 if($reg!='')
 {
  if (isset($_POST['btnsubmit']))
  {
    $sql="INSERT INTO registerm(firstname,middlename,lastname,dob,age,gender,contactno,alternetno,email,adline1,adline2,
                                landmark,pincode,country,state,city,area,file,pas,rpas ) values('$reg',1)";
    if(mysqli_query($con,$sql))
       {
            echo "<script type='text/javascript'>alert(' Added Successfully');</script>";
            echo "<script>select();</script>";
         
        } 
        else
        {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
        mysqli_close($con);
  }
 }
?>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Register Form </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <form>
     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"><b>Register Form</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form  method="post" action="register.php" name="txtreg">
                  <div class="row">
                    <div class="row">
                      <div class="col-sm-6">
                        <label>First Name :</label>
                        <input type="text" name="fname" class="form-control" placeholder="Enter ..." size="33.33">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <label>Middle Name : </label>
                        <input type="text" name="mname" class="form-control" placeholder="Enter ..." size="33.33">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <label>Last Name : </label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter ..." size="33.34">
                      </div>
                    </div>
                  <div>
                   <br/>
                   <div class="row">
                    <div class="col-sm-6">
                    <label>Date Of Birth</label>
                    <input type="date" name="dob" class="form-control"  placeholder="Enter Date"  >
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                        <label>Age : </label>
                        <input type="number" name="age" class="form-control" placeholder="Enter ..."  >
                      </div>
                    </div>
                    <br/>
                  <div class="col-sm-6">
                      <br/>
                      <label>Gender :</label>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1" checked>
                          <label class="form-check-label">Female</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1" checked>
                          <label class="form-check-label">Other</label>
                        </div>
                        <br/>
                         <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <label>Contact No.</label>
                        <input type="number" name="cono" class="form-control" placeholder="Enter ..." >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <label>Alternet No.</label>
                        <input type="number" name="alno" class="form-control" placeholder="Enter ..." >
                      </div>
                    </div>
                  </div>
                  <label>Email :</label>
                   <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>

                  <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
               <div class="row">
                    <div class="col-sm-6">
                     
                      <div class="form-group">
                        <label >Address Line 1</label>
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                        <textarea class="form-control" name="adline1" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>

                   <div class="col-sm-6">
                      <div class="col-sm-6"></div>
                      <div class="form-group">
                        <label>Address Line 2</label>
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                        <textarea class="form-control" name="adline2" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                 <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Landmark</label>
                        <input type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Pincode</label>
                        <i class="fa fa-map-pin" aria-hidden="true"></i>
                        <input type="number" name="landmark" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                  <label>Select Country</label>
                        <select class="form-control" name="country" >
                          <option>India</option>
                          <option>Dubai</option>
                          <option>China</option>
                          <option>Australia</option>
                          <option>Canada</option>
                        </select>
                   </div>
                   <div class="col-sm-6">
                        <label>Select State</label>
                        <select class="form-control" name="state" >
                          <option>Gujrat</option>
                          <option>Maharastra</option>
                          <option>Delhi</option>
                          <option>Punjab</option>
                          <option>Madhya pradesh</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label>Select City</label>
                        <select class="form-control" name="city" >
                          <option>Gandhinagar</option>
                          <option>Ahmedabad</option>
                          <option>Surat</option>
                          <option>Bhavnagar</option>
                          <option>Patan</option>
                        </select>
                      </div>
                       <div class="col-sm-6">
                        <label>Select Area</label>
                        <select class="form-control" name="area">
                          <option>Sector 1</option>
                          <option>Sector 2</option>
                          <option>Sector 3</option>
                          <option>Sector 4</option>
                          <option>Sector 5</option>
                        </select>
                      </div>
                 <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" >
                        <label class="custom-file-label" for="">Choose file</label>
                      </div>
                      <div type="button" class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                   <br/>
                   
         <div class="input-group mb-3">
          <br/>
          <input type="password" name="pass" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" name="rpass" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <br/>
        <div class="row"> 
          <div class="col-sm-6">
                  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                </div>
                </div>
                <div> <div class="col-sm-6">
                  <button type="submit" class="btn btn-primary">Upload</button>
                </div>
                </div>
                <div> <div class="col-sm-6">
                  <button type="submit" class="btn btn-primary">Delete</button>
                </div>
                </div>
                 <div> <div class="col-sm-6">
                  <button type="submit" class="btn btn-primary">Cancle</button>
                </div>
                </div>
             </div>
       






                  
                 
                