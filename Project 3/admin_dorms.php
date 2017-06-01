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
                <td>Capacity</td>
                <td>Available_Slots</td>
                <td>Laundry</td>
                <td>Kitchen</td>
                <td>Special_Needs</td>
                <td>Class</td>
                <td></td>
            </tr>
            <?php
                if(isset($_GET['message']))
                    print "<script>alert(\"".$_GET['message']."\");</script>";
                $sql = "SELECT * FROM ResidenceArea";
                $result = mysqli_query($conn, $sql);
                while($dorm=mysqli_fetch_assoc($result))
                {
                  //  print_r($dorm);
                  print "<tr>
                    <td>".$dorm['Name']."</td>
                    <td>".$dorm['Capacity']."</td>
                    <td>".$dorm['Available_Slots']."</td>
                    <td>".$dorm['Laundry']."</td>
                    <td>".$dorm['Kitchen']."</td>
                    <td>".$dorm['Special_Needs']."</td>
                    <td>".$dorm['Class']."</td>
                    <td><form action=delete_dorm.php method=post>
                        <input type=hidden name=Name value=\"".$dorm['Name']."\">
                    	<input type=submit value = \"Delete\">
                	</form></td>
                </tr>";
                }
                echo "<form action=insert_dorm.php method=post><tr>
                    <td><input name=Name></td>
                    <td><input name=Capacity size = 5></td>
                    <td><input name=Available_Slots size = 5></td>
                    <td><input name=Laundry size = 5></td>
                    <td><input name=Kitchen size = 5></td>
                    <td><input name=Special_Needs size = 5></td>
                    <td><input name=Class></td>
                    <td><input type=submit value=Insert></td>
                </tr></form>";
            ?>
        </table>
        
    </body>
</html>