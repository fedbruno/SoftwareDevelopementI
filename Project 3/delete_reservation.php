<?php
    session_start();
    if (!$_SESSION['admin'])
    {
        header("location: profile.php");
    }
    require 'sql_helper.php';

if(isset($_POST['CWID']))    
        {
        $sql = "DELETE FROM Reservations WHERE CWID = \"".$_POST['CWID']."\"";	
        
    
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            echo mysqli_stmt_affected_rows($stmt)." rows were deleted from Reservations table\n<br>";
            mysqli_stmt_close($stmt);
        }
        
        print "<form action=admin_reservations.php>
        	<input type=submit value = \"Go Back\">
    		</form>";
    }
    else{
        header("location:admin_reservations.php?message=No%20CWID%20chosen");
        die;
        }

?>