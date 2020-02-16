<!DOCTYPE html>
<html>
   <head>
      <?php include('head.php'); ?>
      <?php
         include 'connect.php';
         if( isset($_POST['recordNum']) )  {
            $id = $_POST['recordNum'];
            $sql_join = mysqli_query($conn, " SELECT * FROM failures WHERE failures.id='$id' ");
            if ($sql_join !== FALSE) {
               $rows = $sql_join->fetch_all(MYSQLI_ASSOC);
            }
            $row_cnt = $sql_join->num_rows;

            //printf("Result set has %d rows.\n", $row_cnt);
            $conn->close();

            $res_id = $rows[0]['id'];
            $res_entryDate = $rows[0]['start_date'];
            $res_deadline = $rows[0]['final_date'];
            $res_respName = $rows[0]['ypeuthynos'];
            $res_contactName = $rows[0]['user_name'];
            $res_contactPhone =$rows[0]['user_phone'];
            $res_notes = $rows[0]['notes'];
            $res_socketCode = $rows[0]['outlet_code'];
            $res_IPAddr = $rows[0]['ip_address'];
            $res_status = $rows[0]['status'];
         }
      ?>
      <style type="text/css">
         #step2_data table {
            margin: auto;
         }

         #step2_data table {
            margin-top: 45px;
         }

         #step2_data table th {
            color: white;
            font-family: 'Slabo 27px', serif;
            font-weight: normal;
            font-size:20px;
            text-align: right;
            padding-right: 25px;
            padding-top: 15px;
            padding-bottom: 15px;
         }

         #step2_data table td {
            color: white;
            text-align: left;
            width: 300px;
         }
         #step2_data textarea {
            width: 100%;
            height: 100px;
         }
         #step2_data input, select {
            width: 100%;
            height: 35px;
            border-radius: 15px;
            padding-left: 20px;
         }

         #submitButton {
            background-color: #77B900;
            border-color: #77B900;
            font-weight: bold;
         }

         #datesText input {
            font-size: 27px;
            padding: 0px;
         }


      </style>
   </head>
   <body>
      <?php include('mainHeader.php'); ?>
      <div id="main"> 
         <div id="pageTitle">
            <div id="pageTitleInner">Update Ticket</div>
         </div>
         
         <div id="add_main_inside">   
            <?php 
               if(isset($sql)){ 
                  $res = mysql_result($sql, 0, 0); 
               } 
            ?>
            <div id="step2_data">
               <form method="post" action="updateTicket.php">
                  <table>
                     <tr id="datesHeader">
                        <th style="font-size: 22px;text-align: center;">Entry Date </th>
                        <th style="font-size: 22px;text-align: center;">Deadline</th>
                     </tr>
                     <tr id="datesText">
                        <td style="padding:15px;text-align: center; ">
                           <?php
                              if( isset($_POST['recordNum']) )  {
                                 echo "<input style=\"text-align:center;font-size:16px;\" type=\"date\" name=\"start_date\" value=\"$res_entryDate\" />";
                              }
                           ?>  
                        </td>
                        <td style="padding:15px;text-align: center; ">
                              <?php
                                 if( isset($_POST['recordNum']) )  {
                                    echo "<input style=\"text-align:center;font-size:16px;\"  type=\"date\" name=\"final_date\" value=\"$res_deadline\" />";
                                 }
                              ?>
                        </td>
                     </tr>
                  </table >
                     <table>
                        <tr>
                           <th>Responsible Name: </th>
                           <td>
                              <?php
                                 if( isset($_POST['recordNum']) )  {
                                    echo "<input type=\"text\" name=\"respName\" value=\" $res_respName \" />";
                                 }
                              ?>
                           </td>
                        </tr>
                     
                     
                        <tr> <!-- Κωδικός Πρίζας [outlet_code] -->
                           <th>Socket Code: </th>
                           <td>
                              <?php
                                 if( isset($_POST['recordNum']) )  {
                                    echo "<input type=\"text\" name=\"socketCode\" value=\" $res_socketCode  \" />";
                                 }
                              ?>
                           </td>

                        </tr>
                        
                        <tr> <!-- Διεύθυνση IP [ip_address] -->   
                           <th>IPv4 Address: </th>
                           <td>
                              <?php
                                 if( isset($_POST['recordNum']) )  {
                                    echo "<input type=\"text\" name=\"IPAddr\" value=\" $res_IPAddr  \" />";
                                 }
                              ?>
                           </td>
                        </tr>
                        
                     
                  
                        <tr><!-- Πρόσωπο επικοινωνίας [user_name] -->
                           <th>Contact Name: </th>  
                           <td>
                              <?php
                                 if( isset($_POST['recordNum']) )  {
                                    echo "<input type=\"text\" name=\"contactName\" value=\" $res_contactName  \" />";
                                 }
                              ?>
                           </td>
                        </tr>
                        <tr><!-- Τηλέφωνο Επικοινωνίας [user_phone] -->
                           <th>Contact Phone: </th>
                           <td>
                              <?php
                                 if( isset($_POST['recordNum']) )  {
                                    echo "<input type=\"text\" name=\"contactPhone\" value=\"  $res_contactPhone \" />";
                                 }
                              ?>
                           </td>
                        
                        </tr>
                       
                        <tr>
                           <th>Comments</th>
                           <td>
                              <?php
                                 if( isset($_POST['recordNum']) )  {
                                    echo "<textarea value=\" $res_notes \" name=\"notes\">$res_notes</textarea>";
                                 }
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <th> Ticket resolved</th>
                           <td>
                              <?php
                                 if( isset($_POST['recordNum']) )  {
                                    echo "<input type=\"checkbox\" name=\"status\" value=\"$res_status\" />";
                                 }
                              ?>
                           </td>
                        </tr>
                     </table>
                     <table>
                        <tr>
                           <td>
                                 <?php echo "<input name=\"ticketID\" type=\"hidden\" value=\" $res_id\" />"; ?>
                                 <input id="submitButton" type="submit" name="ok" value="Update" />
                           </td>
                        </tr>
                     </table>
               </form>
            </div> 
         </div> 
      </div><!-- End of main div -->
      
      <?php //include('footer.php'); ?>
   </body> 
</html>