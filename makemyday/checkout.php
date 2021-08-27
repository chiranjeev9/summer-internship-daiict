<?php 
    include('business/loginsession.php');
    include "business/database_connection.php";
    $cartid=$_GET["caid"];
    $uid=$_SESSION['User_ID'];
    
    
    $res = mysqli_query($Create_Connection,"Select * from gallerym,productm,subcategorym,categorym,cartm,cartt where productm.productid = gallerym.productid and subcategorym.subcategoryid = productm.subcategoryid and  cartt.cartid=cartm.cartid and cartt.productid=productm.productid and subcategorym.categoryid = categorym.categoryid and gallerym.isactive = 1 and gallerym.imagetitle = 'Main' and cartm.userid=".$uid."");
    //$cres = mysqli_query($Create_Connection,"SELECT * from `cartm` where userid=".$uid."");
    $data = mysqli_fetch_array($res);
    $cartid = $data["cartid"];
   // echo "<script>alert('".$cartid."');</script>";

   // $crow==mysqli_fetch_array($cres);
    //$rowcount=mysqli_num_rows($cres);
    //echo $rowcount;
    //$add_data = mysqli_query($Create_Connection,"INSERT into `cartm` (userid,prodid) values(".$uid.",".$pid.") ");	
    
    
    
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>::Lets Order it::</title>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

<?php 

	          	$fetch_cart=mysqli_query($Create_Connection,"Select * from cartt where cartid='".$cartid."'");
	          	while($fetch_cart_data=mysqli_fetch_array($fetch_cart))
	          	{
	          		$subtotal+=$fetch_cart_data["total"];
	          	}
	          	
	          	$fetch_user=mysqli_query($Create_Connection,"select * from userm,cartm,cartt where cartm.userid= userm.userid and cartm.cartid=cartt.cartid and userm.userid='".$uid."' and cartt.cartid='".$cartid."'");
	          	$fetch_user_data=mysqli_fetch_array($fetch_user);
	          	$fname=$fetch_user_data["firstname"];
	          	//echo "<script>alert('".$fname."');</script>";
	          	$lname=$fetch_user_data["lastname"];
	          	$addressline1=$fetch_user_data["addressline1"];
	          	$addressline2=$fetch_user_data["addressline2"];
	          	$landmark=$fetch_user_data["landmark"];
	          	$road=$fetch_user_data["road"];
	          	$phone=$fetch_user_data["contact"];
	          	$emailid=$fetch_user_data["emailid"];

	          ?>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 ftco-animate">
						<form action="" method="POST" class="billing-form">
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">First Name</label>
	                  <input type="text" class="form-control" placeholder="" name="firstname" value="<?php echo @$fname;?>">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" class="form-control" placeholder="" name="lastname" value="<?php echo @$lname;?>">
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">State / Country</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="selectstate" id="selectstate" class="form-control">
		                  	<option value="0">Select State</option>
		                  	<?php

		                  	$fetch_state=mysqli_query($Create_Connection,"Select * from statem where isactive='1'");
		                  	while($fetch_state_data = mysqli_fetch_array($fetch_state))
		                  	{
		                  		echo '
		                  			<option value="'.$fetch_state_data["stateid"].'">'.$fetch_state_data["statename"].'</option>
		                  		';
		                  	}
		              
		                    ?>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input type="text" name="addressline1" class="form-control" placeholder="House number and street name" value="<?php echo @$addressline1;?>">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                  <input type="text" name="addressline2" class="form-control" placeholder="Appartment, suite, unit etc: (optional)" value="<?php echo @$addressline2;?>">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" name="pincode" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" name="phoneno" class="form-control" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="email" name="emailid" class="form-control" placeholder="">
	                </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
										  <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
										  <label><input type="radio" name="optradio"> Ship to different address</label>
										</div>
									</div>
                </div>
	            </div>
	          <!-- END -->



	          <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>Rs. <?php echo $subtotal;?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>Rs. 0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>Rs. 0.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>Rs. <?php echo $subtotal;?></span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-6">
	          		<div class="cart-detail bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<!--<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
											</div>
										</div>
									</div>-->
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2" checked> COD Payment</label>
											</div>
										</div>
									</div>
									<!--<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
											</div>
										</div>
									</div>-->
									<div class="form-group">
										<div class="col-md-12">
											
										</div>
									</div>
									<p><input type="submit" name="placeorder" class="btn btn-primary py-3 px-4" value="Place Order"></p>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
      </form>
    </section> <!-- .section -->

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
    
  </body>
</html>

<?php
	if(isset($_POST['placeorder']))
	{
		$fetch_cartdetails=mysqli_query($Create_Connection,"Select * from cartt where cartid='".$cartid."'");
		$fetch_cart_rows=mysqli_num_rows($fetch_cartdetails);
		//$fetch_cart_details=mysqli_fetch_array($fetch_cartdetails);
		//echo "<script>alert('".$fetch_cart_rows."');</script>";
		if($fetch_cart_rows >=1)
		{
			$insert_data=mysqli_query($Create_Connection,"insert into orderm(userid) values('".$uid."')");
			$fetch_order=mysqli_query($Create_Connection,"select * from orderm where userid='".$uid."' order by orderid desc");
			$fetch_order_data=mysqli_fetch_array($fetch_order);
		//	echo "<script>alert('".$fetch_order_data["orderid"]."');</script>";
			while($fetch_rows=mysqli_fetch_array($fetch_cartdetails))
			{
				$insert_ordert=mysqli_query($Create_Connection,"insert into ordert(orderid,productid,qty,total) value('".$fetch_order_data["orderid"]."','".$fetch_rows["productid"]."','".$fetch_rows["qty"]."','".$fetch_rows["total"]."')");
				//$fetch_cart_rows -= 1;
			}
				echo "<script>alert('Order Placed Successfully');</script>";
				$update_cartt=mysqli_query($Create_Connection,"delete from cartt where cartid='".$cartid."'");

		}
		else
		{
			echo "<script>alert('Nothing in cart . Please Select Product to buy');</script>";
		}
		
	}
?>