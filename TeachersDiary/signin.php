<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $gmail = $_POST['email'];
        $password = $_POST['pwd'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $query = "Select * from email where email = '$gmail' limit 1";
            $result = mysqli_query($con,$query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] == $password)
                    {
                        header("location: homepage.php");
                        die;
                    }

                }
            }
            echo "<script type = 'text/javascript'> alert('Invalid Email or Password')</script>";
        }
        else{
            echo "<script type = 'text/javascript'> alert('Invalid Email or Password')</script>";
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
                    <button class="button" type="submit"> Login </button><br>
                    <pre class="anchormsg">Don't have an Account <a href="signup.php" target="_self">signup</a></pre>
                </div>
            </div>
        </form>
    </body>
</html>