<?php
    include "business/database_connection.php";
    $pid=$_GET["pid"];
    $userid=$_SESSION['User_ID'];
    if($userid == null || $userid == '')
    {
      include "business/loginsession.php";
    }

    $res = mysqli_query($Create_Connection,"Select * from gallerym,productm,subcategorym,categorym where productm.productid = gallerym.productid and subcategorym.subcategoryid = productm.subcategoryid and subcategorym.categoryid = categorym.categoryid and gallerym.isactive = 1 and productm.productid = ".$pid." and gallerym.imagetitle = 'Main' order by gallerym.photoid");
    while ($row=mysqli_fetch_array($res))
            {
                $productname=$row["productname"];
                $price=$row["price"];
                $tax=$row["tax"];
                $desc=$row["productdescription"];
                $photo=$row["imagepath"];
            }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $productname?></title>
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
    		<?php include"header.php";?>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	   <?php include"navbar.php";?>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Details</span></p>
            <h1 class="mb-0 bread"><?php echo $productname;?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <form method="POST" acrtion="" name="productform">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/menu-2.jpg" class="image-popup"><img src="<?php echo "product_image/".$photo;?>" class="img-fluid" alt=""></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $productname;?></h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div>
    				<p class="price"><span>Rs. <?php echo $price;?></span></p>
    				<p><?php echo $desc;?>
						</p>
						<div class="row mt-4">
							<!--<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="" id="" class="form-control">
	                  	<option value="">Small</option>
	                    <option value="">Medium</option>
	                    <option value="">Large</option>
	                    <option value="">Extra Large</option>
	                  </select>
	                </div>
		            </div>
							</div>-->

							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;">80 piece available</p>
	          	</div>
          	</div>
          	<input type="submit" class="btn btn-black py-3 px-5" name="cart" id="cart" value="Add to Cart"></input>
            <input type="submit" class="btn btn-black py-3 px-5" name="wishlist" id="wishlist" value="Add to Wishlist"></input>
    			</div>
    		</div>
    	</div>
    </form>
    </section>

    <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Ralated Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.jpg" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Floral Jackquard Pullover</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
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
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-2.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Floral Jackquard Pullover</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
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
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-3.jpg" alt="Colorlib Template">
	    					<div class="overlay"></div>
	    				</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Floral Jackquard Pullover</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
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
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-4.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Floral Jackquard Pullover</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
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
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>
    					</div>
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


<?php
  if(isset($_POST['cart']))
  {
    $qty=$_POST['quantity'];
    $total=$price * $qty;
    $cres = mysqli_query($Create_Connection,"SELECT * from `cartm` where userid=".$uid." ");
   // $crow==mysqli_fetch_array($cres);
    $rowcount=mysqli_num_rows($cres);
    $result=mysqli_fetch_array($cres);
    
    if($rowcount>=1)
    {
      $insert_data = mysqli_query($Create_Connection,"INSERT into `cartt` (cartid,productid,qty,total) values(".$result["cartid"].",".$pid.",".$qty.",".$total.") ");      
      //$insert_data = mysqli_query($Create_Connection,"UPDATE `cartm` set qty=".$qty.", total=".$total." where productid=".$pid."");    
    }
    else
    {
      $add_data = mysqli_query($Create_Connection,"INSERT into `cartm` (userid) values(".$uid.") "); 
      $select_data= mysqli_query($Create_Connection,"SELECT * from `cartm` where userid=".$uid." ");  
      $results=mysqli_fetch_array($select_data);
      $insert_data = mysqli_query($Create_Connection,"INSERT into `cartt` (cartid,productid,qty,total) values(".$results["cartid"].",".$pid.",".$qty.",".$total.") ");      
    }
    //echo $rowcount;
    echo "<script>alert('Product Added to Cart');</script>";
  }
  else if(isset($_POST['wishlist']))
  {
    
    $qty=$_POST['quantity'];
    $total=$price * $qty;
    $cres = mysqli_query($Create_Connection,"SELECT * from `wishlistm` where userid=".$uid." ");
   // $crow==mysqli_fetch_array($cres);
    $rowcount=mysqli_num_rows($cres);
    $result=mysqli_fetch_array($cres);
    
    if($rowcount>=1)
    {
      $insert_data = mysqli_query($Create_Connection,"INSERT into `wishlistt` (wishlistid,productid) values(".$result["wishlistid"].",".$pid.") ");      
      //$insert_data = mysqli_query($Create_Connection,"UPDATE `cartm` set qty=".$qty.", total=".$total." where productid=".$pid."");    
    }
    else
    {
      $add_data = mysqli_query($Create_Connection,"INSERT into `wishlistm` (userid) values(".$uid.") "); 
      $select_data= mysqli_query($Create_Connection,"SELECT * from `wishlistm` where userid=".$uid." ");  
      $results=mysqli_fetch_array($select_data);
      $insert_data = mysqli_query($Create_Connection,"INSERT into `wishlistt` (wishlistid,productid) values(".$results["wishlistid"].",".$pid.")");      
    }
    //echo $rowcount;
    echo "<script>alert('Product Added to Wishlist');</script>";
    




    /*$cres = mysqli_query($Create_Connection,"SELECT * from `wishlistm` where userid=".$uid." and productid=".$pid."");
   // $crow==mysqli_fetch_array($cres);
    $rowcount=mysqli_num_rows($cres);
    
    
    if($rowcount>=1)
    {
      $update_data = mysqli_query($Create_Connection,"UPDATE `wishlistm` set productid=".$pid." where productid=".$pid."");    
    }
    else
    {
      $add_data = mysqli_query($Create_Connection,"INSERT into `wishlistm` (userid,productid) values(".$uid.",".$pid.") ");    
    }
    //echo $rowcount;
    echo "<script>alert('Product Added to Wishlist');</script>";*/
  }


?>