<?php
		/* Database connection */
		include('../core/connect.php');

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
                
                    
                    header("location:../core/view.php");
				}else{	// Input fields are wrong and redirected to login form
					$errorMsg = "Incorrect username or password!";
					//header('refresh:2; url=');
				}
			}else {
				$errorMsg = "Both fields are required!";
			}
		}
	?>
