<?php 
session_start();


if (empty($_POST["username"]) || empty($_POST["password"])) {
    print "You did not provide a username or  password. Please go back and refill both fields.";
}
else 
{
    require "sql_helper.php"; // establishing connection
    $username=$_POST['username']; // defining username and password
	$password=$_POST['password'];
	

    $sql = "select	*	from	Users	where	password=password('$password')	AND	username=('$username')";	
    echo $sql;	
    
    if($result = mysqli_query($conn, $sql))
    {
       print "sql worked";
    }
    else
    {
        print "sql failed" .mysqli_error($conn);
    }
    
	if	(mysqli_num_rows($result) ==	1)	{	
    	
    	//	Initializing Session	
    	$user = mysqli_fetch_assoc($result);
    	$_SESSION['login_user']=$username;
    	$_SESSION['cwid']=$user["CWID"];
    	$_SESSION['class']=$user["Class"];
    	$_SESSION['gender']=$user["Gender"];
    	$_SESSION['kitchen']=$user["Kitchen"];
    	$_SESSION['laundry']=$user["Laundry"];
    	$_SESSION['special_needs']=$user["Special_Needs"];
	    $_SESSION['admin']=$user["admin"];
    	$_SESSION['email']=$user["email"];
    	$_SESSION['name']=$user["Name"];
    	
    	$sql = "SELECT * FROM Reservations WHERE CWID = ".$_SESSION['cwid'];
        $result = mysqli_query($conn, $sql);
    	if	(mysqli_num_rows($result) == 1)	
    	{
    	    $res = mysqli_fetch_assoc($result);
    	    $_SESSION['residence_hall'] = $res['RA_Name'];
    	}
	    echo	"Initializing	session...";	
		header("location:	profile.php");	//	Redirecting	To	Other	Page	
    }	else	{	//	no	such	login	
		echo	"<br>Username	or	Password	is	invalid.";	
	}	
			
		mysqli_close($conn);	//	Closing	Connection	
}


?>

