  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 

  <!-- Link all the CSS files-->
  <link href="../css/menu.css" rel="stylesheet" type="text/css" />
  <link href="../css/general.css"  rel="stylesheet" type="text/css" />

  <!-- Link all the google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

  <?php require('connect.php');?>

  <script type="text/javascript">
      var datefield=document.createElement("input")
      datefield.setAttribute("type", "date")
      if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
          document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
          document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
          document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
      }
  </script>
   
  <script>
  if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
      jQuery(function($){ //on document.ready
          $('#birthday').datepicker();
      })
  }
  </script>

  <script type="text/javascript"> 
     function formDefault(theInput) { 
        if (theInput.value =='') { 
           theInput.value = theInput.defaultValue; 
        } 
     } 
  </script> 
  <?php
     header('Content-Type:text/html; charset=UTF-8'); 
     session_start();
     if( !isset($_SESSION['user_id']) ){
         header('Location: ../index.php');
     }

     // Function tat returns the real name of the user loged in
     function real_name() {
        require 'connect.php';
        $id = $_SESSION['user_id'];
        $result = mysqli_query($conn, "SELECT real_name FROM users WHERE `username`='$id' ");
        if ($result !== FALSE) {
           $result = $result->fetch_all(MYSQLI_ASSOC);
        }
         $conn->close();
         return $result;
     }
     
  ?>
