<?php
function displayHalls($options)
{
    require 'sql_helper.php';
    print "<form method=post>";
   	$sql = "SELECT name, available_slots FROM ResidenceArea WHERE Class = \"".$_SESSION['class']."\"";
   	if($kitchen)
   	    $sql .= "AND Kitchen = ".$_SESSION['kitchen'];
    if ($result=mysqli_query($conn, $sql)) 
    { 
        $numRows = mysqli_num_rows($result); // determine how many rows(i.e., records) are returned
        echo "<select name=residenceHall><option></option>\n";
        for ($i=0; $i<$numRows; $i++) 
        {
            $aDorm = mysqli_fetch_assoc($result); // get the next RA entry
            $dormName = $aDorm['name'];
            $dormAvailable = $aDorm['available_slots'];
            print "<option value=\"$dormName\"";
            if($dormAvailable <= 0)
                print "disabled";
            print ">$dormName ($dormAvailable)</option>\n";
        }
        if($options == "create")
            echo "<br></select><br><input type=submit value = \"Create Reservation\" formaction=results.php></form>";
        elseif ($options == "update/delete") 
        {
            echo "<br></select><br><input type=submit value = \"Update Reservation\" formaction=update.php> <input type=submit value = \"Delete Reservation\" formaction=delete.php></form>";
        }
    }	
    else
    {
        print "sql failed" .mysqli_error($conn);
    }
}

session_start();
if(empty($_SESSION['login_user']))
{
    header("location: index.php");
    die;
}
if($_SESSION['admin'])
{
    header("location: admin_main.php");
    die;
}
    echo "Welcome ".$_SESSION['login_user'].", it's nice to have you here!\n<br>";
    echo "<br>";
   // print_r($_SESSION);
    echo "<br>";
    
	if	(isset($_SESSION['residence_hall']))	
	{
	    print "Your current reserved residence hall is ".$_SESSION['residence_hall'];
	    displayHalls("update/delete");
	}
    else
    {
	    print "You currently do not have residence hall reservation. Here are some options for you:";
	    displayHalls("create");
    }
	

?>