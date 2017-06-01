<?php
    session_start();
    require "sql_helper.php";
    
    $sql = "DELETE FROM Reservations WHERE CWID = ".$_SESSION['cwid'];	
    if (!$result=mysqli_query($conn, $sql)) 
      	print "sql failed" .mysqli_error($conn);
    
    $sql = "UPDATE ResidenceArea SET Available_Slots = Available_Slots + 1 WHERE Name = \"".$_SESSION['residence_hall']."\"";  
	if (!$result=mysqli_query($conn, $sql)) 
      	print "sql failed" .mysqli_error($conn);
      	
    unset($_SESSION['residence_hall']);
    print "Your Resevation has been deleted<br><form action=profile.php><input type=submit value = \"Go Back\"></form>";
    
?>