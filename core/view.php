<!DOCTYPE html>
<html>
	<head>
		<?php include('head.php'); ?>
		  <link href="../css/view_style.css" rel="stylesheet" type="text/css" />

	</head>
	<body>
		<?php include('mainHeader.php'); ?>


		<div id="main">
			<div id="pageTitle">
				<div id="pageTitleInner">Ticket View</div>
			</div>
			<div id="view">
				<?php
					header('Content-Type:text/html; charset=UTF-8');
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
					$row_cnt = $sql_join->num_rows;

				    //printf("Result set has %d rows.\n", $row_cnt);
				    $conn->close();
				?>
				<form action="" method="POST">

					<table>
						<tr>
							<th colspan="3"><h4>Ticket View Filter</h4></th>
							<th colspan="4">Ticket Order List</th>
							<th colspan="2"><h4>Resolve Multiple Tickets</h4></th>
						</tr>
						<tr>
							<td>
								<img src="../images/filter.png" width="32px"/>
							</td>
							<td>
								<select style="height:32px;background-color: white;border-color: darkgrey;color: black;font-size: 14px;padding-left: 10px;" name="viewType">
									<option style="color: black;font-size: 14px;" value="all">All tickets</option>
									<option style="color: black;font-size: 14px;" value="active">Active tickets</option>
									<option style="color: black;font-size: 14px;" value="resolved">Resolved tickets</option>
								</select>
							</td>

							<td>
								<input style="height:32px;background-color: white;border-color: darkgrey;color: black;font-size: 14px;font-weight: bold;width: 100px;border-radius: 5px" type="submit" value="Update">
							</td>
							<td style="width:100px;"></td>
							<td style="width: 150px;">
								<select style="height:32px;background-color: white;border-color: darkgrey;color: black;font-size: 14px;padding-left: 10px;" name="ticketList">
									<option style="color: black;font-size: 14px;" value="asc">Ascending Order</option>
									<option style="color: black;font-size: 14px;" value="dec">Descending orders</option>
								</select>
							</td>
							<td>
								<input style="height:32px;background-color: white;border-color: darkgrey;color: black;font-size: 14px;font-weight: bold;width: 100px;border-radius: 5px" type="submit" value="Update">
							</td>
							<td style="width: 110px;"></td>
							<td>
								<select style="height:32px;background-color: white;border-color: darkgrey;color: black;font-size: 14px;padding-left: 10px;" name="viewType">
									<option style="color: black;font-size: 14px;" value="all">Custom</option>
									<option style="color: black;font-size: 14px;" value="active">Select All</option>
					
								</select>
							</td>
							<td >
								<input style="height:32px;background-color: white;border-color: darkgrey;color: black;font-size: 14px;font-weight: bold;width: 150px;border-radius: 5px" type="submit" value="Resolve Tickets">
							</td>
						</tr>
					</table></br>
				  
				</form>

				<div id="view_table">
					<table >
						<tr>
							
							<th class="table_headers" >ID</th>
							<th class="table_headers" >Socket<br>code</th>
							<th class="table_headers" >Socket<br>IPaddr</th>
							<th class="table_headers" >Entry<br>date</th>
							<th class="table_headers" >Deadline</th>
							<th class="table_headers" >Responsible<br>Person</th>
							<th class="table_headers" >Contact<br>name</th>
							<th class="table_headers" >Contact<br>phone</th>
							<th class="table_headers" >Comments</th>
							<th class="table_headers" >Actions</th>
						</tr>
						
						<?php
							for($i=0; $i<$row_cnt; $i++) {
								if($i%2 == 0) {
									echo "<tr style=\"background-color: #ddffe0;\">";
									echo "<td style=\"background: #b5dda6;color: darkblue;padding: 0px 10px 0px 10px;\"><b>" . $rows[$i]['id']. "</b></td>"; 
								}else {
									echo "<tr style=\"background-color: #ffdddd;\">";
									echo "<td style=\"background: #d8a2a2;color: darkblue;padding: 0px 10px 0px 10px;\"><b>" . $rows[$i]['id']. "</b></td>"; 
								}
									 
									 echo "<td style=\"padding: 0px 10px 0px 10px;\">" . $rows[$i]['outlet_code'] . "</td>";
									 echo "<td style=\"padding: 0px 10px 0px 10px;\">" . $rows[$i]['ip_address'] . "</td>";
									 echo "<td style=\"padding: 0px 15px 0px 15px;\">" . str_replace("-","/",$rows[$i]['start_date']) . "</td>";
									 echo "<td style=\"color: darkred;padding: 0px 10px 0px 10px;\"><b>" . str_replace("-","/",$rows[$i]['final_date']) . "</b></td>";
									 echo "<td style=\"padding: 0px 10px 0px 10px;\">" . $rows[$i]['ypeuthynos'] . "</td>";
									 echo "<td style=\"padding: 0px 10px 0px 10px;\">" . $rows[$i]['user_name'] . "</td>";
									 echo "<td style=\"padding: 0px 10px 0px 10px;\"><b>" . $rows[$i]['user_phone'] . "</b></td>";
									 echo "<td style=\"padding: 0px 10px 0px 10px;\">" . $rows[$i]['notes'] . "</td>";?>
									 
								
								<td>
								<table>
									<tr>
										<td style="width:35px;">
											<form action="edit.php" method="post">
												<input type="hidden" name="recordNum" value="<?php echo $rows[$i]['id']; ?>" />
												<input type="image" src="../images/edit.png" height=25px width=25px />
											</form>
										</td>
										<td style="width:35px;>
											<form action="" method="post">
												<input type="image" src="../images/resolve.png" height=25px width=25px />
											</form>
										</td>
										<td>
											<?php echo "<td style=\"padding: 0px 10px 0px 10px;\"> <input style=\"transform: scale(1.5);\" type=\"checkbox\"> </td>";?>
										</td>
									</tr>
								</table>
								</td>
						</tr><?php
						}
						?>
					</table>
				</div>
				
			</div>
		</div> <!-- end of main div element -->

		<?php //include('footer.php'); ?>
	</body>
</html>
