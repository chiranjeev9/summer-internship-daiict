<?php 
    include('business/loginsession.php');
    include "business/database_connection.php";
    //$pid=$_GET["pid"];
    $uid=$_SESSION['CUser_ID'];
    
    
    $res = mysqli_query($Create_Connection,"Select * from gallerym,productm,subcategorym,categorym,wishlistm,wishlistt where productm.productid = gallerym.productid and subcategorym.subcategoryid = productm.subcategoryid and wishlistt.productid=productm.productid and subcategorym.categoryid = categorym.categoryid and gallerym.isactive = 1 and gallerym.imagetitle = 'Main' and wishlistm.userid=".$uid."");
    //$cres = mysqli_query($Create_Connection,"SELECT * from `cartm` where userid=".$uid."");

   // $crow==mysqli_fetch_array($cres);
    //$rowcount=mysqli_num_rows($cres);
    //echo $rowcount;
    //$add_data = mysqli_query($Create_Connection,"INSERT into `cartm` (userid,prodid) values(".$uid.",".$pid.") ");	
    
    
    
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>::My Wish List::</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
      .otherevent
      {
        display:none;
      }
    </style>
  </head>
  <body class="goto-here">
		<div class="py-1 bg-black">
    	<div class="container">
    		<?php include "header.php";?>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	   <?php include "navbar.php";?>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Wish List</span></p>
            <h1 class="mb-0 bread">My Wish List</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						      </tr>
						    </thead>
						    <tbody>
						    <?php

						    	while($row1=mysqli_fetch_array($res))
						    	{
                    $path="product_image/".$row1["imagepath"];
                    
                  
						    		echo '<tr class="text-center">
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div><img class="img" src="'.$path.'"/></div></td>
						        
						        <td class="product-name">
						        	<h3>'.$row1["productname"].'</h3>
						        	<p></p>
						        </td>
						        
						        <td class="price">'.$row1["price"].'</td>
						        
						        
						      </tr>';
						    	}

						    ?>
						      

						      
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-center">
          <form action="" method="POST" name="wishlistform">
            <div class="col col-lg-5 col-md-6 mt-5">
              
            
          </div>
          <div class="form-group" style="display:">
                    <label>Select Occation</label>
                    <select class="form-control" id="selectoccation" name="selectoccation">
                          <option>Select Occation</option>
                          <?php
                            $occation=mysqli_query($Create_Connection,"SELECT * from occationm");
                            while($row2=mysqli_fetch_array($occation))
                            {
                              echo '<option>'.$row2["occationname"].'</option>';
                            }

                          ?>
                          
                          
                        </select>
          </div>
          <div class="form-group otherevent" name="other" id="other">
                    <label>Event Type</label>
                    <input type="text" class="form-control" name="eventtype" id="eventtype" placeholder="Please Specify Event Type"/>
          </div>
          <div class="form-group" style="display:">
                    <label>Select Occation Date</label>
                    <input type="date" class="form-control" name="eventdate" id="eventdate"/>   
          </div>
          <div class="form-group" style="display:">
                    <label>Enter Invitees Mail ID (Separated by ',')</label>
                    <input type="textarea" class="form-control" name="inviteesmail" id="inviteesmail" placeholder="Enter Mail ID of Invitees here"/>   
          </div>
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">   
    				<input type="submit" class="btn btn-black py-3 px-5" name="sendwishlist" id="sendwishlist" value="Send Wishlist to Invitees"></input>
    			</div>
          </form>
    		</div>
			</div>
		</section>

    <footer class="ftco-footer bg-light ftco-section">
     <?php include "footer.php";?>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
       
         $('select').change(function () {
          var optionSelected = $(this).find("option:selected");
          var valueSelected  = optionSelected.val();
          var textSelected   = optionSelected.text();
          //alert(textSelected);
          if(textSelected == "Other")
          {
            $('#other').css('display', 'block');
          }
          else
          {
            $('#other').css('display', 'none'); 
          }
          });		    
		});
	</script>
    
  </body>
</html>


<?php
  if(isset($_POST['sendwishlist']))
  { 
    $occation=$_POST['selectoccation'];
    $eventdate=$_POST['eventdate'];
    $invitee=$_POST['inviteesmail'];
    $eventtype=$_POST['eventtype'];
    //echo "<script>alert('".$invitee."');</script>";
    if($occation=="" || $occation=="Select Occation")
    {
        echo "<script>alert('Please Select Occation');</script>";  
    }
    else if($eventdate =="" || $eventdate==null)
    {
        echo "<script>alert('Please Select Event Date');</script>";
    }
    else if($invitee=="" || $invitee==null)
    {
        echo "<script>alert('Please Enter Invitees Mail ID');</script>"; 
    } 
    else
    {
        $select_occation=mysqli_query($Create_Connection,"SELECT * from `occationm` where occationname='".$occation."'");
        $select_occation_data=mysqli_fetch_array($select_occation);
        $occationid=$select_occation_data["occationid"];
        $insert_event_data=mysqli_query($Create_Connection,"insert into eventm(occationid,userid,occationdatetime,occationtype,inviteemail) values(".$occationid.",".$uid.",'".$eventdate."','".$eventtype."','".$invitee."')");      
        $select_event_data=mysqli_query($Create_Connection,"select * from eventm where userid=".$uid." and occationid=".$occationid." and occationdatetime='".$eventdate."'");
        $select_rows=mysqli_num_rows($select_event_data);
        if($select_rows >=1)
        {
          $events=mysqli_fetch_array($select_event_data);
          $eventid=$events["eventid"];
          $select_wishlist=mysqli_query($Create_Connection,"select * from wishlistt, wishlistm,userm where wishlistm.wishlistid=wishlistt.wishlistid and userm.userid=wishlistm.userid"); 
          while($rowselect=mysqli_fetch_array($select_wishlist))
          {
              $insert_eventt_data=mysqli_query($Create_Connection,"insert into eventt(eventid,wishlisttid) value(".$eventid.",".$rowselect["wishlisttid"].")");  
          }
          $select_invitees=mysqli_query($Create_Connection,"select * from userm,eventm,eventt,wishlistt,wishlistm where wishlistm.wishlistid=wishlistt.wishlistid and eventm.eventid=eventt.eventid and wishlistt.wishlisttid = eventt.wishlisttid and userm.userid=eventm.userid and eventt.eventid=".$eventid."");
  
  while($select_in_rows=mysqli_fetch_array($select_invitees))
  {
      $to=$select_in_rows["inviteemail"];  
  }
  $subject='Invitation for Event : "'.$occation.'" "'.$eventype.'"';
  $message='List of the items for gifts i want for this event: Link :https://localhost/makemyday/userwishlist.php?evid='.$eventid.''; 
  echo "<script>alert('".$to."' );</script>";  
  echo "<script>alert('".$subject."' );</script>";  
  echo "<script>alert('".$message."' );</script>";  
  mail($to,$subject,$message);
  echo "<script>alert('Mail Successfully Send to Invitees');</script>"; 
        }
    }
    
    
    
  }

?>