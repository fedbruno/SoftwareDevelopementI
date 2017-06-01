<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header("location: profile.php");
        die;
    }
    require "sql_helper.php";
    
    if(isset($_POST['Name']))
    {                                                                                              
        $sql = "INSERT INTO ResidenceArea VALUES (\"".$_POST["Name"]."\",".$_POST["Capacity"].",\"".$_POST["Available_Slots"]."\",".$_POST["Laundry"].",".$_POST["Kitchen"].",".$_POST["Special_Needs"].",\"".$_POST["Class"]."\")";
       
       if($result = mysqli_query($conn, $sql))
        {
            print "Dorm with Name = ". $_POST['Name']." was successfully created
            <form action=admin_dorms.php>
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
        header("location: admin_dorms.php?message=No%20Name%20chosen");
        die;
    }
?>