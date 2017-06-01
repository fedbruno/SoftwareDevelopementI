<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header("location: profile.php");
        die;
    }
    require "sql_helper.php";
    
    if(isset($_POST['CWID']))
    {                                                                                               //hi //hey
        $sql = "INSERT INTO Users VALUES (\"".$_POST["Name"]."\",".$_POST["CWID"].",\"".$_POST["Gender"]."\",\"".$_POST["Class"]."\",".$_POST["Laundry"].",".$_POST["Kitchen"].",".$_POST["Special_Needs"].",\"".$_POST["Username"]."\",PASSWORD(\"".$_POST["Password"]."\"),\"".$_POST["admin"]."\",\"".$_POST["email"]."\")";
       
       if($result = mysqli_query($conn, $sql))
        {
            print "User with CWID = ". $_POST['CWID']." was successfully created
            <form action=admin_users.php>
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
        header("location: admin_users.php?message=No%20CWID%20chosen");
        die;
    }
?>