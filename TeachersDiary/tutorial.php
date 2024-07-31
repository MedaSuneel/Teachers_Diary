<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <div class="homehead">
                <a href="homepage.php"><img src="homebutton.png" width="45" height="45" class="homebutton"></a>
                <img src = "headerlogo.png" class="headerlogo">
            </div>
        </header>
        <div class="homehead">
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutorial</h1>
            <button class="viewattendance"><a href="tutorial1.php" style="text-decoration: none;">Insert</a></button>
        </div>

            <table style="width:90%;margin-left:auto;margin-right:auto;">
        
                <?php
				include "db.php";
				extract($_POST);
				$query = "select * from tutorial";
				$result = mysqli_query($con,$query)or die("select error");
				while($rec = mysqli_fetch_array($result))
				{
					echo ' <tr>
							  <td style="font-size:22;text-align:left;border:none;">'.$rec["questions"].'</td>
							</tr>';
				}
			?>
            </table>
    </body>
</html>