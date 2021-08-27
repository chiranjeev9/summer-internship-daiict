<?php

	$uid = $_SESSION['CUser_ID'];
	if($uid== '' || $uid == null)
	{
		$status="Login";
		$wishlist="";
		$order="";
		$account="";
		$link="login.php";
	}
	else
	{
		$status="Logout";
		$wishlist='<li class="nav-item cta cta-colored"><a href="wishlist.php" class="nav-link"><span class="icon-shopping_cart"></span>My Wishlist</a></li>';
		$order='<li class="nav-item cta cta-colored"><a href="order.php" class="nav-link"><span class="icon-shopping_cart"></span>My Orders</a></li>';
		$link="logout.php";
		$account='<li class="nav-item cta cta-colored"><a href="userdash/index.php" class="nav-link"><span class="icon-user"></span>My Account</a></li>';
	}

?>

<div class="container">
	      <a class="navbar-brand" href="index.php">Make My Day</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <!--<a class="nav-link dropdown-toggle" href="product.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>-->
              <!--<div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="product.php">Products</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="cart.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>-->
            </li>
            <li class="nav-item"><a href="product.php" class="nav-link">Shop</a></li>
            <li class="nav-item"><a href="cart.php" class="nav-link">Cart</a></li>

	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <!--<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>-->
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          <?php echo $wishlist;?>
	          <?php echo $order;?>
	          <?php echo $account; ?>
	          <li class="nav-item cta cta-colored"><a href="<?php echo $link?>" class="nav-link"><span class="icon-shopping_cart"></span><?php echo $status;?></a></li>
	          

	        </ul>
	      </div>
	    </div>