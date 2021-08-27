<!DOCTYPE html>
<html lang="en">
<head>
	<title>:: Make My Day | Login ::</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<script language="javascript" type="text/javascript">
			$(document).ready(function()
			{
				$('#Login').click(function()
				{
					alert('Hello');
					var Email = $('#Email').val();
					var Validate_Email_Address = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					var Password = $('#Password').val();

					if(Email == "" || Email == null)
					{
						alert('Please enter your email address.');
					}
					else if(Validate_Email_Address.test(Email) == false)
					{
						alert('The email address you entered is not valid.');
					}
					else if(Password == "" || Password == null)
					{
						alert('Please enter your password.');
					}
					else
					{
						var User_Login_Data_String = 'Email='+Email+'&Password='+Password;

						$.ajax
						({
							type: "POST",
							url: "user_login.php",
							data: User_Login_Data_String,
							cache: false,
							async: true,

							success: function(Received)
							{	
								var Received_Data = $.parseJSON(Received);

								if(Received_Data.Status_Type == 'LOGIN_SUCCESSFUL')
								{
								window.location.href = "index.php";
								}
								else if(Received_Data.Status_Type == 'LOGIN_FAILED')
								{
								alert(Received_Data.Status_Message);
								}
							}
						});
					}
				});
			});
		</script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-90 p-b-30">
				<form> <!--validate-form-->
					<span class="login100-form-title p-b-40">
						Make My Day
					</span>

					<!--<div>
						<a href="#" class="btn-login-with bg1 m-b-10">
							<i class="fa fa-facebook-official"></i>
							Login with Facebook
						</a>

						<a href="#" class="btn-login-with bg2">
							<i class="fa fa-twitter"></i>
							Login with Twitter
						</a>
					</div>-->

					<div class="text-center p-t-55 p-b-30">
						<span class="txt1">
							Login with email
						</span>
					</div>

					<div class="wrap-input100 m-b-16">
						<input class="input100" type="email" id="Email" name="txtuname" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 m-b-20">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" id="Password" name="txtpass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="">
						<button class="login100-form-btn" id="Login" name="btnlogin">
							Login
						</button>
					</div>
					<!--<div class="flex-col-c p-t-224">
						<span class="txt2 p-b-10">
							Forget Your Password?
						</span>
						<a href="#" class="txt3 bo1 hov1">
							Click Here to Recover
						</a>
					</div>-->
					
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>