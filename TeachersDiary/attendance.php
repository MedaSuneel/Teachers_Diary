<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript">
            function getatt(value)
            {
                if(value == true)
                {
                    document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) - 1;
                    document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) + 1;
                }
                else
                {
                    document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) + 1;
                    document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) - 1;
                }
            }
        </script>
    </head>
    <body>
        <header>
            <div class="homehead">
                <a href="homepage.php"><img src="homebutton.png" width="45" height="45" class="homebutton"></a>
                <img src = "headerlogo.png" class="headerlogo">
            </div>
        </header>
        <div class="homehead">
            <h1>Attendance</h1>
            <button class="viewattendance"><a href="viewattendance.php" style="text-decoration: none;">view attendance</a></button>
        </div>
        
    <table>
        <tr>
            <td>
        <form action="attendance1.php" method="POST">
            <table style="width:20%;margin-left:0;margin-right:auto;"> 
                <tr>
                    <td style="border:none;"> Select Date : <br />
                    <?php 
                        $dt=getdate();
                        $day = $dt["mday"];
                        $month = date("m");
                        $year = $dt["year"];

                        echo "<select name = 'cdate'>";
                        for($a=1;$a<=31;$a++)
                        {
                            if($day == $a)
                                echo "<option value='$a' selected = 'selected'>$a</option>";
                            else
                                echo "<option value='$a'>$a</option>";
                        }
                        echo "</select><select name = 'cmonth'>";
                        for($a=1;$a<=12;$a++)
                        {
                            if($month == $a)
                                echo "<option value='$a' selected='selected'>$a</option>";
                            else
                                echo "<option value='$a'>$a</option>";
                        }
                        echo "</select><select name='cyear'>";
                        for($a=2024;$a<=$year;$a++)
                        {
                            if($year == $a)
                                echo "<option value = '$a' selected='selected'>$a</option>";
                            else
                                echo "<option value = '$a'>$a</option>";
                        }
                        echo "</select>"
                    ?>
                    </td>
                </tr>
            </table>

            <table style="width:50%;margin-left:auto;margin-right:auto">
                <tr>
                    <td width="100" style="background-color:yellow;font-size:22;">Roll No</td>
                    <td width="100" style="background-color:yellow;font-size:22;">Name</td>
                    <td width="50" style="background-color:yellow;font-size:22;">Attend</td>
                </tr>
                <?php
				include "db.php";
				extract($_POST);
				$query = "select *from member order by member_id";
				$s = 0;
				$result = mysqli_query($con,$query)or die("select error");
				while($rec = mysqli_fetch_array($result))
				{
					$s = $s + 1;
					echo ' <tr>
							  <td width="100">'.$rec["member_id"].'</td>
							  <td width="100">'.$rec["name"].'</td>
							  <td width="50"><input type=checkbox name='.$rec["member_id"].' onclick="getatt(this.checked);"/></td>
							</tr>';
				}
			?>
            </table>
            <button type="submit" class="saveattendance" name="btnsubmit">save attendance</button>
        </form>
        
            <table style="width:25%;margin-left:auto;margin-right:0;">
                <tr>
                    <td style="border:none;">Total Absent: <input type="text" id="txtAbsent" value="<?php print $s;?>" size="10" disabled="disabled"/></td>
                </tr>
                <tr>
                	<td style="border:none;"> Total Present : <input type="text" id="txtPresent" value="0" size="10" disabled="disabled" /></td>
                </tr>
                <tr>
                	<td style="border:none;"> Total Strength : <input type="text" id="txtStrength" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                </tr>
             </table>
                </td>
                </tr>
                </table>
                
    </body>

</html>