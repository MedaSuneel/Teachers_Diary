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
</body>
<table width="800" border="1" align="center">
     
      <tr>
        <td><div align="center">
        <form action="" method="post">
          <table width="606" border="2" align="center" bordercolor="#9966FF">
          	<tr><td colspan="3"><h2>Edit the Records Roll No Wise Here</h2></td></tr>
            <tr>
              <td width="308" height="50" bgcolor="#FFFF00"><div align="center"><strong><span class="style2">Enter the Roll no</span></strong></div></td>
              <td width="308" height="50" bgcolor="#FFFF00"><span class="style6" class="rnofield"><input type="text" name="eno" /></span></td>
            </tr>
            <tr>
              <td width="308" height="50" bgcolor="#FFFF00"><div align="center"><strong><span class="style2">Enter the CGPA</span></strong></div></td>
              <td width="308" height="50" bgcolor="#FFFF00"><span class="style6" class="rnofield"><input type="text" name="gpa" /></span></td>
            </tr>
            <tr>
              <td width="130" colspan="3" height="50 bgcolor="#FFFF00"><input type="submit" class="editbtn" value="Save" name="btnsubmit"/></td>
            </tr>
          </table>
          </form>
        </div></td>
      </tr>
		<?php
		if(isset($_POST["btnsubmit"]))
		{
			include "db.php";
			extract($_POST);
			$query = " update member set gpa = '".$gpa."' where member_id = '".$eno."' limit 1";

			$result = mysqli_query($con,$query)or die("select error error");
            print "<script>";
			print "alert('Edit successfull....');";
			print "self.location='academics.php';";
			print "</script>";
		}
        ?>
</table>