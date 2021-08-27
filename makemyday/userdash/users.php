<?php
    include "../business/database_connection.php";
    include "../business/loginsession.php";
    $cuserid = $_SESSION['CUser_ID'];   
    $userres=mysqli_query($Create_Connection,"Select * from userm,countrym,statem,citym where citym.cityid=userm.cityid and statem.stateid=citym.stateid and countrym.countryid=statem.countryid and userm.userid ='".$cuserid."'");
    $userrows=mysqli_fetch_array($userres);    
    $cres = mysqli_query($Create_Connection,"Select * from citym where isactive = 1 ORDER BY cityid");
    $sres=mysqli_query($Create_Connection,"Select * from statem where isactive = 1 ORDER BY stateid");
    $conres=mysqli_query($Create_Connection,"Select * from countrym where isactive = 1 ORDER BY countryid");
    
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>:: Manage Users ::</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script><!-- <!- table Edit -->            

  <!--<script>
      function disablecontrols(){
        var u = document.getElementById("Update");
        var d = document.getElementById("Delete");
        var c = document.getElementById("Cancel");
        u.style.display="none";
        d.style.display="none";
        c.style.display="none";
      }
      function enablecontrols(){
        var u = document.getElementById("Update");
        var d = document.getElementById("Delete");
        var c = document.getElementById("Cancel");
        u.style.display!="none";
        d.style.display!="none";
        c.style.display!="none"; 
      }
  </script>-->

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php include('header.php');?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php include('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>

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
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
           <div class="container-fluid">
        <div class="row">
          <!-- left column -->

          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="">
                  <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>First Name</label>
                      <input type="hidden" class="form-control" name="userid" value="<?php echo $userrows['userid'];?>">
                      <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="<?php echo $userrows['firstname'];?>">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Middle Name</label>
                      <input type="text" class="form-control" name="middlename" placeholder="Enter Middle Name" value="<?php echo $userrows['middlename'];?>">
                    </div>
                    </div>
                     <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Last Name</label>
                      <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" value="<?php echo $userrows['lastname'];?>">
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Gender</label>
                       <select class="form-control" name="gender" value="<?php echo $userrows['gender'];?>">
                            <option>Select Gender</option>
                            <option <?php if ($userrows['gender']=='Male'){echo 'Selected';}?>>Male</option>
                            <option <?php if ($userrows['gender']=='Female'){echo 'Selected';}?>>Female</option>      
                        </select>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Date of Birth</label>
                      <input type="date" class="form-control" name="dob" placeholder="dd-mm-yyyy" value="<?php echo $userrows['dateofbirth'];?>">
                    </div>
                    </div>
                     <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Contact no.</label>
                      <input type="text" class="form-control" name="contactno" placeholder="Enter Contact no" value="<?php echo $userrows['contactno'];?>">
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Alternate Contact no.</label>
                      <input type="text" class="form-control" name="alternatecontactno" placeholder="Enter Contact no" value="<?php echo $userrows['alternateno'];?>"> 
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Email</label>
                      <input type="email" class="form-control" name="emailid" placeholder="Enter Email ID" value="<?php echo $userrows['emailid'];?>">
                    </div>
                    </div>
                     <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Addressline 1</label>
                      <input type="text" class="form-control" name="addressline1" placeholder="Enter Addressline1" value="<?php echo $userrows['addressline1'];?>">
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Addressline 2</label>
                      <input type="text" class="form-control" name="addressline2" placeholder="Enter Addressline 2" value="<?php echo $userrows['addressline2'];?>"> 
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Road</label>
                      <input type="text" class="form-control" name="road" placeholder="Enter Road" value="<?php echo $userrows['road'];?>">
                    </div>
                    </div>
                     <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Landmark</label>
                      <input type="text" class="form-control" name="landmark" placeholder="Enter Landmark" value="<?php echo $userrows['landmark'];?>">
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Country</label>
                      <select class="form-control" name="country">
                            <option>Select Country</option>
                            <option value="<?php echo $userrows['countryname'];?>" selected><?php echo $userrows['countryname'];?></option>
                            <?php

                              while($conrow=mysqli_fetch_array($conres))
                              {
                                echo '<option>'.$conrow["countryname"].'</option>';
                              }

                            ?>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>State</label>
                      <select class="form-control" name="state">
                            <option>Select State</option>
                            <option value="<?php echo $userrows['statename'];?>" selected><?php echo $userrows['statename'];?></option>
                            <?php

                              while($srow=mysqli_fetch_array($sres))
                              {
                                echo '<option>'.$srow["statename"].'</option>';
                              }

                            ?>
                      </select>
                    </div>
                    </div>
                     <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>City</label>
                      <select class="form-control" name="city">
                            <option>Select City</option>
                            <option value="<?php echo $userrows['cityname'];?>" selected><?php echo $userrows['cityname'];?></option>
                            <?php

                              while($crow=mysqli_fetch_array($cres))
                              {
                                echo '<option>'.$crow["cityname"].'</option>';
                              }

                            ?>
                      </select>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Pincode</label>
                      <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" value="<?php echo $userrows['pincode'];?>"> 
                    </div>
                    </div>
                   <div class="col-md-4">
                    <div class="form-group" style="display:">
                      <label>Userphoto</label>
                      <input type="file" class="form-control" name="userphoto">
                    </div>
                    </div>
                     
                  </div>
                   
                  </div>
                    
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="Submit" name="Save" class="btn btn-primary btn-success fas fa-save"> Save</button>
                    <!--<button type="Submit" name="Update" class="btn btn-primary btn-warning fas fa-edit"> Update</button>
                    <button type="Submit" name="Delete" class="btn btn-primary btn-danger fas fa-trash-alt"> Delete</button>-->
                    <button type="Reset"  name="Cancel" class="btn btn-primary btn-info fas fa-stop-circle"> Cancel</button>
                  </div>
              </form>
              
            </div>
          </div>
           <div class="col-12">
            
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
     <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
     <!-- /.card-header -->
             
 
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="index.php">Make My Day</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
        function printDiv() { 
            //$('table tr td:eq(2)').hide();
            //$('table tr th:eq(2)').hide();
            var divContents = document.getElementById("Data").innerHTML; 
            var a = window.open('', '', 'height=600, width=600'); 
            a.document.write('<html>'); 
            a.document.write('<body > <h1>State Report<br><hr>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
            //$('table tr td:eq(2)').show();
            //$('table tr th:eq(2)').show();
        } 
        function exportTableToExcel(tableID, filename = 'Statereport'){
            //$('table tr td:eq(2)').hide();
            //$('table tr th:eq(2)').hide();
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            // Specify file name
          filename = filename?filename+'.xls':'excel_data.xls';  
          // Create download link element
          downloadLink = document.createElement("a");
          document.body.appendChild(downloadLink);
          
          if(navigator.msSaveOrOpenBlob){
              var blob = new Blob(['\ufeff', tableHTML], {
                  type: dataType
              });
              navigator.msSaveOrOpenBlob( blob, filename);
          }else{
              // Create a link to the file
              downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
          
              // Setting the file name
              downloadLink.download = filename;
              
              //triggering the function
              downloadLink.click();
            }
            //$('table tr td:eq(2)').show();
            //$('table tr th:eq(2)').show();
          }
</script> 
<script>
    
                var table = document.getElementById('City-table');
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("Cityid").value = this.cells[0].innerHTML;
                         document.getElementById("Cityname").value = this.cells[1].innerHTML;
                         document.getElementById("selectstate").value = this.cells[2].innerHTML;
                         window.scrollTo(0, 0);
                    };
                }
