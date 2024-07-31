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
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academics</h1>
            <button class="viewattendance"><a href="academics1.php" style="text-decoration: none;">Edit</a></button>
        </div>

            <table style="width:90%;margin-left:auto;margin-right:auto">
                <tr>
                    <td width="100" style="background-color:yellow;font-size:24;">Roll No</td>
                    <td width="100" style="background-color:yellow;font-size:24;">Name</td>
                    <td width="50" style="background-color:yellow;font-size:24;">CGPA</td>
                </tr>
                <?php
				include "db.php";
				extract($_POST);
				$query = "select *from member order by member_id";
				$result = mysqli_query($con,$query)or die("select error");
				while($rec = mysqli_fetch_array($result))
				{
					echo ' <tr>
							  <td width="100">'.$rec["member_id"].'</td>
							  <td width="100">'.$rec["name"].'</td>
							  <td width="50">'.$rec["gpa"].'</td>
							</tr>';
				}
			?>
            </table>
    </body>
</html>