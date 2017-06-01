<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header("location: profile.php");
        die;
    }
    require "sql_helper.php";
    
    if(isset($_POST['CWID']))
    {                                                                                               
        $sql = "INSERT INTO Reservations VALUES (\"".$_POST["RA_Name"]."\",".$_POST["CWID"].", NOW())";
       
       if($result = mysqli_query($conn, $sql))
        {
            print "Reservation with CWID = " . $_POST['CWID'] . " successfully created
            <form action=admin_reservations.php>
        	<input type=submit value = \"Go Back\">
    		</form>";
        }
        else
        {
            print "sql failed ".mysqli_error($conn);
        }
    }
    else 
    {
        header("location: admin_reservations.php?message=No%20CWID%20chosen");
        die;
    }
?>