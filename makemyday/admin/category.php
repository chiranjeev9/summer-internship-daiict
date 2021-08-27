<?php
    include "business/database_connection.php";
    $query = "Select * from categorym where isactive = 1 ORDER BY categoryid";
    $res = mysqli_query($Create_Connection,$query);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>:: Manage Category ::</title>
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
              <li class="breadcrumb-item active">Category</li>
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
                <h3 class="card-title">Manage Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group" style="display:">
                    <label>Category Name</label>
                    <input type="hidden" class="form-control" id="categoryid">
                    <input type="text" class="form-control" id="categoryname" placeholder="Enter Category Name">
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
                <h3 class="card-title">Category Details</h3>
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
                <table class="table table-hover table-bordered" id="category-table">
                  <thead>
                    <tr>
                      <th>Category ID</th>
                      <th>Category Name</th>
                      <th>Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      while($row=mysqli_fetch_array($res))
                      {
                        echo '
                              <tr>
                                <td>'.$row["categoryid"].'</td>
                                <td>'.$row["categoryname"].'</td>
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
            $('table tr td:eq(2)').hide();
            $('table tr th:eq(2)').hide();
            var divContents = document.getElementById("Data").innerHTML; 
            var a = window.open('', '', 'height=600, width=600'); 
            a.document.write('<html>'); 
            a.document.write('<body > <h1>category Report<br><hr>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
            $('table tr td:eq(2)').show();
            $('table tr th:eq(2)').show();
        } 
        function exportTableToExcel(tableID, filename = 'categoryreport'){
            $('table tr td:eq(2)').hide();
            $('table tr th:eq(2)').hide();
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
            $('table tr td:eq(2)').show();
            $('table tr th:eq(2)').show();
          }
</script> 
<script>
    
                var table = document.getElementById('category-table');
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("categoryid").value = this.cells[0].innerHTML;
                         document.getElementById("categoryname").value = this.cells[1].innerHTML;
                         window.scrollTo(0, 0);
                    };
                }
</script>

<script>
    $(function()
    {
      
      $('#Save').click(function()
      {
        var Category_Name = $('#categoryname').val();
        if(Category_Name == "" || Category_Name == null)
        {
          alert('Please enter your category name.');
        }
        else if(Category_Name.length < 2)
        {
          alert('Entered category name is too short to use.\n\nPlease enter proper name.');
        }
        else if(isNaN(Category_Name) == false)
        {
          alert('Your category name contains numbers which is not allowed.\n\nPlease enter only alphabets.');
        }
        else
        {
          var Category_Data_String = 'categoryname='+Category_Name+'&Type=Category';
          
          $.ajax
          ({
            type: "POST",
            url: "business/add.php",
            data: Category_Data_String,
            cache: false,
            async: true,
            
            success: function(Received)
            { 
              var Received_Data = $.parseJSON(Received);
              
              if(Received_Data.Status_Type == 'CATEGORY_ADDING_SUCCESSFUL')
              {
                alert(Received_Data.Status_Message);
                location.reload(true);
                window.scrollTo(0, 700);
              }
              else if(Received_Data.Status_Type == 'CATEGORY_ALREADY_EXISTS')
              {
                alert(Received_Data.Status_Message);
              }
              else if(Received_Data.Status_Type == 'CATEGORY_ADDING_FAILED')
              {
                alert(Received_Data.Status_Message);
              }
            }
          });
        }
      });
      
      $('#Update').click(function()
      {
        var Category_Name = $('#categoryname').val();
        var Category_ID = $('#categoryid').val();
        if(Category_Name == "" || Category_Name == null)
        {
          alert('Please Select Category to update.');
        }
        else if(Category_Name.length < 2)
        {
          alert('Entered Category name is too short to use.\n\nPlease enter proper name.');
        }
        else if(isNaN(Category_Name) == false)
        {
          alert('Your Category name contains numbers which is not allowed.\n\nPlease enter only alphabets.');
        }
        else
        {
          var Category_Data_String = 'categoryname='+Category_Name+'&categoryid='+Category_ID+'&Type=Category';
          $.ajax
          ({
            type: "POST",
            url: "business/update.php",
            data: Category_Data_String,
            cache: false,
            async: true,
            
            success: function(Received)
            { 
              var Received_Data = $.parseJSON(Received);
              
              if(Received_Data.Status_Type == 'CATEGORY_UPDATED_SUCCESSFUL')
              {
                alert(Received_Data.Status_Message);
                location.reload(true);
                window.scrollTo(0, 700);
              }
              else if(Received_Data.Status_Type == 'CATEGORY_ALREADY_EXISTS')
              {
                alert(Received_Data.Status_Message);
              }
              else if(Received_Data.Status_Type == 'CATEGORY_UPDATION_FAILED')
              {
                alert(Received_Data.Status_Message);
              }
            }
          });
        }
      });

      $('#Delete').click(function()
      {
        var Category_Name = $('#categoryname').val();
        var Category_ID = $('#categoryid').val();
        if(Category_Name == "" || Category_Name == null)
        {
          alert('Please Select Category to delete.');
        }
        else
        {
          var Category_Data_String = 'categoryname='+Category_Name+'&categoryid='+Category_ID+'&Type=Category';
          $.ajax
          ({
            type: "POST",
            url: "business/delete.php",
            data: Category_Data_String,
            cache: false,
            async: true,
            
            success: function(Received)
            { 
              var Received_Data = $.parseJSON(Received);
              
              if(Received_Data.Status_Type == 'CATEGORY_DELETED_SUCCESSFUL')
              {
                alert(Received_Data.Status_Message);
                location.reload(true);
                window.scrollTo(0, 700);
              }
              else if(Received_Data.Status_Type == 'CATEGORY_DOES_NOT_EXISTS')
              {
                alert(Received_Data.Status_Message);
              }
              else if(Received_Data.Status_Type == 'CATEGORY_DELETION_FAILED')
              {
                alert(Received_Data.Status_Message);
              }
            }
          });
        }
      });


      $('#Cancel').click(function()
      {
        $('#countryname').val('');
      });
      
      $('#Search').click(function()
      {
        var Search_State_Name = $('#Search_State_Name').val();
        
        if(Search_State_Name == "" || Search_State_Name == null)
        {
          alert('Please enter your state name.');
        }
        else if(isNaN(Search_State_Name) == false)
        {
          alert('Your state name contains numbers which is not allowed.\n\nPlease enter only alphabets.');
        }
        else
        {
          $.ajax
          ({
            type: "POST",
            url: "search.php",
            data: "State_Name="+Search_State_Name+"&Type=Search_State_Data",
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
        $('#country-table').Tabledit({
          url:'action.php',
          columns:{
          identifier:[0, "countryid"],
          editable:[[1, 'countryname']]
        },
        restoreButton:false,
        onSuccess:function(data, textStatus, jqXHR)
        {
          if(data.action == 'delete')
          {
              $('#'+data.countryid).remove();
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
