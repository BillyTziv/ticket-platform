  <div id="header">
         <!-- MENU -->
         <div id="menubara">
            <div class="container">
               <table width="100%">
                  <tr>
                     <td width="350px">
                        <img  src="../images/logo.png" height="38px" />

                     </td>
                     <td width="500px">
                        <ul id="nav">
                           <li><a class="hsubs" href="add.php">New ticket</a> </li>
                           <li><a class="hsubs" href="view.php">View tickets</a> </li>
                           <li><a class="hsubs" href="reporting.php">Reporting</a> </li>
                        </ul>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
            
         <div id="login_bar">
            <div id="login_bar_inside">
               <div id="loginbar_profile">
                  <table style="width:400px;">
                     <tr>
                        <td style="width:50px;">
                           <a href=""><img src="../images/profile.png" width="32px" /></a>
                        </td>
                        <td>
                           <div id="login_bar_name">
                              <?php
                                 echo real_name()[0]['real_name'];
                              ?>
                           </div>
                        </td>
                     </tr>
                  </table>
               </div>
               <div id="loginbar_logout">
                  <table>
                     <tr>
                        <td>
                           Logout
                        </td>
                        <td>
                           <a href="logout.php">
                              <img src="../images/logout.png" width="32px"  value="logout"/>
                           </a>
                        </td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div> <!-- heaad-->