</script>

<!--<script>
    $(function()
    {
      
      $('#Save').click(function()
      {
        var City_Name = $('#Cityname').val();
        var State_Name=$('#selectstate').val();
        var City_ID=$('#Cityid').val();
        if(City_Name == "" || City_Name == null)
        {
          alert('Please enter your City name.');
        }
        else if(City_Name.length < 2)
        {
          alert('Entered City name is too short to use.\n\nPlease enter proper name.');
        }
        else if(isNaN(City_Name) == false)
        {
          alert('Your City name contains numbers which is not allowed.\n\nPlease enter only alphabets.');
        }
        else if(State_Name == "Select State")
        {
          alert('Please select your State.'); 
        }
        else
        {
          var City_Data_String = 'Cityname='+City_Name+'&Statename='+State_Name+'&Type=City';
          
          $.ajax
          ({
            type: "POST",
            url: "business/add.php",
            data: City_Data_String,
            cache: false,
            async: true,
            
            success: function(Received)
            { 
              var Received_Data = $.parseJSON(Received);
              
              if(Received_Data.Status_Type == 'CITY_ADDING_SUCCESSFUL')
              {
                alert(Received_Data.Status_Message);
                location.reload(true);
                window.scrollTo(0, 700);
              }
              else if(Received_Data.Status_Type == 'CITY_ALREADY_EXISTS')
              {
                alert(Received_Data.Status_Message);
              }
              else if(Received_Data.Status_Type == 'CITY_ADDING_FAILED')
              {
                alert(Received_Data.Status_Message);
              }
            }
          });
        }
      });
      
      $('#Update').click(function()
      {
        var City_Name = $('#Cityname').val();
        var City_ID = $('#Cityid').val();
        var State_Name=$('#selectstate').val();
        if(City_Name == "" || City_Name == null)
        {
          alert('Please Select City to update.');
        }
        else if(City_Name.length < 2)
        {
          alert('Entered City name is too short to use.\n\nPlease enter proper name.');
        }
        else if(isNaN(City_Name) == false)
        {
          alert('Your City name contains numbers which is not allowed.\n\nPlease enter only alphabets.');
        }
        else if(State_Name == "Select State")
        {
          alert('Please select your State.'); 
        }
        else
        {
          var City_Data_String = 'cityname='+City_Name+'&cityid='+City_ID+'&statename='+State_Name+'&Type=City';
          $.ajax
          ({
            type: "POST",
            url: "business/update.php",
            data: City_Data_String,
            cache: false,
            async: true,
            
            success: function(Received)
            { 
              var Received_Data = $.parseJSON(Received);
              
              if(Received_Data.Status_Type == 'CITY_UPDATED_SUCCESSFUL')
              {
                alert(Received_Data.Status_Message);
                location.reload(true);
                window.scrollTo(0, 700);
              }
              else if(Received_Data.Status_Type == 'CITY_ALREADY_EXISTS')
              {
                alert(Received_Data.Status_Message);
              }
              else if(Received_Data.Status_Type == 'CITY_UPDATION_FAILED')
              {
                alert(Received_Data.Status_Message);
              }
            }
          });
        }
      });

      $('#Delete').click(function()
      {
        var City_Name = $('#Cityname').val();
        var City_ID = $('#Cityid').val();
        var State_Name=$('#selectstate').val();
        if(City_Name == "" || City_Name == null)
        {
          alert('Please Select City to delete.');
        }
        else if(State_Name == "Select State")
        {
          alert('Please select your State.'); 
        }
        else
        {
          var City_Data_String = 'cityname='+City_Name+'&cityid='+City_ID+'&statename='+State_Name+'&Type=City';
          $.ajax
          ({
            type: "POST",
            url: "business/delete.php",
            data: City_Data_String,
            cache: false,
            async: true,
            
            success: function(Received)
            { 
              var Received_Data = $.parseJSON(Received);
              
              if(Received_Data.Status_Type == 'CITY_DELETED_SUCCESSFUL')
              {
                alert(Received_Data.Status_Message);
                location.reload(true);
                window.scrollTo(0, 700);
              }
              else if(Received_Data.Status_Type == 'CITY_DOES_NOT_EXISTS')
              {
                alert(Received_Data.Status_Message);
              }
              else if(Received_Data.Status_Type == 'CITY_DELETION_FAILED')
              {
                alert(Received_Data.Status_Message);
              }
            }
          });
        }
      });


      $('#Cancel').click(function()
      {
        $('#Cityname').val('');
      });
      
      $('#Search').click(function()
      {
        var Search_City_Name = $('#Search_City_Name').val();
        
        if(Search_City_Name == "" || Search_City_Name == null)
        {
          alert('Please enter your City name.');
        }
        else if(isNaN(Search_City_Name) == false)
        {
          alert('Your City name contains numbers which is not allowed.\n\nPlease enter only alphabets.');
        }
        else
        {
          $.ajax
          ({
            type: "POST",
            url: "search.php",
            data: "City_Name="+Search_City_Name+"&Type=Search_City_Data",
            cache: false,
            async: false,
            
            success: function(Received_Data)
            {
              $("html, body").animate({ scrollTop: $(document).height() }, 1000);
              $('#Result').html(Received_Data);
            }
          });
        }
      });
      
     /* $('#Export').click(function()
      {
        let file = new Blob([$('#Result').html()], {type:"application/vnd.ms-excel"});
        let url = URL.createObjectURL(file);
        
        let a = $("<a />",
        {
          href: url,
          download: "Data.xls"
        }).appendTo("body").get(0).click();
        e.preventDefault();
      });
      
      $('#Print').click(function()
      {
        var printFriendly = document.getElementById('Result');
        var printWin = window.open("about:blank", "", "menubar=no;status=no;toolbar=no;");
        printWin.document.write("<html><body>" + printFriendly.innerHTML + "</body></html>");
        printWin.document.close();
        printWin.window.print();
        printWin.close();
      });*/
    });
