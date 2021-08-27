<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Sign In | Make My Day</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="login/bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="login/bower_components/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="login/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,600,700,300italic,400italic,600italic">
		<style type="text/css">
			html, body
			{
				background: url('img/mmd_login_bg.jpg') no-repeat center center fixed;
				background-size: 100% 100%;
				height: 100%;
				position: absolute;
				width: 100%;
			}
		</style>
		<script language="javascript" type="text/javascript" src="login/bower_components/jquery/dist/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="login/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script language="javascript" type="text/javascript">
			$(document).ready(function()
			{ 
				$('#Login').click(function()
				{	
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
								
								if(Received_Data.Status_Type == 'LOGIN_SUCCESSFUL_USER')
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
	<body class="hold-transition" style="font-family: Roboto;">
		<div class="login-box">
			<div class="login-box-body" style="border-radius: 7px;">
				<div class="login-logo" style="font-family: Roboto;">
					<b>Make My Day</b>
				</div>
				<form>
					
					<div class="input-group">        
						<span class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</span>
						<input type="email" id="Email" class="form-control" placeholder="Enter your email address">
					</div>
						<br>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-key"></i>
						</span>
						<input type="password" id="Password" class="form-control" placeholder="Enter your password">
					</div>
						<br>
					<div class="row">
						<div align="center" class="col-xs-12">
							<button type="button" id="Login" class="btn btn-primary">
								<i class="fa fa-sign-in"></i>&nbsp;&nbsp;Sign In
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>

<script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.getElementById("Login").click();
        }
    }
</script>