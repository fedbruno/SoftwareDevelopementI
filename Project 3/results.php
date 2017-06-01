<html>
<head>
<title> Housing Form Results </title>
</head>
<body>
<h1> Results! </h1>

<?php
	session_start();
	require 'sql_helper.php';
	
	$residenceHall = $_POST["residenceHall"];
	if(empty($_SESSION['residence_hall']))
	{
	    $sql = "INSERT INTO Reservations VALUES (\"$residenceHall\",".$_SESSION['cwid']. ", NOW())";
	
	    if (!$result=mysqli_query($conn, $sql)) 
	    {
	      	print "sql failed" .mysqli_error($conn) . "<br>";
	      	die;
	    }
		$sql = "UPDATE ResidenceArea SET Available_Slots = Available_Slots - 1 WHERE Name = \"$residenceHall\"";  
		if (!$result=mysqli_query($conn, $sql)) 
	      	print "sql failed" .mysqli_error($conn);
	    $_SESSION['residence_hall'] = $residenceHall;
	}
?>

This is your Residence Hall Form confirmation. Please check if all of your input is correct. <br>

<br>
<b>Name:</b> <?php echo $_SESSION['name']; ?><br>
<b>CWID:</b> <?php echo $_SESSION['cwid']; ?><br>
<b>Gender:</b> <?php echo $_SESSION['gender']; ?><br>
<b>Class:</b> <?php echo $_SESSION['class']; ?><br>
<b>Residence Hall:</b> <?php echo $residenceHall; ?><br>
<br>
<b>Perferences:</b><br>
Special Needs: <?php if ($_SESSION['special_needs']){
	echo "Yes";
} else {
	echo "No";
}
?>
<br>
Laundry: <?php if ($_SESSION['laundry']){
	echo "Yes";
} else {
	echo "No";
}
?><br>
Kitchen: <?php if (	$_SESSION['kitchen']){
	echo "Yes";
} else {
	echo "No";
}
?><br>

<h1> Congratulations! </h1>
<?php print "
<form action=profile.php><input type=submit value = \"Go Back\"></form>"; ?>
</body>
</html>