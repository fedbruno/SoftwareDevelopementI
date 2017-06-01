<html>
<head>
<title> Housing Form Results </title>
</head>
<body>
<h1> Results! </h1>

This is your Residence Hall Form confirmation. Please check if all of your input is correct. <br>

<br>
<b>Name:</b> <?php echo $_POST["name"]; ?><br>
<b>CWID:</b> <?php echo $_POST["cwid"]; ?><br>
<b>Gender:</b> <?php echo $_POST["gender"]; ?><br>
<b>Class:</b> <?php echo $_POST["class"]; ?><br>
<b>Residence Hall:</b> <?php echo $_POST["residenceHall"]; ?><br>
<br>
<b>Perferences:</b><br>
Special Needs: <?php if (isset($_POST["needs"])){
	echo "Yes";
} else {
	echo "No";
}
?>
<br>
Laundry: <?php if (isset($_POST["laundry"])){
	echo "Yes";
} else {
	echo "No";
}
?><br>
Kitchen: <?php if (isset($_POST["kitchen"])){
	echo "Yes";
} else {
	echo "No";
}
?><br>

<h1> Congratulations! </h1>

</body>
</html>