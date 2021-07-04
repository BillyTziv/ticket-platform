<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="../images/favicon.ico"/>	

	<title>Hospital Ticket Platform</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<!-- jQuery Library -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

	<!-- jQuery Datatable Library -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/date-1.1.0/fc-3.3.3/r-2.2.9/sc-2.0.4/sl-1.3.3/datatables.min.css"/>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/date-1.1.0/fc-3.3.3/r-2.2.9/sc-2.0.4/sl-1.3.3/datatables.min.js"></script>
	
	<!-- Custom Styling and Overrides -->
	<link href="../resources/css/bootstrap_override.css" rel="stylesheet" type="text/css" />
	<link href="../resources/css/datatable.css" rel="stylesheet" type="text/css" />
	<link href="../css/nav_menu.css" rel="stylesheet" type="text/css" />
	<link href="../resources/css/form_components.css" rel="stylesheet" type="text/css" />
	<link href="../css/view_style.css" rel="stylesheet" type="text/css" />

	<!-- Main JS Controller -->
	<script src="../js/controllers/main.js"></script>

	<link rel="stylesheet" href="../resources/css/slider.css">

</head>
<body>
	<?php require('createTicket.php'); ?>
		<?php
			/* Σύνδεση με την βάση */
			require 'connect.php';

			if( isset($_POST['viewType']) ) {
				if ( $_POST['ticketList'] == "asc") {
					if($_POST['viewType'] == "all") {
						$sql_join = mysqli_query($conn, "SELECT * FROM failures");
					}else if($_POST['viewType'] == "active") {
						$sql_join = mysqli_query($conn, "SELECT * FROM failures WHERE `status`='0'");
					}else if($_POST['viewType'] == "resolved") {
						$sql_join = mysqli_query($conn, "SELECT * FROM failures WHERE `status`='1'");
					}
				}else if( $_POST['ticketList'] == "dec") {
					if($_POST['viewType'] == "all") {
						$sql_join = mysqli_query($conn, "SELECT * FROM failures ORDER BY `end_date` DESC");
					}else if($_POST['viewType'] == "active") {
						$sql_join = mysqli_query($conn, "SELECT * FROM failures WHERE `status`='0' ORDER BY `end_date` DESC");
					}else if($_POST['viewType'] == "resolved") {
						$sql_join = mysqli_query($conn, "SELECT * FROM failures WHERE `status`='1' ORDER BY `end_date` DESC");
					}
				}
			}else {
				$sql_join = mysqli_query($conn, " SELECT * FROM failures");
			}
			
			if ($sql_join !== FALSE) {
				$rows = $sql_join->fetch_all(MYSQLI_ASSOC);
			}
			$totalRows = $sql_join->num_rows;

			//printf("Result set has %d rows.\n", $totalRows);
			$conn->close();
		?>

		<?php require('menu.php'); ?> 

		<div class="container-fluid" id="events">
			<div class="row">
				<div class="col">
					<div id="o-wrapper" class="o-wrapper">
						<button id="c-button--slide-left" class="btn btn-primary">New Ticket</button>
					</div>

					<!-- <a class="btn btn-primary" href="add.php">New Ticket</a> -->
				</div>
			</div>

			<br />

			<div class="row">
				<div class="col">
					<table id="myTable" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th></th>
								<th>ID</th>
								<th>CODE</th>
								<th>IP ADDRESS</th>
								<th>START DATE</th>
								<th>END DATE</th>
								<th>RES. PERSON</th>
								<th>CONTACT NAME</th>
								<th>CONTACT PHONE</th>
								<th>COMMENTS</th>
							</tr>
						</thead>
						<tbody><?php 
						// Iterate the results and create a new for each record found.
							for($rowIndex=0; $rowIndex<$totalRows; $rowIndex++) { ?>

								<tr class="">
								<!-------- EDIT OPTION ----->
								<!-- <td>
									<form action="edit.php" method="post">
										<input type="hidden" name="recordNum" value="<?php //echo $rows[$rowIndex]['id']; ?>" />
										<input type="image" src="../images/edit.png" height=25px width=25px />
									</form>
								</td> -->

								<!-------- CHECKBOX ----->
								<td>
									<div class="vtWrapperCheckbox">
										<input type="checkbox" id="masterCheckbox_<?php echo $rowIndex; ?>" class="vtFormInputCheckbox">
										<label class="xxx" for="masterCheckbox_<?php echo $rowIndex; ?>">
											<div class="tick"></div>
										</label>
										<span class="vtFormInputCheckboxLabel"></span>
									</div>
								</td>

								<!-------- ID ----->
								<td>
									<?php echo $rows[$rowIndex]['id']; ?>
								</td>
								
								<!-------- OUTLET CODE ----->
								<td>
									<?php echo $rows[$rowIndex]['outlet_code']; ?>
								</td>

								<!-------- IP ADDRESS ----->
								<td>
									<?php echo $rows[$rowIndex]['ip_address']; ?>
								</td>

								<!-------- START DATE ----->
								<td>
									<?php echo str_replace("-","/",$rows[$rowIndex]['start_date']); ?>
								</td>

								<!-------- END DATE ----->
								<td>
									<?php echo str_replace("-","/",$rows[$rowIndex]['final_date']); ?>
								</td>
							
								<!-------- RESPONSIBLE ----->
								<td>
									<?php echo $rows[$rowIndex]['ypeuthynos']; ?>
								</td>
					
								<!-------- USER NAME ----->
								<td>
									<?php echo $rows[$rowIndex]['user_name']; ?>
								</td>

								<!-------- USER PHONE ----->
								<td>
									<?php echo $rows[$rowIndex]['user_phone']; ?>
								</td>

								<!-------- COMMENTS ----->
								<td class="tblCol3dot">
									<?php echo $rows[$rowIndex]['notes']; ?>
								</td>



								<!-------- COMPLETE BUTTON ----->
								</tr> <?php
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script src="../js/controllers/leftSlider.js"></script>

	<!-- For the menu -->
	<script>
        const toggle = document.querySelector(".toggle");
        const menu = document.querySelector(".menu");
        const items = document.querySelectorAll(".item");

        /* Toggle mobile menu */
        function toggleMenu() {
        if (menu.classList.contains("active")) {
            menu.classList.remove("active");
            toggle.querySelector("a").innerHTML = "<i class='fas fa-bars'></i>";
        } else {
            menu.classList.add("active");
            toggle.querySelector("a").innerHTML = "<i class='fas fa-times'></i>";
        }
        }

        /* Activate Submenu */
        function toggleItem() {
        if (this.classList.contains("submenu-active")) {
            this.classList.remove("submenu-active");
        } else if (menu.querySelector(".submenu-active")) {
            menu.querySelector(".submenu-active").classList.remove("submenu-active");
            this.classList.add("submenu-active");
        } else {
            this.classList.add("submenu-active");
        }
        }

        /* Close Submenu From Anywhere */
        function closeSubmenu(e) {
        let isClickInside = menu.contains(e.target);

        if (!isClickInside && menu.querySelector(".submenu-active")) {
            menu.querySelector(".submenu-active").classList.remove("submenu-active");
        }
        }
        /* Event Listeners */
        toggle.addEventListener("click", toggleMenu, false);
        for (let item of items) {
        if (item.querySelector(".submenu")) {
            item.addEventListener("click", toggleItem, false);
        }
        item.addEventListener("keypress", toggleItem, false);
        }
        document.addEventListener("click", closeSubmenu, false);


    </script>


<script>
  /**
   * Slide left instantiation and action.
   */
  var slideLeft = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var slideLeftBtn = document.querySelector('#c-button--slide-left');
  
  slideLeftBtn.addEventListener('click', function(e) {
    e.preventDefault;
    slideLeft.open();
  });
</script>


</body>
</html>
