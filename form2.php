<!DOCTYPE html>
<html>
  <head>
    <title>Forms</title>
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
    <script>
      function req(elem, x) {
        y = document.getElementById(x)
        if (elem.value === "") {
          y.removeAttribute("hidden"); }
        else 
          y.setAttribute("hidden", "true");
      }

    </script>

    <?php
        $server = "localhost";
        $username = "nafas";
        $password = "nafispi23";
        $database = "Course_Schedule";
        $conn = mysqli_connect($server, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: {mysqli_connect_error()}");
        }
        $sql = "select * from courses;";
        $result = mysqli_query($conn, $sql);
    ?>

  </head>
  
  <body>
    <h1>HTML Forms</h1>
    
    <form name="questions" action="response3.php" method="POST">
      <h2><p>Select a Course Number to obtain information about it.</p></h2>
      
      <fieldset>
          <legend></legend><br>

          <label for="semester">Enter Semeter:</label><br>
            <input type="text" id="sem" name="sem" placeholder = 'F23' onblur="req(this, '1')" required>
            <span id="2" hidden style="color:red">This field is required</span><br><br>

        
          <label for="coursenum">Select course: </label><br>
          <select id="cnum" name="cnum">
            <!-- <option value="WL">243-522-DW</option>
            <option value="TS">234-567-DW</option>
            <option value="ET">243-523-DW</option>
            <option value="CB">234-568-DW</option>
            <option value="ESH">243-513-DW</option> -->
          
            <span id="1" hidden style="color:red">This field is required</span><br><br>

            <?php
                    
                    // Use the ternary operator
                    echo $result ? "Success!" : "Failure: {mysqli_error($conn)}";

                    foreach($result as $row) 
                    {
                        echo "<option value='{$row['course_number']}'>{$row['course_number']}</option>\n";
                    }
                    // Don't forget to close the connection!
                    mysqli_close($conn);
            ?>
            
        </select>
      </fieldset><br>
      
     

        <input type="submit" value="Submit">
    </form> 
      

  </body>

</html>