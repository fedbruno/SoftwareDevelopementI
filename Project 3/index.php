<?php
    session_start();
    if(isset($_SESSION['login_user']))
    {
        header("location: profile.php");
        die;
    }
    if(isset($_GET['message']))
        print "<script>alert(\"".$_GET['message']."\");</script>";
    echo "<form  action=login.php method=post>
        	Username: <input type=text name=username placeholder=username><br> 
            	<br>
        	Password: <input name=password placeholder=******** type=password><br>
        	    <br>
        	<input type=submit value = \"Log In\">
            <input type=submit value = \"Sign Up\" formaction=signup.php>
        </form>";
?>