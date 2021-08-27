<?php
    include "business/database_connection.php";
    $res = mysqli_query($Create_Connection,"Select * from gallerym,productm,subcategorym, categorym where productm.productid = gallerym.productid and subcategorym.subcategoryid = productm.subcategoryid and subcategorym.categoryid = categorym.categoryid and gallerym.isactive = 1 order by gallerym.photoid");
    $conres=mysqli_query($Create_Connection,"Select * from categorym where isactive = 1 ORDER BY categoryid");
    $sub=mysqli_query($Create_Connection,"Select * from subcategorym where isactive = 1 ORDER BY subcategoryid");
    $pro=mysqli_query($Create_Connection,"Select * from productm where isactive = 1 ORDER BY productid");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>:: Manage Gallery ::</title>
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
              <li class="breadcrumb-item active">Gallery</li>
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
                <h3 class="card-title">Manage Gallery</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="#" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group" style="display:">
                    <label>Category Name</label>
                    <select class="form-control" name="selectcategory" id="selectcategory">
                          <option>Select Category</option>
                          <?php

                            while($row1=mysqli_fetch_array($conres))
                            {
                              echo '<option>'.$row1["categoryname"].'</option>';
                            }

                          ?>
                          
                          
                        </select>
                  </div>
                  <div class="form-group" style="display:">
                    <label>Subcategory Name</label>
                    <select class="form-control" name="selectsubcategory" id="selectsubcategory">
                          <option>Select Subcategory</option>
                          <?php

                            while($row2=mysqli_fetch_array($sub))
                            {
                              echo '<option>'.$row2["subcategoryname"].'</option>';
                            }

                          ?>
                          
                          
                        </select>
                  </div>
                  <div class="form-group" style="display:">
                    <label>Product Name</label>
                    <select class="form-control" name="selectproduct" id="selectproduct">
                          <option>Select Product</option>
                          <?php

                            while($row3=mysqli_fetch_array($pro))
                            {
                              echo '<option>'.$row3["productname"].'</option>';
                            }

                          ?>  
                        </select>
                  </div>
                  <div class="form-group" style="display:">
                    <label>Image Title</label>
                    <select class="form-control" name="selectimagetitle" id="selectimagetitle">
                          <option>Select Image Title</option>
                          <option>Main</option>
                          <option>Front</option>
                          <option>Back</option>
                          <option>Left</option>
                          <option>Right</option>
                          <option>360 Degree</option>
                        </select>
                  </div>
                    <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="photoid" id="photoid">
                        <input type="file" class="custom-file-input" name="file" id="photo">

                        <label class="custom-file-label" for="InputFile">Choose file</label>
                        
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div id="uploaded-image">
                       
                        
                      </div>
                    </div>
                  </div>
                   
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="Submit" name="Save" id="Save" class="btn btn-primary btn-success fas fa-save"> Save</button>
                  <button type="button" id="Update" class="btn btn-primary btn-warning fas fa-edit"> Update</button>
                  <button type="button" id="Delete" class="btn btn-primary btn-danger fas fa-trash-alt"> Delete</button>
                  <button type="Submit" id="Cancel" class="btn btn-primary btn-info fas fa-stop-circle"> Cancel</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Gallery Details</h3>
              </div>
              <div class="card-body">
                <div class="text-right">
                  <button type="button" id="Print" class="btn btn-primary btn-info"> <i class="fas fa-print" onclick='printDiv();'> Print</i></button>
                  <button type="button" id="Export" class="btn btn-primary btn-success" onclick="exportTableToExcel('Data');"><i class="fas fa-download"> Export</i></button>
                  
                </div>
              </div>
              <div class="card-body">
                <div class="row">
          <div class="col-12">
            <div class="card">
              <!--<div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" id="Data">
                <table class="table table-hover table-bordered" id="Gallery-table">
                  <thead>
                    <tr>
                      <th>Photo ID</th>
                      <th>Category</th>
                      <th>Subcategory</th>
                      <th>Product</th>
                      <th>Image Title</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      while($row=mysqli_fetch_array($res))
                      {
                        echo '
                              <tr>
                                <td>'.$row["photoid"].'</td>
                                <td>'.$row["categoryname"].'</td>
                                <td>'.$row["subcategoryname"].'</td>
                                <td>'.$row["productname"].'</td>
                                <td>'.$row["imagetitle"].'</td>
                                <td><a target="_blank" href="../product_image/'.$row["imagepath"].'">View Image</a></td>
                                <td><i class="fas fa-edit"> Edit</i></td>
                              </tr>
                        ';
                      }  
                    ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
            a.document.write('<body > <h1>Gallery Report<br><hr>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
            //$('table tr td:eq(2)').show();
            //$('table tr th:eq(2)').show();
        } 
        function exportTableToExcel(tableID, filename = 'Galleryreport'){
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
    
                var table = document.getElementById('Gallery-table');
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("photoid").value = this.cells[0].innerHTML;
                         document.getElementById("selectcategory").value = this.cells[1].innerHTML;
                         document.getElementById("selectsubcategory").value = this.cells[2].innerHTML;
                         document.getElementById("selectproduct").value = this.cells[3].innerHTML;
                         document.getElementById("selectimagetitle").value = this.cells[4].innerHTML;
                        // document.getElementById("photo").value = this.cells[5].innerHTML;
                         window.scrollTo(0, 0);
                    };
                }
