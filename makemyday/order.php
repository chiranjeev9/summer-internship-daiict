<?php 
    include('business/loginsession.php');
    include "business/database_connection.php";
    //$pid=$_GET["pid"];
    $uid=$_SESSION['User_ID'];
    GLOBAL $cartid;        
   // echo "<script>alert('".$uid."');</script>";
    $res = mysqli_query($Create_Connection,"Select * from gallerym,productm,subcategorym,categorym,orderm,ordert where productm.productid = gallerym.productid and subcategorym.subcategoryid = productm.subcategoryid and  ordert.orderid=orderm.orderid and ordert.productid=productm.productid and subcategorym.categoryid = categorym.categoryid and gallerym.isactive = 1 and gallerym.imagetitle = 'Main' and orderm.userid=".$uid."");
    //$cres = mysqli_query($Create_Connection,"SELECT * from `cartm` where userid=".$uid."");
    //$data = mysqli_fetch_array($res);
    //$cartid = $data["cartid"];
    //echo "<script>alert('".$cartid."');</script>";

   // $crow==mysqli_fetch_array($cres);
    //$rowcount=mysqli_num_rows($cres);
    //echo $rowcount;
    //$add_data = mysqli_query($Create_Connection,"INSERT into `cartm` (userid,prodid) values(".$uid.",".$pid.") ");	
    
    
    
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>::My Orders::</title>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Orders</span></p>
            <h1 class="mb-0 bread">My Orders</h1>
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
						        <th>Quantity</th>
						        <th>Total</th>
                    <th>Status</th>
						      </tr>
						    </thead>
						    <tbody>
						    <?php

						    	while($row1=mysqli_fetch_array($res))
						    	{
                    //$cartid=$row1["cartid"];  
                    $path="product_image/".$row1["imagepath"];
                    $subtotal+=$row1["total"];
                  
						    		echo '<tr class="text-center">
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div><img class="img" src="'.$path.'"/></div></td>
						        
						        <td class="product-name">
						        	<h3>'.$row1["productname"].'</h3>
						        	<p></p>
						        </td>
						        
						        <td class="price">'.$row1["price"].'</td>
						        
						        <td class="quantity">'.$row1["qty"].'</td>
						        
						       <td class="total">'.$row1["total"].'</td>
                   <td class="total">'.$row1["orderstatus"].'</td>
						      </tr>';
						    	}

						    ?>
						      

						      
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-center">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    
    					<h3>Order Total</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span><?php echo $subtotal;?></span>
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
    						<span><?php echo $subtotal;?></span>
    					</p>
    				</div>
            
    				
    			</div>
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
		    
		});
	</script>
    
  </body>
</html>