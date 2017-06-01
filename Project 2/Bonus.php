<html>
    <head>
        <h1> Bonus!</h1>
        <h2> Project 2 Functions!</h2>
        <body>
           <p>    
        
<h3> <b> Index File </b></h3>
The initial page is the index file, which is the user interface. It displays textboxes where the user can input general information 
such his/her name, gender, class level, residence areas through a drop-down of choices, and check off special preferences, all 
formatted using HTML. In project2, the line: &nbsp; <i>require ‘sql.php’;</i> &nbsp; was added before the HTML code starts. 
This line takes all the code that exists in the specified file and copies it into the file that uses the require statement, which 
is this index file; in other words, the require statement makes it possible to include a PHP file within another PHP file. This 
bit of code is necessary because the sql.php file creates the MySQL connection, establishing the local host, username and password 
in which gives access to the database that the index file references to. In this way, the initial page will retrieve available 
reservation slots from the database for each residence area and embed into the residence area options database as a number. 

<br> </br>
<h3> <b> Verify File </b></h3>
The second page is the verify file, which takes, processes, and displays the user input from the first page. If the user has 
selected a residence area that matches with the submitted user information and special preferences, the function positive() is 
called and the page will display with a message that reads: "Your residence hall choice matches your specifications. 
Please Continue,” and the user continues to the third page, the results file. If the user has a selected a residence area that 
does not match the class level the user has submitted, or does not include the special preferences the user has picked, then the 
function negative() is called, and the page displays a message that reads: "Your residence hall choice doesn't match your 
specifications. Go back and fill out the form again,” and the user is brought back to the first page, the index file. However, 
if a user has not made any selection, the file filters and displays a drop-down of the relevant residence area based on their 
class level and special preferences. 

<br> </br>
<h3> <b> Results File </b></h3>
The third and last page is the results file, which takes the user selection or confirmation from the second page and creates 
a reservation record in the database with all relevant information, by using the <i> INSERT INTO Students VALUES</i> MYSQOL command. 
It then reduces the number of available slots by one, and confirm the reservation with a unique confirmation number, by using the
<i> "UPDATE ResidenceArea SET Available_Slots = Available_Slots - 1 WHERE Name = \"$residenceHall\""; </i> This again is possible 
by referencing the sql.php containing the database connection information accessing the database. The user’s general 
information input is retrieved by using <i> $_POST </i> for each variable created, and then is displayed by echoing the 
<i> $_POST </i> variables. The special preferences are displayed by Yes’s and No’s using if/else statements.  

<br> </br>
<h3> <b> Sql File </b></h3>
The sql.file creates the MySQL connection implementing this bit of code <i> $conn = mysqli_connect($servername, $username, 
$password); </i>. This establishes the local host, username and password in which gives access to the database that the index 
and verify file reference to. It also checks if the connection was established. The Project2 file is the backup database incase 
the MySQL connection fails. The backup recreates the tables if they do not exist and lists <i> NOT NULL </i> after each field
contained in the table. However, if there is an error with the connection and the backup does not work, the die statement kills 
the connection. 
           
        </p>    
        </body>
    </head>
</html>