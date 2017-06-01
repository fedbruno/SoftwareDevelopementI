<html>
<head>
<title> Housing Form </title>
</head>
<body>
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
	<select name="residenceHall">
	  <option></option>
      <option value="Leo Hall">Leo Hall</option>
      <option value="Champagnat Hall">Champagnat Hall</option>
      <option value="Marian Hall">Marian Hall</option>
      <option value="Sheahan Hall">Sheahan Hall</option>
      <option value="Midrise Hall">Midrise Hall</option>
      <option value="Foy Townhouses">Foy Townhouses</option>
      <option value="New Townhouses">New Townhouses</option>
      <option value="Lower West Cedar Street Townhouses">Lower West Cedar Street Townhouses</option>
      <option value="Upper West Cedar Street Townhouses">Upper West Cedar Street Townhouses</option>
      <option value="Building A">Building A</option>
      <option value="New Fulton Townhouses">New Fulton Townhouses</option>
      <option value="Fulton Street Townhouses">Fulton Street Townhouses</option>
      <option value="Talmadge Court">Talmadge Court</option>
    </select> <br>
    
    <br>
    Perferences: <br>
    <input type="checkbox" name="needs" value="true"> Special Needs<br>
    <input type="checkbox" name="laundry" value="true"> Laundry on Premise<br>
    <input type="checkbox" name="kitchen" value="true"> Fully Equipped Kitchen<br>
	
	
	<input type="submit" value="Submit">


</form>
</body>
</html>