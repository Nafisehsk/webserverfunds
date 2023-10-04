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
           

    </head>

    <body>
        <p><?= var_dump($_POST) ?></p>
        <p>Hello <?= htmlspecialchars($_POST ['fname']) . " " . htmlspecialchars($_POST ['lname'])?>!</p>
        <p>You are born on: <?=$_POST ['bd'] ?></p>
        <p>You have selected <?= $_POST ['response'] ?> for question 1.</p>
        <?php if ((in_array("answer1", $_POST)) && (in_array("answer2", $_POST))) ?> 
            <p>You have selected both options for question 2.</p>
        <?php  elseif (in_array("answer2", $_POST)) ?>
            <p>You have selected the second option for question 2.</p>
        <?php  elseif (in_array("answer1", $_POST)) ?>
            <p>You have selected the first option for question 2.</p>
        <?php  else ?>
            <p>You have not selected any options for question 2.</p>
        <?php  ?>
               
    </body>

</html>
