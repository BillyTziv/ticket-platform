<html>
	<head>
		<link href="css/login_style.css" rel="stylesheet" type="text/css" />
		<link href="css/layout.css" rel="stylesheet" type="text/css" />
    	
    	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

		<style>
			body {
				font-family: 'Raleway', sans-serif;
			}

			#loginErrorBox {
				width: 100%;
				height: 25px;
				color: red;
				font-size: 16px;
				padding-top: 15px;
				text-align: center;
			}
			#loginSucBox {
				width: 100%;
				height: 25px;
				color: #a8e25d;
				font-size: 16px;
				padding-top: 15px;
				text-align: center;
			}

			.container {
			    margin: 0px auto 0px auto;
			    width: 900px;
			}

			#menubara {
			  background: url('menu_bg.png') repeat-x scroll 0 0 transparent;
			  width: 100%;
			  height: 75px;
			}
		</style>

		<?php
			/* Database connection */
			include('core/connect.php');

			// Έλεγχος αν έχουν οριστεί
			if ( isset($_POST['username']) || isset($_POST['password']) ) {
				// Έλεγχος αν είναι η όχι κενά
				if( !empty($_POST['username']) && !empty($_POST['password']) ) {
					$username = $_POST['username'];
					$password = md5( $_POST['password'] );

					$myq = " SELECT * FROM users WHERE username='$username' AND password='$password' ";
					$sql = mysqli_query($conn, $myq) or die("Database select error: ".mysqli_error($conn));

					if( mysqli_num_rows($sql) == 1 ) {	// Successfully logged in and redirected to the interface
						session_start();
						$_SESSION['user_id'] = "$username";
						$sucMsg = "Successfull login!";

						header( "refresh:2;url=core/view.php" );
					}else{	// Input fields are wrong and redirected to login form
						$errorMsg = "Incorrect username or password!";
						//header('refresh:2; url=');
					}
				}else {
					$errorMsg = "Both fields are required!";
				}
			}
		?>
	</head>
	<body>

		<!-- MENU -->
		<div id="menubara">
			<div class="container">
				<table width="100%">
					<tr>
						<td width="350px">
							<img  src="images/logo.png" height="38px" />
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div id="main">
			<div id="supported_func">
				<span style="font-size:30px;line-height:0.6em;opacity:0.9;color: white;">&#10077;</span>
				<?php
					$randNum = rand(1, 3);
					if($randNum == 1) {
						echo "Loneliness is a special enjoyment when chosen by ourself.. but hard to digest when gifted by others. Good Morning!";
					}else if($randNum == 2) {
						echo "Freedom is when you do what you really like, happiness is when you like what you do.";
					}else if($randNum) {
						echo "Life is better when you are laughing";
					}
				?>
			</div>

		
			<div id="login_box">
				<form action="" method="post">
					<table>
						<tr>
							<th> Username: </th>
							<td> <input type="text" name="username" /> </td>
						</tr>
						<tr>
							<th> Password: </td>
							<td> <input type="password" name="password" /> </td>
						</tr>
						<tr>
							<table>
								<td id="submit_button"> <input type="submit" name="submit" value="Login" /> </td>
							</table>
						</tr>
						<tr>
							<?php
								if( isset($errorMsg) ) {
									echo "<div id=\"loginErrorBox\">" . $errorMsg . "</div>";
								}else if( isset($sucMsg) ) {
									echo "<div id=\"loginSucBox\">" . $sucMsg . "</div>";
								}
							?>
						</tr>
						
					</table>
				</form>
			</div>

			<!--<div id="func_list">
				<table cellspacing="35">
					<tr>
						<td> <div class="style_prevu_kit ">Create a new ticket</div> </td>
						<td> <div class="style_prevu_kit ">View tickets</div> </td>
					</tr>
					<tr>
						<td> <div class="style_prevu_kit ">User manual</div> </td>
						<td> <div class="style_prevu_kit ">Search by filter</div> </td>
					</tr>
				</table>
			</div>-->
	</body>
</html>
