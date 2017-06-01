<?php
    session_start();
    require "sql_helper.php";
    
   // print_r($_POST);
    $laundry = isset($_POST["laundry"]);
    $kitchen = isset($_POST["kitchen"]);
    $needs = isset($_POST["needs"]);
    $class = $_POST["class"];
    if ($class == "Junior" || $class == "Senior")
		$class = "Junior & Senior";
    $sql = "INSERT INTO Users VALUES (\"".$_POST["name"]."\",".$_POST["cwid"].",\"".$_POST["gender"]."\",\"$class\",";
    if ($laundry)
		$sql .= "1,";
	 else 
		$sql .= "0,";
	if ($kitchen)
		$sql .= "1,";
	 else 
		$sql .= "0,";
	if ($needs)
		$sql .= "1,";
	 else 
		$sql .= "0,";
    $sql .= "\"".$_POST["username"]."\",PASSWORD(\"".$_POST["password"]."\"),\"".$_POST["admin"]."\",\"".$_POST["email"]."\")";
    //print "<br>" . $sql . "<br>";
    //INSERT INTO `Users`(`Name`, `CWID`, `Gender`, `Class`, `Laundry`, `Kitchen`, `Special_Needs`, `username`, `password`, `admin`, `email`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
    if($result = mysqli_query($conn, $sql))
    {
        $_SESSION['login_user']=$_POST["username"];
       	$_SESSION['cwid']=$_POST["cwid"];
    	$_SESSION['class']=$class;
    	$_SESSION['gender']=$_POST["gender"];
    	if ($laundry)
    		$_SESSION['laundry'] = 1;
    	 else 
    		$_SESSION['laundry'] = 0;
    	if ($kitchen)
    		$_SESSION['kitchen'] = 1;
    	 else 
    		$_SESSION['kitchen'] = 0;
    	if ($needs)
    		$_SESSION['special_needs'] = 1;
    	 else 
    		$_SESSION['special_needs'] = 0;
	    $_SESSION['admin']=$_POST["admin"];
    	$_SESSION['email']=$_POST["email"];
    	$_SESSION['name']=$_POST["name"];
        header("location:	profile.php");
    }
    else
    {
       // print "sql failed" .mysqli_error($conn);
    }
    mysqli_close($conn);

?>