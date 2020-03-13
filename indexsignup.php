<?php
	
	session_start();

	//Connecting to a server
	$link=mysqli_connect('localhost','root');
	
	//checking for errors
	if(mysqli_connect_error())
	{
		die("Cannot connect to the server.");
	}
	//echo("in signup");
	//echo($_POST['submit']);
	if(isset($_POST['submit']))
	{
		echo("in isset");
		$username=$_POST["username"];
		$password=$_POST["password"];
		/*if(isset($_POST["remember"]))
			$check=$_POST["remember"];
		else
			$check=0;
		//This cookie is not working see it later
		if($check)
			setcookie("customerID","124202132",time() + 300);*/
		$query="select * from users.secretdiary where username='".mysqli_real_escape_string($link,$username)."'";
		$result=mysqli_query($link,$query);
		if($result)
		{
			$row=mysqli_num_rows($result);
			if($row!=0)
			{
				//$_SESSION["username"]=2;
				$_SESSION["text"]="This user name has already been taken.Please try with another one";
				//echo();
				header("Location:index.php");
			}
			else
			{
				$query="insert into users.secretdiary(id,username,password,diary) values(NULL,'".mysqli_real_escape_string($link,$username)."','".mysqli_real_escape_string($link,$password)."',NULL)";
		
				$result=mysqli_query($link,$query);
				if($result)
				{
					$_SESSION["username"]=$username;
					$_SESSION["password"]=$password;
					$_SESSION["text"]="";
					header("Location:diary.php");
				}
				else
				{
					echo("Some error occured while insertion.");
				}
			}
		}
		else
		{
			echo("Some error occured while select query");
		}
	}
	echo("after if");
?>


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

