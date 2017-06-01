<html>
<head>
<title> Sign Up Form </title>
</head>
<body>
    <?php
        session_start();
    ?>
    <h1> Sign Up Form! </h1>
    <form action="create_user.php" method="post">
    	
    	Name: <input type="text" name="name"><br> 
        	<br>
    	CWID: <input type="text" name="cwid"><br>
    	    <br>
    	Username: <input type=text name=username placeholder=username><br> 
            <br>
        Password: <input name=password placeholder=******** type=password><br>
        	 <br>
        Email: <input type=text name=email><br> 
            <br>
    	Gender: <input type="radio" name="gender" value="M"> Male
    	<input type="radio" name="gender" value="F"> Female<br>
    		<br>
    	Class: <input type="radio" name="class" value="Freshman">Freshman
    	<input type="radio" name="class" value="Sophomore">Sophomore
    	<input type="radio" name="class" value="Junior">Junior
    	<input type="radio" name="class" value="Senior">Senior <br>
        
        <br>
        Perferences: <br>
        <input type="checkbox" name="needs" value="true"> Special Needs<br>
        <input type="checkbox" name="laundry" value="true"> Laundry on Premise<br>
        <input type="checkbox" name="kitchen" value="true"> Fully Equipped Kitchen<br>
    	
    	
    	<input type="submit" value="Submit">
    
    
     </form>
</body>
</html>