<!DOCTYPE html>
<html>
   <head>
      <?php include('head.php'); ?>
      <link href="../css/add_style.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <?php include('mainHeader.php'); ?>
      <div id="main"> 
         <div id="pageTitle">
            <div id="pageTitleInner">New Ticket</div>
         </div>
         
         <div id="add_main_inside">   
            <?php 
               if(isset($sql)){ 
                  $res = mysql_result($sql, 0, 0); 
               } 
            ?>
            <div id="step2_data">
               <form method="post" action="insert.php">
                  <table cellspacing="10">
                     <tr id="datesHeader">
                        <th style="font-size: 22px;text-align: center;">Entry Date </th>
                        <th style="font-size: 22px;text-align: center;">Deadline</th>
                     </tr>
                     <tr id="datesText">
                        <td style="padding:15px;text-align: center; ">
                           <input style="text-align:center;font-size:16px;" type="date" value=<?php echo "\"".date('d/m/Y')."\""; ?> name="start_date" />
                        </td>
                        <td style="padding:15px;text-align: center; ">
                           <input style="text-align:center;font-size:16px;" type="date" value=<?php echo "\"".date('d/m/Y')."\""; ?> name="final_date" />
                           
                        </td>
                     </tr>
                  </table >
                     <table>
                        <tr>
                           <th>Responsible Name: </th>
                           <td>
                              <?php
                                 $responsible = "SELECT real_name FROM users ";
                                 $result1 = mysqli_query ($conn, $responsible) or die("Error");
                              ?>
                              <select name="responsible1">
                                 <option value=""></option>
                                 <?php
                                    while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {
                                       echo "<option value='".$row[real_name]."'>".$row[real_name]."</option>";
                                    }
                                 ?>
                              </select>
                           </td>
                        </tr>
                     
                     
                        <tr> <!-- Κωδικός Πρίζας [outlet_code] -->
                           <th>Socket Code: </th>
                           <td>
                              <?php
                                 if ( empty($res) && empty($res) ) {
                              ?>
                                    <input type="text" name="outlet_code" />
                              <?php
                                 }else {
                              ?>
                                    <?php echo $outlet_code = mysqli_query ($conn, $sql) or die("Error"); ?>
                                    <input type="hidden" name="outlet_code" <?php echo "value='".$outlet_code."' " ?> />
                              <?php
                                 }
                              ?>
                           </td>
                        </tr>
                        
                        <tr> <!-- Διεύθυνση IP [ip_address] -->   
                           <th>IPv4 Address: </th>
                           <td>
                              <?php
                                 if ( empty($res) && empty($res) ) {
                              ?>
                                    <input type="text" name="ip_address" />
                              <?php
                                 }else {
                              ?>
                                    <?php echo $ip_address = mysql_result($sql, 0, 2); ?>
                                    <input type="hidden" name="ip_address" <?php echo "value='".$ip_address."' " ?> />
                              <?php
                                 }
                              ?>
                           </td>
                        </tr>
                        
                     
                  
                        <tr><!-- Πρόσωπο επικοινωνίας [user_name] -->
                           <th>Contact Name: </th>  
                           <td>
                              <input type="text" value=""   name="user_name" />
                           </td>
                        </tr>
                        <tr><!-- Τηλέφωνο Επικοινωνίας [user_phone] -->
                           <th>Contact Phone: </th>
                           <td>
                              <input type="tel" name="user_phone" />
                           </td>
                        
                        </tr>
                       
                        <tr>
                           <th>Comments</th>
                           <td>
                              <textarea value="-" name="notes"></textarea>
                           </td>
                        </tr>
                        <tr>
                           <th> Failure resolved</th>
                           <td>
                              <input type="checkbox" name="status" value="on" />
                           </td>
                        </tr>
                     </table>
                     <table>
                        <tr>
                           <td>
                                 <input id="submitButton" type="submit" name="ok" value="Submit" />
                           </td>
                        </tr>
                     </table>
               </form>
            </div> 
         </div> 
      </div> <!-- End of main div --><br><br><br>
      
      <?php //include('footer.php'); ?>
   </body> 
</html>