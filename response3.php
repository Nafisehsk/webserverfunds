<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
            background-color: rgb(19, 56, 68);
            color: rgb(228, 240, 236);
            font-family: Arial, Helvetica, sans-serif;
            }

            text {
            font-size: 9px;
            }
            

            h1 {
            color: white;
            text-align: left;
            }

            h5 {
            color: red;
            text-align: left;
            }
            
            p {
            color: rgb(143, 202, 219);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            }
        
        </style>

        <?php
            $server = "localhost";
            $username = "nafas";
            $password = "nafispi23";
            $database = "Course_Schedule";
            $conn = mysqli_connect($server, $username, $password, $database);
            $course_number = htmlspecialchars($_POST["cnum"]);
            $semester = htmlspecialchars($_POST["sem"]);
           
            $sql = "select * from courses where course_number='{$course_number}';";
            $result = mysqli_query($conn, $sql);
            $sql2 = "insert into courses (semester) values ('{$semester}');";
            $result1 = mysqli_query($conn, $sql2);

          ?>

    </head>

    <body>
        <p>You selected course <?= $course_number?></p>
        <p><?= $sql ?></p>
        <p><?= mysqli_error($conn) ?></p>

        <?php 
            foreach($result as $row) // There should only be one row returned!
            {
                echo "{$row['course_name']} on {$row['day']}s from {$row['time']}";
            }
            // Don't forget to close the connection!
            mysqli_close($conn);
        ?>
               
    </body>

</html>
