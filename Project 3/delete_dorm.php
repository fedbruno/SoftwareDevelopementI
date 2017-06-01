<?php
    
    session_start();
    if(!$_SESSION['admin'])
    {
        header("location: profile.php");
    }
    require 'sql_helper.php';
    
    if(isset($_POST['Name']))
    {
        $sql = "DELETE FROM ResidenceArea WHERE Name = \"".$_POST['Name']."\"";	
        print $sql;
    if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            echo mysqli_stmt_affected_rows($stmt)." rows were deleted from Residence Area table\n<br>";
            mysqli_stmt_close($stmt);
        }
        
        print "<form action=admin_dorms.php>
        	<input type=submit value = \"Go Back\">
    		</form>";
    }    
    else{
       // header("location:admin_dorms.php?message=No%20Name%20chosen");
        die;
        }
?>