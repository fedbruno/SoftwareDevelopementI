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
                <td>RA_Name</td>
                <td>CWID</td>
                <td>Reservation_Date</td>
                <td></td>
            </tr>
            <?php
                if(isset($_GET['message']))
                    print "<script>alert(\"".$_GET['message']."\");</script>";
                $sql = "SELECT * FROM Reservations";
                $result = mysqli_query($conn, $sql);
                while($res=mysqli_fetch_assoc($result))
                {
                  //  print_r($res);
                  print "<tr>
                    <td>".$res['RA_Name']."</td>
                    <td>".$res['CWID']."</td>
                    <td>".$res['Rerservation_Date']."</td>
                    <td><form action=delete_reservation.php method=post>
                        <input type=hidden name=CWID value=".$res['CWID'].">
                    	<input type=submit value = \"Delete\">
                	</form></td>
                </tr>";
                }
                echo "<form action=insert_reservation.php method=post><tr>
                    <td><input name=RA_Name></td>
                    <td><input name=CWID size = 5></td>
                    <td></td>
                    <td><input type=submit value=Insert></td>
                </tr></form>";
            ?>
       </table>
        
    </body>
</html>