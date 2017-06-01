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
    	<form action=results.php method=post>";
    	foreach ($_POST as $k => $v) 
    	{
    		print "<input type=hidden name=$k value = \"$v\">";
    	}
    	print "<br><input type=submit value = \"Continue\">
		</form>";
    }
    
    function halls($halls)
    {
    	print "<form action=results.php method=post>";
    	foreach ($_POST as $k => $v) 
    	{
    		print "<input type=hidden name=$k value = \"$v\">";
    	}
    	print "<select name=\"residenceHall\">";
    	foreach($halls as $hall)
    	{
    		print " <option value=\"$hall\">$hall</option>";
    	}
    	print "<input type=submit value = \"Continue\"></select></form>";
    }
    
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
?>