<?php
    function negative() 
    {
    	print "Your residence hall choice doesn't match your specifications. Go back and fill out the form again. <br> 
    	<form action=index.php>
    	<input type=submit value = \"Go Back\">
		</form>";
    }
    
    function positive()
    {
    	print "Your residence hall choice matches your specifications. Please Continue. <br> 
    	<br>
    	<form action=results.php method=post>";
    	foreach ($_POST as $k => $v) 
    	{
    		print "<input type=hidden name=$k value = \"$v\">";
    	}
    	print "<br><input type=submit value = \"Continue\">
		</form>";
    }
    
    require 'sql.php';
    //print_r($_POST);
	$kitchen = isset($_POST["kitchen"]);
	$class = $_POST["class"];
	if ($class == "Junior" || $class == "Senior")
		$class = "Junior & Senior";
	$residenceHall = $_POST["residenceHall"];
	if ($residenceHall != "") 
	{
	    //var_dump($conn);
		print "You picked a residence hall. <br>";
		$sql = "SELECT * FROM ResidenceArea WHERE Name = \"$residenceHall\"";
		if ($result=mysqli_query($conn, $sql)) 
            { 
            	$dorm = mysqli_fetch_assoc($result);
                //print_r($dorm);
                if($class != $dorm["Class"] || ($kitchen && !$dorm["Kitchen"]))
                    negative();
                else 
                    positive();
            }
            else
            {
                print "sql failed" .mysqli_error($conn);
            }
	}
	
	else 
	{
		print "You didn't choose a residence hall. Here are some options for you:<form action=results.php method=post>";
		foreach ($_POST as $k => $v) 
    	{
    		print "<input type=hidden name=$k value = \"$v\">";
    	}
	   	$sql = "SELECT name, available_slots FROM ResidenceArea WHERE Class = \"$class\"";
	   	if($kitchen)
	   	    $sql .= "AND Kitchen = $kitchen";
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
                echo "<br></select><input type=submit value = \"Continue\"></form>\n";
            }	
            else
            {
                print "sql failed" .mysqli_error($conn);
            }
	}
?>