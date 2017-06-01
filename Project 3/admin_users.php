<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header("location: profile.php");
        die;
    }
    require "sql_helper.php";
?>
<html>
    <body>
        <table>
            <tr>
                <td>Name</td>
                <td>CWID</td>
                <td>Gender</td>
                <td>Class</td>
                <td>Laundry</td>
                <td>Kitchen</td>
                <td>Special_Needs</td>
                <td>username</td>
                <td>password</td>
                <td>admin</td>
                <td>email</td>
                <td></td>
            </tr>
            <?php
                if(isset($_GET['message']))
                   print "<script>alert(\"".$_GET['message']."\");</script>";
                $sql = "SELECT * FROM Users";
                $result = mysqli_query($conn, $sql);
                while($user=mysqli_fetch_assoc($result))
                {
                  //  print_r($user);
                  print "<tr>
                    <td>".$user['Name']."</td>
                    <td>".$user['CWID']."</td>
                    <td>".$user['Gender']."</td>
                    <td>".$user['Class']."</td>
                    <td>".$user['Laundry']."</td>
                    <td>".$user['Kitchen']."</td>
                    <td>".$user['Special_Needs']."</td>
                    <td>".$user['username']."</td>
                    <td>".$user['password']."</td>
                    <td>".$user['admin']."</td>
                    <td>".$user['email']."</td>
                    <td><form action=delete_user.php method=post>
                        <input type=hidden name=CWID value=".$user['CWID'].">
                    	<input type=submit value = \"Delete\">
                	</form></td>
                </tr>";
                }
                echo "<form action=insert_user.php method=post><tr>
                    <td><input name=Name></td>
                    <td><input name=CWID size = 5></td>
                    <td><input name=Gender size = 5></td>
                    <td><input name=Class></td>
                    <td><input name=Laundry size = 5></td>
                    <td><input name=Kitchen size = 5></td>
                    <td><input name=Special_Needs size = 5></td>
                    <td><input name=Username></td>
                    <td><input name=Password></td>
                    <td><input name=admin size = 5></td>
                    <td><input name=email></td>
                    <td><input type=submit value=Insert></td>
                </tr></form>";
                
            ?>
       </table>
        
    </body>
</html>