</script>

<script>
    $(function()
    {

     /* $('#Save').click(function()
      {
        var Category_Name=$('#selectcategory').val();
        //alert(Category_Name);
        var Subcategory_Name=$('#selectsubcategory').val();
        //alert(Subcategory_Name);
        var Product_Name = $('#selectproduct').val();
        //alert(Product_Name);
        var Image_Title = $('#selectimagetitle').val();
        //alert(Image_Title);
        var Photo=$('#photo').val();
        //alert(Photo);
        var property=document.getElementById("photo").files[0];
        //alert(property);
        var image_name=property.name;
        //alert(image_name);
        var image_extension=image_name.split(".").pop().toLowerCase();
        //alert(image_extension);
        var image_size=property.size;

        if(Category_Name == "" || Category_Name == "Select Category")
        {
          alert('Please Select Category.'); 
        }
        else if(Subcategory_Name == "" || Subcategory_Name == "Select Subcategory")
        {
          alert('Please Select Subcategory.');
        }
        else if(Product_Name == "" || Product_Name == "Select Product")
        {
          alert('Please Select Product.');
        }
        else if(Image_Title == "" || Image_Title == "Select Image Title")
        {
          alert('Please Select Image Title.');
        }
        else if (Photo == "" || Photo == null)
        {
          alert('Please select photo');
        }
        else if(jQuery.inArray(image_extension,['gif','png','jpg','jpeg']) == -1)
        {
          alert("Select File is not an Image.. Please Select valid Image.");
        }
        else if(image_size > 2000000)
        {
          alert("Image is too large to upload.");
        }
        else
        {
          var form_data = new FormData();
          form_data.append("file",property);
          var Gallery_Data_String = 'productname='+Product_Name+'&form_data='+form_data+'&imagetitle='+Image_Title+'&Type=Gallery';
          $.ajax
          ({
            type: "POST",
            url: "business/add.php",
            data: Gallery_Data_String,
            cache: false,
            async: true,
            
            success: function(Received)
            { 
              var Received_Data = $.parseJSON(Received);
              
              if(Received_Data.Status_Type == 'PHOTO_ADDING_SUCCESSFUL')
              {
                alert(Received_Data.Status_Message);
                location.reload(true);
                window.scrollTo(0, 700);
              }
              else if(Received_Data.Status_Type == 'PHOTO_ALREADY_EXISTS')
              {
                alert(Received_Data.Status_Message);
              }
              else if(Received_Data.Status_Type == 'PHOTO_ADDING_FAILED')
              {
                alert(Received_Data.Status_Message);
              }
            }
          });
        }
      });*/
      
     /* $('#Update').click(function()
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
      });*/
      
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
</script>
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
if (isset($_POST['Save'])) {

     $categoryname = $_POST['selectcategory'];
     $subcategoryname=$_POST['selectsubcategory'];
     $productname=$_POST['selectproduct'];
     $imagetitle=$_POST['selectimagetitle'];
     //$photo = $_POST['file'];
     if($categoryname == "" || $categoryname=="Select Category")
     {
        echo "<script>alert('Please Select Category');</script>";
     }
     else if($subcategoryname == "" || $subcategoryname=="Select Subcategory")
     {
        echo "<script>alert('Please Select Subcategory');</script>";
     }
     else if($productname=="" || $productname == "Select Product")
     {
        echo "<script>alert('Please Select Product');</script>";
     }
     else if($imagetitle=="" || $imagetitle == "Select Image Title")
     {
        echo "<script>alert('Please Select Image Title');</script>";
     }
     else
     {
         $num=rand(1,1000);
         $file_name = $_FILES['file']['name'];
         $file_type = $_FILES['file']['type'];
         $file_tem_loc = $_FILES['file']['tmp_name'];
         $ext = end((explode(".", $file_name)));
         $prod_file_name=$num."_".$productname."_".$imagetitle.".".$ext;
         $file_store = "../product_image/".$prod_file_name;
         $userid=$_SESSION['User_ID'];
         move_uploaded_file($file_tem_loc, $file_store);
         $fetch_data=mysqli_query($Create_Connection,"Select * from productm where productname='".$productname."'");      
         while($prodrow=mysqli_fetch_array($fetch_data))
         {
            $pid=$prodrow["productid"];
         }
         $validate_data=mysqli_query($Create_Connection,"Select * from gallerym where productid=".$pid." and imagepath='".$prod_file_name."' and imagetitle = '".$imagetitle."'");      
         $rowcount=mysqli_num_rows($validate_data);
         if($rowcount < 1)
         {
              $Add_Data = "INSERT INTO `gallerym` (`productid`,`imagepath`,`imagetitle`,`userid`) VALUES (".$pid.",'".$prod_file_name."','".$imagetitle."',".$userid.")";
              $q = mysqli_query($Create_Connection, $Add_Data);
              if($q==true)
              {
                echo "<script>alert('Image Uploaded');</script>";
              }
              else
              {
                echo "<script>alert('Image Uploading Failed');</script>";
              }
         }
         else
         {
              echo "<script>alert('Product Image Already Exists.');</script>";
         }    
     }
}

?>