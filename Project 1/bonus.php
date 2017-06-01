<?php
    function negative() 
    {
    	print "Your residence hall choice doesn't match your specifications. Go back and fill out the form again. <br> 
    	<form action=bonus.php>
    	<input type=submit value = \"Go Back\">
		</form>";
    }
    
    function positive()
    {
    	print "Your residence hall choice matches your specifications. Please Continue. <br> 
    	<form action=bonus.php method=post>";
    	foreach ($_POST as $k => $v) 
    	{
    		print "<input type=hidden name=$k value = \"$v\">";
    	}
    	print "<input type=hidden name=results><br><input type=submit value = \"Continue\">
		</form>";
    }
    
    function halls($halls)
    {
    	print "<form action=bonus.php method=post>";
    	foreach ($_POST as $k => $v) 
    	{
    		print "<input type=hidden name=$k value = \"$v\">";
    	}
    	print "<select name=\"residenceHall\">";
    	foreach($halls as $hall)
    	{
    		print " <option value=\"$hall\">$hall</option>";
    	}
    	print "<input type=hidden name=results><input type=submit value = \"Continue\"></select></form>";
    }
    
    if(isset($_POST["verify"]) && !isset($_POST["results"]))
    {
        $kitchen = isset($_POST["kitchen"]);
    	$class = $_POST["class"];
    	$residenceHall = $_POST["residenceHall"];
    	if ($residenceHall != "") 
    	{
    		print "You picked a residence hall. <br>";
    		if ($residenceHall == "Champagnat Hall") 
    		{
    			if ($class != "Freshman") 
    			{
    				negative();	
    			}
    			else
    			{
    				positive();
    			}
    		}
    		elseif ($residenceHall== "Marian Hall") 
    		{
    			if ($class != "Freshman" || $kitchen) 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}
    		}
    		elseif ($residenceHall == "Leo Hall") 
    		{
    			if ($class != "Freshman") 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}
    		}
    		elseif ($residenceHall == "Sheahan Hall") 
    		{
    			if ($class != "Freshman") 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}	
    		}
    		elseif ($residenceHall == "Midrise Hall") 
    		{
    			if ($class != "Sophomore" || $kitchen) 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}		
    		}	
    		elseif ($residenceHall == "Foy Townhouses") 
    		{
    			if ($class != "Sophomore") 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}		
    		}	
    		elseif ($residenceHall == "New Townhouses") 
    		{
    			if ($class != "Sophomore") 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}		
    		}	
    		elseif ($residenceHall == "Lower West Cedar Street Townhouses") 
    		{
    			if ($class != "Sophomore") 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}		
    		}		
    		elseif ($residenceHall == "Upper West Cedar Street Townhouses") 
    		{
    			if ($class != "Sophomore") 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}		
    		}
    		elseif ($residenceHall == "Building A") 
    		{
    			if ($class != "Junior" && $class != "Senior") 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}		
    		}		
    		elseif ($residenceHall == "New Fulton Townhouses") 
    		{
    			if ($class != "Junior" && $class != "Senior") 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}		
    		}		
    		elseif ($residenceHall == "Fulton Street Townhouses") 
    		{
    			if ($class != "Junior" && $class != "Senior") 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}		
    		}		
    		elseif ($residenceHall == "Talmadge Court") 
    		{
    			if ($class != "Junior" && $class != "Senior") 
    			{
    				negative();
    			}
    			else
    			{
    				positive();
    			}		
    		}		
    	}
    	
    	else 
    	{
    		print "You didn't choose a residence hall. Here are some options for you:";
    	        
    		if ($class == "Freshman")
    		{ 
    			if ($kitchen)
    			{
    				halls(array ("Champagnat Hall", "Leo Hall", "Sheahan Hall"));
    			}
    			else
    			{
    				halls(array ("Champagnat Hall", "Leo Hall", "Sheahan Hall", "Marian Hall"));
    			}
    	
    		}		
    		elseif ($class == "Sophomore")
    		{
    				if ($kitchen)
    				{
    				halls(array("Foy Townhouses", "New Tounhouses", "Lower West Cedar Street Townhouses", "Upper West Cedar Street Tounhouses"));
    				}		
    				else 
    				{
    				halls(array("Foy Townhouses", "New Tounhouses", "Lower West Cedar Street Townhouses", "Upper West Cedar Street Tounhouses", "Midrise"));
    				}
    		}	
    		elseif ($class == "Junior" || $class == "Senior")
    		{
    				halls(array("Building A", "New Fulton", "Fulton Street", "Talmadge Court"));
    		}		
    	}
    }
    elseif(isset($_POST["results"]))
    {
        print "<h1> Results! </h1>
        
        This is your Residence Hall Form confirmation. Please check if all of your input is correct. <br>
        
        <br>
        <b>Name:</b> " . $_POST["name"] . "<br>
        <b>CWID:</b> " . $_POST["cwid"] . "<br>
        <b>Gender:</b> " . $_POST["gender"] . "<br>
        <b>Class:</b> " . $_POST["class"] . "<br>
        <b>Residence Hall:</b> " . $_POST["residenceHall"] . "<br>
        <br>
        <b>Perferences:</b><br>
        Special Needs: ";
        if (isset($_POST["needs"])){
        	echo "Yes";
        } else {
        	echo "No";
        }
        print "<br>Laundry: ";
        if (isset($_POST["laundry"])){
        	echo "Yes";
        } else {
        	echo "No";
        }
        print "<br>Kitchen: ";
        if (isset($_POST["kitchen"])){
        	echo "Yes";
        } else {
        	echo "No";
        }
        print"<br><h1> Congratulations! </h1>";
    }
    else
    {
        print "<h1> Residence Hall Form! </h1>
            <form action=\"bonus.php\" method=\"post\">
            	<input type= \"hidden\" name=\"verify\">
            	Name: <input type=\"text\" name=\"name\"><br> 
                	<br>
            	CWID: <input type=\"text\" name=\"cwid\"><br>
            	    <br>
            	Gender: <input type=\"radio\" name=\"gender\" value=\"Male\"> Male
            	<input type=\"radio\" name=\"gender\" value=\"Female\"> Female<br>
            		<br>
            	Class: <input type=\"radio\" name=\"class\" value=\"Freshman\">Freshman
            	<input type=\"radio\" name=\"class\" value=\"Sophomore\">Sophomore
            	<input type=\"radio\" name=\"class\" value=\"Junior\">Junior
            	<input type=\"radio\" name=\"class\" value=\"Senior\">Senior <br>
            		<br>
            	Residence Halls:
            	<select name=\"residenceHall\">
            	  <option></option>
                  <option value=\"Leo Hall\">Leo Hall</option>
                  <option value=\"Champagnat Hall\">Champagnat Hall</option>
                  <option value=\"Marian Hall\">Marian Hall</option>
                  <option value=\"Sheahan Hall\">Sheahan Hall</option>
                  <option value=\"Midrise Hall\">Midrise Hall</option>
                  <option value=\"Foy Townhouses\">Foy Townhouses</option>
                  <option value=\"New Townhouses\">New Townhouses</option>
                  <option value=\"Lower West Cedar Street Townhouses\">Lower West Cedar Street Townhouses</option>
                  <option value=\"Upper West Cedar Street Townhouses\">Upper West Cedar Street Townhouses</option>
                  <option value=\"Building A\">Building A</option>
                  <option value=\"New Fulton Townhouses\">New Fulton Townhouses</option>
                  <option value=\"Fulton Street Townhouses\">Fulton Street Townhouses</option>
                  <option value=\"Talmadge Court\">Talmadge Court</option>
                </select> <br>
                
                <br>
                Perferences: <br>
                <input type=\"checkbox\" name=\"needs\" value=\"true\"> Special Needs<br>
                <input type=\"checkbox\" name=\"laundry\" value=\"true\"> Laundry on Premise<br>
                <input type=\"checkbox\" name=\"kitchen\" value=\"true\"> Fully Equipped Kitchen<br>
            	
            	
            	<input type=\"submit\" value=\"Submit\">
            
            
            </form>";
    }
?>