<?php
	session_start();
	
	//Connecting to a server
	$link=mysqli_connect('localhost','root');
	
	//checking for errors
	if(mysqli_connect_error())
	{
		die("Cannot connect to the server.");
	}
	if(isset($_POST['submit']))
	{
		$username=$_POST["username"];
		$password=$_POST["password"];
		if(isset($_POST["remember"]))
			$check=$_POST["remember"];
		else
			$check=0;
		//This cookie is not working see it later
		/*if($check)
			setcookie("customerID","124202132",time() + 300);*/
		$query="select * from users.secretdiary where username='".mysqli_real_escape_string($link,$username)."'";
		$result=mysqli_query($link,$query);
		if($result)
		{
			$row=mysqli_num_rows($result);
			if($row!=0)
			{
				$row=mysqli_fetch_array($result);
				if($row['password']==$password)
				{
					$_SESSION["username"]=$username;
					$_SESSION["password"]=$password;
					header("Location:diary.php");
				}
				else
				{
					//echo("Wrong password! Please try again.");
					//$_SESSION["password"]=1;
					//$_SESSION["username"]=0;
					$_SESSION["text"]="Wrong password! Please try again.";
					header("Location:index.php");
				}
			}
			else
			{
				//echo("You have not signed up. Please sign up first.");
				//$_SESSION["username"]=1;
				$_SESSION["text"]="You have not signed up. Please sign up first".
				header("Location:index.php");
			}
		}
		else
		{
			echo("Some error occured while select query");
		}
	}
	
?>

<!--
<html>
	
	<head>
		<title>Secret Diary</title>
	</head>
	
	<body>
		<div>
		<form action="index.html">
			<label for="loginpage">Click to get back to log in page</label>
			<input type="submit" id="loginpage" value="Click">
		</form>
		</div>
	</body>
	
</html>
--!>
