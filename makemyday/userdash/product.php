<?php
    include "business/database_connection.php";
    /*$res = mysqli_query($Create_Connection,"Select s.subcategoryid,s.subcategoryname,c.categoryname from subcategorym s inner join categorym c on c.categoryid=s.categoryid where s.isactive = 1 and c.isactive = 1 ORDER BY s.subcategoryid");*/
    $res=mysqli_query($Create_Connection,"Select * from productm,categorym,subcategorym where subcategorym.subcategoryid = productm.subcategoryid and categorym.categoryid = subcategorym.categoryid and productm.isactive = 1 ORDER BY productm.productid");
    $cat=mysqli_query($Create_Connection,"Select * from categorym where isactive = 1 ORDER BY categoryid");
    $sub=mysqli_query($Create_Connection,"Select * from subcategorym where isactive = 1 ORDER BY subcategoryid");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>:: Manage Product ::</title>
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
              <li class="breadcrumb-item active">Product</li>
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
                <h3 class="card-title">Manage Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group" style="display:">
                    <label>Category Name</label>
                    <select class="form-control" id="selectcategory">
                          <option>Select Category</option>
                          <?php

                            while($row1=mysqli_fetch_array($cat))
                            {
                              echo '<option>'.$row1["categoryname"].'</option>';
                            }

                          ?>
                          
                          
                        </select>
                  </div>
                  <div class="form-group" style="display:">
                    <label>Subcategory Name</label>
                    <select class="form-control" id="selectsubcategory">
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
                    <input type="hidden" class="form-control" id="productid">
                    <input type="text" class="form-control" id="productname" placeholder="Enter Product Name">
                  </div>
                   <div class="form-group" style="display:">
                    <label>Brand Name</label>
                    <!-- <input type="hidden" class="form-control" id="Brandid"> -->
                    <input type="text" class="form-control" id="Brandname" placeholder="Enter Brand Name">
                  </div>
                  <div class="row">
                  <div style="display:" class="col-sm-4">
                    <label>Price</label>
                    <!-- <input type="hidden" class="form-control" id="Priceid"> -->
                    <input type="number" class="form-control" id="Price" placeholder="Enter Price">
                  </div>
                  <div class="col-sm-4" style="display:" >
                    <label>Tax (%)</label>
                    <!-- <input type="hidden" class="form-control" id="Taxd"> -->
                    <input type="number" class="form-control" id="Tax" placeholder="Enter Tax">
                  </div>
                  
                  <div class="col-sm-4" style="display:">
                    <label>M.O.U (measurement of units)</label>
                   <!--  <input type="hidden" class="form-control" id="Priceunitid"> -->
                    <input type="text" class="form-control" id="Priceunit" placeholder="Enter Unit">
                  </div>
                  </div>
                  <div class="form-group" style="display:">
                    <label>Description</label>
                    <!-- <input type="hidden" class="form-control" id="Descriptionid"> -->
                    <textarea type="text" class="form-control" id="Description" rows="5" placeholder="Enter Description "></textarea>
                  </div>
                  <div class="form-group" style="display:">
                    <label>Tag</label>
                    <!-- <input type="hidden" class="form-control" id="Tagid"> -->
                    <textarea type="text" class="form-control" id="Tag" rows="5" placeholder="Enter Tag "></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" id="Save" class="btn btn-primary btn-success fas fa-save"> Save</button>
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
                <h3 class="card-title">Product Details</h3>
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
                <table class="table table-hover table-bordered" id="Product-table">
                  <thead>
                    <tr>
                      <th>Product ID</th>
                      <th>Product</th>
                      <th>Category</th>
                      <th>Subcategory</th>
                      <th>Brand</th>
                      <th>Price</th>
                      <th>Price Unit</th>
                      <th>Tax</th>
                      <th>Description</th>
                      <th>Tag</th>
                      <th>Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      while($row=mysqli_fetch_array($res))
                      {
                        echo '
                              <tr>
                                <td>'.$row["productid"].'</td>
                                <td>'.$row["productname"].'</td>
                                <td>'.$row["categoryname"].'</td>
                                <td>'.$row["subcategoryname"].'</td>
                                <td>'.$row["productbrand"].'</td>
                                <td>'.$row["price"].'</td>
                                <td>'.$row["priceunit"].'</td>
                                <td>'.$row["tax"].'</td>
                                <td>'.$row["productdescription"].'</td>
                                <td>'.$row["tag"].'</td>
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
            a.document.write('<body > <h1>Product Report<br><hr>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
            //$('table tr td:eq(2)').show();
            //$('table tr th:eq(2)').show();
        } 
        function exportTableToExcel(tableID, filename = 'Productreport'){
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
    
                var table = document.getElementById('Product-table');
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("productid").value = this.cells[0].innerHTML;
                         document.getElementById("productname").value = this.cells[1].innerHTML;
                         document.getElementById("selectcategory").value = this.cells[2].innerHTML;
                         document.getElementById("selectsubcategory").value = this.cells[3].innerHTML;
                         document.getElementById("Brandname").value = this.cells[4].innerHTML;
                         document.getElementById("Price").value = this.cells[5].innerHTML;
                         document.getElementById("Tax").value = this.cells[7].innerHTML;
                         document.getElementById("Priceunit").value = this.cells[6].innerHTML;
                         document.getElementById("Description").value = this.cells[8].innerHTML;
                         document.getElementById("Tag").value = this.cells[9].innerHTML;
                         window.scrollTo(0, 0);
                    };
                }
