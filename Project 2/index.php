<html>
<head>
<title> Housing Form </title>
</head>
<body>
    <?php
        require 'sql.php';
    ?>
    <h1> Residence Hall Form! </h1>
    <form action="verify.php" method="post">
    	
    	Name: <input type="text" name="name"><br> 
        	<br>
    	CWID: <input type="text" name="cwid"><br>
    	    <br>
    	Gender: <input type="radio" name="gender" value="Male"> Male
    	<input type="radio" name="gender" value="Female"> Female<br>
    		<br>
    	Class: <input type="radio" name="class" value="Freshman">Freshman
    	<input type="radio" name="class" value="Sophomore">Sophomore
    	<input type="radio" name="class" value="Junior">Junior
    	<input type="radio" name="class" value="Senior">Senior <br>
    		<br>
    	Residence Halls:
        <?php
            $sql = "SELECT name, available_slots FROM ResidenceArea"; // this is the SQL to get RA entries from database
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
                echo "</select>\n";
            }
            else
            {
                print "sql failed" .mysqli_error($conn);
            }
        ?>
        <br>
        
        <br>
        Perferences: <br>
        <input type="checkbox" name="needs" value="true"> Special Needs<br>
        <input type="checkbox" name="laundry" value="true"> Laundry on Premise<br>
        <input type="checkbox" name="kitchen" value="true"> Fully Equipped Kitchen<br>
    	
    	
    	<input type="submit" value="Submit">
    
    
     </form>
</body>
</html>