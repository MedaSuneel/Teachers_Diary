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

<style type="text/css">
<!--
.style1 {
	font-family: "Courier New", Courier, monospace;
	font-size: 60px;
	color: #FFFFFF;
	font-style: italic;
}
.style2 {
	font-size: 24px;
	color: #0000FF;
}
.style6 {font-size: 16px}
-->
</style>
<table width="800" border="1" align="center">
     
      <tr>
        <td><div align="center">
        <form action="" method="post">
          <table width="606" border="2" align="center" bordercolor="#9966FF">
          	<tr><td colspan="3"><h2>Search Roll No Wise Records Here</h2></td></tr>
            <tr>
              <td width="308" bgcolor="#FFFF00"><div align="center"><strong><span class="style2">Enter the Roll no</span></strong></div></td>
              <td width="144" bgcolor="#FFFF00"><span class="style6" class="rnofield">
                <input type="text" name="eno" />
              </span></td>
              <td width="130" bgcolor="#FFFF00"><input type="submit" class="viewbtn" value="View Information" name="btnsubmit"/></td>
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
			$query = "select * from member where member_id = '".$eno."' limit 1";

			$result = mysqli_query($con,$query)or die("select error error");
            
			while($rec = mysqli_fetch_array($result))
			{
                echo '<tr><td colspan="2"><table width="400" border="2" align="center" bordercolor="#9966FF" bgcolor="#C7B6B1">
				<tr>
				  <td width="160" bgcolor="#FFFF00"><span class="style2">Roll No</span></td>
				  <td width="160" bgcolor="#FFFF00"><span class="style2">Name</span></td>';
				  $query1 = "select * from attendance where member_id = '".$rec["member_id"]."' order by date";
					$result1 = mysqli_query($con,$query1)or die("select error error");
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td bgcolor="#FFFF00" class=style2>'.$rec1["date"].'</td>';
					}
				echo '</tr>
				<tr>
				  <td width="222"><span class="style6">'.$rec["member_id"].'</span></td>
				  <td width="222"><span class="style6">'.$rec["name"].'</span></td>';
				  $query1 = "select *from attendance where member_id = '".$rec["member_id"]."' order by date";
					$result1 = mysqli_query($con,$query1)or die("select error error");
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td>';
						if($rec1["attend"]==0)
							echo "Absent";
						else
							echo "Present";
						echo '</td>';
					}
				
				echo '
				</tr>
								
			  </table></td></tr>';
			}
		}
		else
		{
			include "db.php";
			extract($_POST);
			$query = "select * from member ";

			$result = mysqli_query($con,$query)or die("select error error");
            
			while($rec = mysqli_fetch_array($result))
			{
                echo '<tr><td colspan="2"><table width="90%" border="2" align="center" bordercolor="#9966FF" bgcolor="#FFFF00">
				<tr>
				  <td width="160" bgcolor="#90EE90" color="white"><span class="style2">Roll No</span></td>
				  <td width="160" bgcolor="#90EE90"><span class="style2">Name</span></td>';
				  $query1 = "select * from attendance where member_id = '" .$rec["member_id"]. "' order by date";
					$result1 = mysqli_query($con,$query1)or die("select error error");
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td bgcolor="#90EE90" class=style2>'.$rec1["date"].'</td>';
					}
				echo '</tr>
				<tr>
				  <td width="222"><span class="style6">'.$rec["member_id"].'</span></td>
				  <td width="222"><span class="style6">'.$rec["name"].'</span></td>';
				  $query1 = "select *from attendance where member_id = '" .$rec["member_id"]. "' order by date";
					$result1 = mysqli_query($con,$query1)or die("select error error");
					while($rec1 = mysqli_fetch_array($result1))
					{
				  		echo '<td>';
						if($rec1["attend"]==0)
							echo "Absent";
						else
							echo "Present";
						echo '</td>';
					}
				
				echo '
				</tr>
								
			  </table></td></tr>';
			}
		}
		?>
	</table>