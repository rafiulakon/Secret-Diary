<?php
	session_start();
	
	//Connecting to the server
	$link=mysqli_connect("localhost","root");
	
	error_reporting(E_ERROR | E_PARSE);
	//Checking for error
	if(mysqli_connect_error())
	{
		die("Cannot connect to the server");
	}
	
	//echo("You have been successfully logged in.");
	$save="";
	if(isset($_POST['submit']))
	{
		$text=$_POST['text'];
		
		//echo(strlen($text));
		$username=$_SESSION["username"];
		$password=$_SESSION["password"];
		//echo($username);
		//echo($password);
		
			$query="update users.secretdiary set diary='".$text."' where username='".$username."' and password='".$password."'";
			$result=mysqli_query($link,$query);
			
			if($result)
			{
				$save="saved";
			}
			else
			{
				$save="Some error occured while updation";
			}
		
	}
	else
	{
		$username=$_SESSION["username"];
		$password=$_SESSION["password"];
		
		if($username=="" || $password=="")
		{
			echo("in username");
			$_SESSION["triedlogin"]=1;
			header("Location:index.php");
		}
		$query="select diary from users.secretdiary where username='".mysqli_real_escape_string($link,$username)."' and password='".mysqli_real_escape_string($link,$password)."'";
		$result=mysqli_query($link,$query);
		if($result)
		{
			$row=mysqli_fetch_array($result);
			$text=$row['diary'];
		}
		else
			echo("Some problem while selection in else");
	}
	

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
		    
	
	
	
		<title>Secret Diary</title>
		
		<style type="text/css">
			
			body
			{
				background-image:url(roadimage.jpeg);
			}
			#text
			{
				margin:20px;
			}
			#submitbtn
			{
				width:100px;
				margin-left:20px;
			}
			#logoutbtn
			{
				width:100px;
				margin-right:20px;
				margin-top:20px;
				float:right;
			}
			#username
			{
					margin-top:20px;
					margin-left:20px;
			}
			
		</style>
		
	</head>
	
	<body>
		
		<div class="alert alert-success alert-dismissible fade show container mx-auto" role="alert" style="margin-top:10px; width:300px;">
			<?php echo($save); ?>
			<button type="button" id="alertdiv" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="indexlogout.php" method="POST">
			<input type="submit" name="submit" id="logoutbtn" value="Log Out">
			
		</form>
		
		<button type="button" id="username" class="btn btn-primary"><?php echo($username); ?></button>
		
		<form action="diary.php" method="POST">	
			<textarea id="text" name="text"><?php echo($text); ?></textarea>
			<input type="submit" name="submit" id="submitbtn" value="save">
		</form>
		
		<script type="text/javascript">
			
			var save='<?php echo($save); ?>';
			if(save=="")
			{
				$(".alert").hide();
			}
		
		
			$width_of_textarea=$(document).width()-50;
			$height_of_textarea=$(document).height()-$("form").height()-130;
			//alert($width_of_textarea);
			//alert($height_of_textarea);
			$("#text").css("width",$width_of_textarea);
			$("#text").css("height",$height_of_textarea);
		
		</script>
		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		
		
	</body>
	
</html>