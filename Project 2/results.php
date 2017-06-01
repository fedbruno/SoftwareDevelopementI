<html>
<head>
<title> Housing Form Results </title>
</head>
<body>
<h1> Results! </h1>

<?php
	require 'sql.php';
	
	$residenceHall = $_POST["residenceHall"];
    $name = $_POST["name"];
    $cwid = $_POST["cwid"];
    $gender = $_POST["gender"];
    $sex = substr($gender,0,1);
    $class = $_POST["class"];
    $laundry = isset($_POST["laundry"]);
    $kitchen = isset($_POST["kitchen"]);
    $needs = isset($_POST["needs"]);
    
    $sql = "INSERT INTO Students VALUES (\"$name\", $cwid,\"$sex\", \"$class\",";
	if ($laundry)
		$sql .= "1,";
	 else 
		$sql .= "0,";
	if ($kitchen)
		$sql .= "1,";
	 else 
		$sql .= "0,";
	if ($needs)
		$sql .= "1)";
	 else 
		$sql .= "0)";
		
   // print $sql . "<br>";
	if (!$result=mysqli_query($conn, $sql)) 
	{
      	print "sql failed" .mysqli_error($conn) . "<br>";
      	die;
	}
    $sql = "INSERT INTO Reservations VALUES (\"$residenceHall\", $cwid, NOW())";
    if (!$result=mysqli_query($conn, $sql)) 
      	print "sql failed" .mysqli_error($conn) . "<br>";
	$sql = "UPDATE ResidenceArea SET Available_Slots = Available_Slots - 1 WHERE Name = \"$residenceHall\"";  
	if (!$result=mysqli_query($conn, $sql)) 
      	print "sql failed" .mysqli_error($conn);
?>

This is your Residence Hall Form confirmation. Please check if all of your input is correct. <br>

<br>
<b>Name:</b> <?php echo $name; ?><br>
<b>CWID:</b> <?php echo $cwid; ?><br>
<b>Gender:</b> <?php echo $gender; ?><br>
<b>Class:</b> <?php echo $class; ?><br>
<b>Residence Hall:</b> <?php echo $residenceHall; ?><br>
<br>
<b>Perferences:</b><br>
Special Needs: <?php if ($needs){
	echo "Yes";
} else {
	echo "No";
}
?>
<br>
Laundry: <?php if ($laundry){
	echo "Yes";
} else {
	echo "No";
}
?><br>
Kitchen: <?php if ($kitchen){
	echo "Yes";
} else {
	echo "No";
}
?><br>

<h1> Congratulations! </h1>

</body>
</html>