</script>-->  
<!-- jQuery -->
<!-- Modal starts-->
<!--
<div class="modal fade show" id="modal-default" style="display: block;" aria-modal="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Make My Day Say's</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          comment here /.modal-content
        </div>
        comment here /.modal-dialog 
</div>-->
<!-- Modal ends -->
<!-- Update, Delete JQuery Starts-->
<!--  <script>  
      $(document).ready(function(){  
        $('#State-table').Tabledit({
          url:'action.php',
          columns:{
          identifier:[0, "Stateid"],
          editable:[[1, 'Statename']]
        },
        restoreButton:false,
        onSuccess:function(data, textStatus, jqXHR)
        {
          if(data.action == 'delete')
          {
              $('#'+data.Stateid).remove();
          }
        }
        });
 
      });  
 </script>-->
<!-- Update, Delete JQuery Ends-->


<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php
  if(isset($_POST['Save']))
  {
    $cityid=1;
    $userp="parth.jpg";
    $as=1;
    $Add_Data = "INSERT INTO `userm` VALUES ('".$_POST['firstname']."','".$_POST['middlename']."','".$_POST['lastname']."','".$_POST['gender']."','".$_POST['dob']."',".$_POST['contactno'].",".$_POST['alertnatecontactno'].",'".$_POST['emailid']."','".$_POST['addressline1']."','".$_POST['addressline2']."','".$_POST['road']."','".$_POST['landmark']."',".$cityid.",".$_POST['pincode'].",'".$_POST['password']."','".$_POST['usertype']."','".$userp."',".$as.")";
      
    $q = mysqli_query($Create_Connection, $Add_Data);
    if($q==true)
    {
      echo "<script>alert('Inserted successfully');</script>";
    }
    else
    {
      echo "<script>alert('Inserted failed');</script>";  
    }
  }

?>

