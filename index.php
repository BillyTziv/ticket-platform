<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<title>Ticket Platform v2.0</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


		<!-- Styles -->
		<!-- <link href="css/login_style.css" rel="stylesheet" type="text/css" /> -->
	<!-- <link href="css/layout.css" rel="stylesheet" type="text/css" /> -->
	<!-- <link href="resources/css/style.css" rel="stylesheet" type="text/css" /> -->
	<link href="resources/css/form-components.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<style>
		*{
			padding: 0;
			margin: 0;
		}

		body {
			background: rgb(240, 240, 240);
		}

		.login-form {
		

			position: absolute;
			top: 50%;
			left: 50%;
			margin-top: -150px;
			margin-left: -150px;
			width: 300px;
			height: 300px;
		}
	</style>



  </head>
  <body>

  		<!-- MENU -->
		<!-- <div id="menubara">
			<div class="container">
				<table width="100%">
					<tr>
						<td width="350px">
							<img  src="images/logo.png" height="38px" />
						</td>
					</tr>
				</table>
			</div>
		</div> -->
		<!-- <div id="supported_func">
			<span style="font-size:30px;line-height:0.6em;opacity:0.9;color: white;">&#10077;</span>
			<?php
				// $randNum = rand(1, 3);
				// if($randNum == 1) {
				// 	echo "Loneliness is a special enjoyment when chosen by ourself.. but hard to digest when gifted by others. Good Morning!";
				// }else if($randNum == 2) {
				// 	echo "Freedom is when you do what you really like, happiness is when you like what you do.";
				// }else if($randNum) {
				// 	echo "Life is better when you are laughing";
				// }
			?>
		</div> -->


	


	
				<div class="login-form">
					<form action="auth/authenticate.php" method="post">
						<div class="group">      
							<input type="text" name="username" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Username</label>
							<small class="text-muted"><i>Demo Username: vasilis</i></small>
						</div>

						<div class="group">      
							<input type="password" name="password" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Password</label>
							<small class="text-muted"><i>Demo Password: 12345</i></small>
						</div>

						<div class="group">      
							<input class="vt_button" type="submit" value="Login">
						</div>

						<div class="group">
							<?php
								if( isset($errorMsg) ) {
									echo "<div id=\"loginErrorBox\">" . $errorMsg . "</div>";
								}else if( isset($sucMsg) ) {
									echo "<div id=\"loginSucBox\">" . $sucMsg . "</div>";
								}
							?>
						</div>
							<!-- <div class="group">      
								<input type="checkbox" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Forgot your password?</label>
							</div>
							-->
					</form>
				</div>
			
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>