</script>

<script>
    $(function()
    {
      
      $('#Save').click(function()
      {
        var Product_Name = $('#productname').val();
        var Category_Name=$('#selectcategory').val();
        var Subcategory_Name=$('#selectsubcategory').val();
        var Brand_name = $('#Brandname').val();
        var Price= $('#Price').val();
        var Tax= $('#Tax').val();
        var Price_unit= $('#Priceunit').val();
        var Desc= $('#Description').val();
        var Tag= $('#Tag').val();
        if(Category_Name == "" || Category_Name == "Select Category")
        {
        	alert('Please Select Category.');	
        }
        else if(Subcategory_Name == "" || Subcategory_Name == "Select Subcategory")
        {
        	alert('Please Select Sub Category.');
        }
        else if(Product_Name == "" || Product_Name == null)
        {
          alert('Please enter Product Name.');
        }
        else if(Product_Name.length < 2)
        {
          alert('Entered Product name is too short to use.\n\nPlease enter proper name.');
        }
        else if(isNaN(Product_Name) == false)
        {
          alert('Your Product name contains numbers which is not allowed.\n\nPlease enter only alphabets.');
        }
        else if(Brand_name == "" || Brand_name == null)
        {
          alert('Please enter Brand Name.'); 
        }
        else if(Price == "" || Price == null) 
        {
          alert('Please enter Price.'); 
        }
        else if(Tax == "" || Tax == null)
        {
          alert('Please enter Tax.'); 
        }
        else if (Price_unit == "" || Price_unit == null)
        {
          alert('Please enter Unit.'); 	
        }
        else if (Desc == "" || Desc == null)
        {
          alert('Please enter Product Description.'); 	
        }
        else 
        {
          var Product_Data_String = 'productname='+Product_Name+'&subcategoryname='+Subcategory_Name+'&brandname='+Brand_name+'&price='+Price+'&tax='+Tax +'&priceunit='+Price_unit+'&description='+Desc+'&tag='+Tag +'&Type=Product'; 
          $.ajax
          ({
            type: "POST",
            url: "business/add.php",
            data: Product_Data_String,
            cache: false,
            async: true,
            
            success: function(Received)
            { 
              var Received_Data = $.parseJSON(Received);
              
              if(Received_Data.Status_Type == 'PRODUCT_ADDING_SUCCESSFUL')
              {
                alert(Received_Data.Status_Message);
                location.reload(true);
                window.scrollTo(0, 700);
              }
              else if(Received_Data.Status_Type == 'PRODUCT_ALREADY_EXISTS')
              {
                alert(Received_Data.Status_Message);
              }
              else if(Received_Data.Status_Type == 'PRODUCT_ADDING_FAILED')
              {
                alert(Received_Data.Status_Message);
              }
            }
          });
        }
      });
      
      $('#Update').click(function()
      {
      	var Product_id = $('#productid').val();
        var Product_Name = $('#productname').val();
        var Category_Name=$('#selectcategory').val();
        var Subcategory_Name=$('#selectsubcategory').val();
        var Brand_name = $('#Brandname').val();
        var Price= $('#Price').val();
        var Tax= $('#Tax').val();
        var Price_unit= $('#Priceunit').val();
        var Desc= $('#Description').val();
        var Tag= $('#Tag').val();
        if(Category_Name == "" || Category_Name == "Select Category")
        {
        	alert('Please Select Category.');	
        }
        else if(Subcategory_Name == "" || Subcategory_Name == "Select Subcategory")
        {
        	alert('Please Select Sub Category.');
        }
        else if(Product_Name == "" || Product_Name == null)
        {
          alert('Please enter Product Name.');
        }
        else if(Product_Name.length < 2)
        {
          alert('Entered Product name is too short to use.\n\nPlease enter proper name.');
        }
        else if(isNaN(Product_Name) == false)
        {
          alert('Your Product name contains numbers which is not allowed.\n\nPlease enter only alphabets.');
        }
        else if(Brand_name == "" || Brand_name == null)
        {
          alert('Please enter Brand Name.'); 
        }
        else if(Price == "" || Price == null) 
        {
          alert('Please enter Price.'); 
        }
        else if(Tax == "" || Tax == null)
        {
          alert('Please enter Tax.'); 
        }
        else if (Price_unit == "" || Price_unit == null)
        {
          alert('Please enter Unit.'); 	
        }
        else if (Desc == "" || Desc == null)
        {
          alert('Please enter Product Description.'); 	
        }
        else 
        {
          var Product_Data_String = 'productid='+Product_id+'&productname='+Product_Name+'&subcategoryname='+Subcategory_Name+'&brandname='+Brand_name+'&price='+Price+'&tax='+Tax +'&priceunit='+Price_unit+'&description='+Desc+'&tag='+Tag +'&Type=Product'; 
          $.ajax
          ({
            type: "POST",
            url: "business/update.php",
            data: Product_Data_String,
            cache: false,
            async: true,
            
            success: function(Received)
            { 
              var Received_Data = $.parseJSON(Received);
              
              if(Received_Data.Status_Type == 'PRODUCT_UPDATED_SUCCESSFUL')
              {
                alert(Received_Data.Status_Message);
                location.reload(true);
                window.scrollTo(0, 700);
              }
              else if(Received_Data.Status_Type == 'PRODUCT_ALREADY_EXISTS')
              {
                alert(Received_Data.Status_Message);
              }
              else if(Received_Data.Status_Type == 'PRODUCT_UPDATION_FAILED')
              {
                alert(Received_Data.Status_Message);
              }
            }
          });
        }
      });

      $('#Delete').click(function()
      {
        var Product_id = $('#productid').val();
        var Product_Name = $('#productname').val();
        var Category_Name=$('#selectcategory').val();
        var Subcategory_Name=$('#selectsubcategory').val();
        var Brand_name = $('#Brandname').val();
        var Price= $('#Price').val();
        var Tax= $('#Tax').val();
        var Price_unit= $('#Priceunit').val();
        var Desc= $('#Description').val();
        var Tag= $('#Tag').val();
        if(Category_Name == "" || Category_Name == "Select Category")
        {
        	alert('Please Select Category.');	
        }
        else if(Subcategory_Name == "" || Subcategory_Name == "Select Subcategory")
        {
        	alert('Please Select Sub Category.');
        }
        else if(Product_Name == "" || Product_Name == null)
        {
          alert('Please enter Product Name.');
        }
        else if(Product_Name.length < 2)
        {
          alert('Entered Product name is too short to use.\n\nPlease enter proper name.');
        }
        else if(isNaN(Product_Name) == false)
        {
          alert('Your Product name contains numbers which is not allowed.\n\nPlease enter only alphabets.');
        }
        else if(Brand_name == "" || Brand_name == null)
        {
          alert('Please enter Brand Name.'); 
        }
        else if(Price == "" || Price == null) 
        {
          alert('Please enter Price.'); 
        }
        else if(Tax == "" || Tax == null)
        {
          alert('Please enter Tax.'); 
        }
        else if (Price_unit == "" || Price_unit == null)
        {
          alert('Please enter Unit.'); 	
        }
        else if (Desc == "" || Desc == null)
        {
          alert('Please enter Product Description.'); 	
        }
        else 
        {
          var Product_Data_String = 'productid='+Product_id+'&productname='+Product_Name+'&subcategoryname='+Subcategory_Name+'&brandname='+Brand_name+'&price='+Price+'&tax='+Tax +'&priceunit='+Price_unit+'&description='+Desc+'&tag='+Tag +'&Type=Product'; 
          $.ajax
          ({
            type: "POST",
            url: "business/delete.php",
            data: Product_Data_String,
            cache: false,
            async: true,
            
            success: function(Received)
            { 
              var Received_Data = $.parseJSON(Received);
              
              if(Received_Data.Status_Type == 'PRODUCT_DELETED_SUCCESSFUL')
              {
                alert(Received_Data.Status_Message);
                location.reload(true);
                window.scrollTo(0, 700);
              }
              else if(Received_Data.Status_Type == 'PRODUCT_DOES_NOT_EXISTS')
              {
                alert(Received_Data.Status_Message);
              }
              else if(Received_Data.Status_Type == 'PRODUCT_DELETION_FAILED')
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
