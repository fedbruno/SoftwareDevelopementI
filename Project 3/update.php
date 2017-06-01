<?php
    session_start();
    require "sql_helper.php";
    $sql = "UPDATE Reservations SET RA_Name = \"".$_POST['residenceHall']."\" WHERE CWID = ".$_SESSION['cwid'];	
    if (!$result=mysqli_query($conn, $sql)) 
      	print "sql failed" .mysqli_error($conn);
    
    $sql = "UPDATE ResidenceArea SET Available_Slots = Available_Slots + 1 WHERE Name = \"".$_SESSION['residence_hall']."\"";  
	if (!$result=mysqli_query($conn, $sql)) 
      	print "sql failed" .mysqli_error($conn);
      	
    $sql = "UPDATE ResidenceArea SET Available_Slots = Available_Slots - 1 WHERE Name = \"".$_POST['residenceHall']."\"";  
	if (!$result=mysqli_query($conn, $sql)) 
      	print "sql failed" .mysqli_error($conn);
    
    $_SESSION['residence_hall'] = $_POST['residenceHall'];
   // mail($_SESSION['email'], "Resevation Update", "Your residence hall reservation has been updated to ".$_SESSION['residence_hall']);
    print "Your Resevation has been updated ".$_SESSION['residence_hall']."<br><form action=profile.php><input type=submit value = \"Go Back\"></form>";
?>