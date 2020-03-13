<?php

	session_start();
	
	//echo($_SEESION["username"]);
	//echo($_SEESION["password"]);
	//print_r($_SESSION);
	
	
	$text="";
		//echo(empty($_SESSION));
	//echo("in index.php");
	/*if(isset($_POST['submit']))
	{
		//$_SESSION["username"]="";
		//$_SESSION["password"]="";
		//$_SESSION["text"]="";
		//$_SESSION["triedlogin"]=0;
		//echo("unset");
	}*/
	foreach ($_SESSION as $key=>$val)
	{
		if($key=="text")
			$text=$_SESSION["text"];
	}
	/*if(!empty($_SESSION))
	{
		//echo("In if");
		if($_SESSION["username"]==2)
			$text="This user name has already been taken.Please try with another one.";
		else if($_SESSION["username"]==1)
			$text="You have not signed up. Please sign up first.";
		else if($_SESSION["password"]==1)
			$text="Wrong password! Please try again.";
		else if($_SESSION["triedlogin"]==1)
			$text="You are logged out";
		else
			$text="";
	}
	else
	{
		
	}*/
?>

<html>

	<head>
	<!--Bootstrap file-->    
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--JQuery file-->
        <script type="text/javascript" src="jqueryfile.min.js"></script>
		<script src="jquery-ui/jquery-ui.js"></script>
		<link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
		    
	
		<Title>Secret Diary</title>
		
		<style type="text/css">
		
			body
			{
				background-image:url(roadimage.jpeg);
			}
			#signup
			{
				padding:10px;
			}
			#login
			{
				padding:10px;
			}
			
			#submitbtn
			{
				width:100px;
			}
			#maindiv
			{
				background:rgba(3,201,254,0.6);
				<!--background-color:#03C9FE;-->
				border:2px;
				border-radius:15px;
			}
			
		</style>
	
	</head>
	
	<body>
	
		<div class="alert alert-danger alert-dismissible fade show container mx-auto" role="alert" style="margin-top:10px; width:500px;">
			<?php echo($text); ?>
			<button type="button" id="alertdiv" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		
		<div id="maindiv" class="container mx-auto" style="width:500px;">
		
			<!--<div id="alertdiv" class="container bg-danger text-white"></div>-->
			<div id="signup" class="container" >
				<form method="POST" action="indexsignup.php">
					<div class="form-group">
						<label for="username"><strong>User Name:</strong></label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Type username e.g. abcde" required>
					</div>
					<div class="form-group">
						<label for="password"><strong>Password:</strong></label>
						<input type="text" class="form-control" id="password" name="password" placeholder="Type password" autocomplete="off" required>				
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" id="submitbtn" name='submit'>Sign Up</button>
					</div>
				</form>
			</div>
			
			<div id="login" class="container">
				<form method="POST" action="indexlogin.php">
					<div class="form-group">
						<label for="username"><strong>User Name:</strong></label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Type username e.g. abcde" required>
					</div>
					<div class="form-group">
						<label for="password"><strong>Password:</strong></label>
						<input type="text" class="form-control" id="password" name="password" placeholder="Type password" autocomplete="off" required>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" id="submitbtn" name='submit'>Log In</button>
					</div>
					<!--<input type="submit" id="submitbtn" name="submit">-->
				</form>
			</div>
		</div>
		
		<script type="text/javascript">
			
			var text='<?php echo($text); ?>';
			if(text=="")
			{
				$(".alert").hide();
			}
			
			var mt=(($(document).height())*15)/100;
			//alert(mt);
			$("#maindiv").css("margin",mt);
		</script>
		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		
		
	</body>

</html>
