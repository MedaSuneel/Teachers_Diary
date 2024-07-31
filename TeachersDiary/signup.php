<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $gmail = $_POST['email'];
        $password = $_POST['pwd'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "insert into email values('$gmail','$password')";

            mysqli_query($con,$query);

            echo "<script type='text/javascript'> alert('Successfully Registered')</script>";

        }
        else
        {
            echo "<script type = 'text/jacascript'> alert('Please Enter required fields')</script>";
        }

    }

?>


<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form method="POST">
            <header>
                <img src = "headerlogo.png" class="headerlogo">
            </header>
            <div class="container">
                <div class="left">
                        <img src = "teacherlogo.jpeg" id = "teacherlogo"><br>
                </div> 
                <div class="right">
                    <label class="labels">Email</label><br><br>
                        <input type = "email" class="inputfields" name="email" required><br><br>
                    <label class="labels">Password</label><br><br>
                        <input type = "password" class="inputfields" name="pwd" required><br><br>
                    <button class="button" type="submit"> Register </button><br>
                    <pre class="anchormsg">Already have an Account <a href="signin.php" target="_self">Login</a></pre>
                </div>
            </div>
        </form>
    </body>
</html>