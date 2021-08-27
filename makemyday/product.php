<?php
    include "business/database_connection.php";
    
    //include "business/loginsession.php";
    $res = mysqli_query($Create_Connection,"Select * from gallerym,productm,subcategorym,categorym where productm.productid = gallerym.productid and subcategorym.subcategoryid = productm.subcategoryid and subcategorym.categoryid = categorym.categoryid and gallerym.isactive = 1 and gallerym.imagetitle = 'Main' order by gallerym.photoid");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Make My Day - Shop Now</title>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Collection Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
    				<?php  
    				while ($row=mysqli_fetch_array($res))
    				{
	    				echo '<div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
			    				<div class="product">
			    				<a href="product-detail.php?pid='.$row["productid"].'" class="img-prod"><img class="img-fluid" src="product_image/'.$row["imagepath"].'" alt="Colorlib Template">
			    						<span class="status">'.$row["tax"].'%</span>
			    						<div class="overlay"></div>
			    					</a>
			    					<div class="text py-3 px-3">
			    						<h3><a href="#">'.$row["productname"].'</a></h3>
			    						<div class="d-flex">
			    							<div class="pricing">
					    						<p class="price"><span class="mr-2 price-dc">Rs.20000</span><span class="price-sale">Rs.'.$row["price"].'</span></p>
					    					</div>
					    					<div class="rating">
				    							<p class="text-right">
				    								<a href="#"><span class="ion-ios-star-outline"></span></a>
				    								<a href="#"><span class="ion-ios-star-outline"></span></a>
				    								<a href="#"><span class="ion-ios-star-outline"></span></a>
				    								<a href="#"><span class="ion-ios-star-outline"></span></a>
				    								<a href="#"><span class="ion-ios-star-outline"></span></a>
				    							</p>
				    						</div>
				    					</div>
				    					<p class="bottom-area d-flex px-3">
			    				
			    							<a href="product-detail.php?pid='.$row["productid"].'"" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
			    						</p>
			    					</div>
			    				</div>
			    			</div>';
			    		}



    				?>
		    		</div>
		    		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
		    	</div>

		    	<div class="col-md-4 col-lg-2 sidebar">
		    		<div class="sidebar-box-2">
		    			<h2 class="heading mb-4"><a href="#">Clothing</a></h2>
		    			<ul>
		    				<li><a href="#">Shirts &amp; Tops</a></li>
								<li><a href="#">Dresses</a></li>
								<li><a href="#">Shorts &amp; Skirts</a></li>
								<li><a href="#">Jackets</a></li>
								<li><a href="#">Coats</a></li>
								<li><a href="#">Sleeveless</a></li>
								<li><a href="#">Trousers</a></li>
								<li><a href="#">Winter Coats</a></li>
								<li><a href="#">Jumpsuits</a></li>
		    			</ul>
		    		</div>
		    		<div class="sidebar-box-2">
		    			<h2 class="heading mb-4"><a href="#">Jeans</a></h2>
		    			<ul>
		    				<li><a href="#">Shirts &amp; Tops</a></li>
								<li><a href="#">Dresses</a></li>
								<li><a href="#">Shorts &amp; Skirts</a></li>
								<li><a href="#">Jackets</a></li>
								<li><a href="#">Coats</a></li>
								<li><a href="#">Jeans</a></li>
								<li><a href="#">Sleeveless</a></li>
								<li><a href="#">Trousers</a></li>
								<li><a href="#">Winter Coats</a></li>
								<li><a href="#">Jumpsuits</a></li>
		    			</ul>
		    		</div>
		    		<div class="sidebar-box-2">
		    			<h2 class="heading mb-2"><a href="#">Bags</a></h2>
		    			<h2 class="heading mb-2"><a href="#">Accessories</a></h2>
		    		</div>
						<div class="sidebar-box-2">
		    			<h2 class="heading mb-4"><a href="#">Shoes</a></h2>
		    			<ul>
		    				<li><a href="#">Nike</a></li>
								<li><a href="#">Addidas</a></li>
								<li><a href="#">Skechers</a></li>
								<li><a href="#">Jackets</a></li>
								<li><a href="#">Coats</a></li>
								<li><a href="#">Jeans</a></li>
		    			</ul>
		    		</div>
    			</div>
    		</div>
    	</div>
    </section>

    <footer class="ftco-footer bg-light ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Winkel</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
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