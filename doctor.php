<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
			$sql ="UPDATE doctor SET doctorname='$_POST[doctorname]',mobileno='$_POST[mobilenumber]',departmentid='$_POST[select3]',loginid='$_POST[loginid]',password='$_POST[password]',status='$_POST[select]',education='$_POST[education]',experience='$_POST[experience]',consultancy_charge='$_POST[consultancy_charge]' WHERE doctorid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('doctor record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
	$sql ="INSERT INTO doctor(doctorname,mobileno,departmentid,loginid,password,status,education,experience,consultancy_charge) values('$_POST[doctorname]','$_POST[mobilenumber]','$_POST[select3]','$_POST[loginid]','$_POST[password]','Active','$_POST[education]','$_POST[experience]','$_POST[consultancy_charge]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('Doctor record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM doctor WHERE doctorid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Add Doctor </li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>Doctor Details</h1>
    <form method="post" action="" name="frmdoct" onSubmit="return validateform()">
    <table border="3" style="color:black">
      <tbody>
        <tr>
          <td>Doctor Name</td>
          <td><input type="text" name="doctorname" id="doctorname" placeholder="Enter Doctor Name" value="<?php echo $rsedit[doctorname]; ?>" /></td>
        </tr>
        <tr>
          <td>Mobile Number</td>
          <td><input type="text" name="mobilenumber" id="mobilenumber" placeholder="Enter Mobile Number" value="<?php echo $rsedit[mobileno]; ?>"/></td>
        </tr>
        <tr>
          <td>Department</td>
          <td><select name="select3" id="select3">
          <option value="">Select</option>
            <?php
		  	$sqldepartment= "SELECT * FROM department WHERE status='Active'";
			$qsqldepartment = mysqli_query($con,$sqldepartment);
			while($rsdepartment=mysqli_fetch_array($qsqldepartment))
			{
				if($rsdepartment[departmentid] == $rsedit[departmentid])
				{
					echo "<option value='$rsdepartment[departmentid]' selected>$rsdepartment[departmentname]</option>";
				}
				else
				{
  					echo "<option value='$rsdepartment[departmentid]'>$rsdepartment[departmentname]</option>";
				}				
			}
		  ?>
          </select></td>
        </tr>
        <tr>
          <td>Login ID</td>
          <td><input type="text" name="loginid" id="loginid" placeholder="Enter Username" value="<?php echo $rsedit[loginid]; ?>"/></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" id="password" placeholder="Enter Password" value="<?php echo $rsedit[password]; ?>"/></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td><input type="password" name="cnfirmpassword" id="cnfirmpassword" placeholder="Enter Password Again" value="<?php echo $rsedit[password]; ?>"/></td>
        </tr>
        <tr>
          <td>Education</td>
          <td><input type="text" name="education" id="education" placeholder="Enter Higher Level Education" value="<?php echo $rsedit[education]; ?>" /></td>
        </tr>
        <tr>
          <td>Experience</td>
          <td><input type="text" name="experience" id="experience" placeholder="Enter Your Experience" value="<?php echo $rsedit[experience]; ?>"/></td>
        </tr>
        <tr>
          <td>Consultancy Charge</td>
          <td><input type="text" name="consultancy_charge" id="consultancy_charge" placeholder="Enter Consultancy Fee" value="<?php echo $rsedit[experience]; ?>"/></td>
        </tr>
        <tr>
          <td>Status</td>
          <td><select name="select" id="select">
            <option value="">Select</option>
            <?php
		  $arr= array("Active","Inactive");
		  foreach($arr as $val)
		  {
			  if($val == $rsedit[status])
			  {
			  echo "<option value='$val' selected>$val</option>";
			  }
			  else
			  {
			  echo "<option value='$val'>$val</option>";
			  }
		  }
		  ?>
          </select></td>
        </tr>
        <tr>
          <td colspan="2"><center><input type="submit" name="submit" id="submit" style="border-radius: 25px; font-size:16px; font-weight: bold;" value="Submit" /></center></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footers.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmdoct.doctorname.value == "")
	{
		alert("Doctor name should not be empty..");
		document.frmdoct.doctorname.focus();
		return false;
	}
	else if(!document.frmdoct.doctorname.value.match(alphaspaceExp))
	{
		alert("Doctor name not valid..");
		document.frmdoct.doctorname.focus();
		return false;
	}
	else if(document.frmdoct.mobilenumber.value == "")
	{
		alert("Mobile number should not be empty..");
		document.frmdoct.mobilenumber.focus();
		return false;
	}
	else if(!document.frmdoct.mobilenumber.value.match(numericExpression))
	{
		alert("Mobile number not valid..");
		document.frmdoct.mobilenumber.focus();
		return false;
	}
	else if(document.frmdoct.select3.value == "")
	{
		alert("Department ID should not be empty..");
		document.frmdoct.select3.focus();
		return false;
	}
	else if(document.frmdoct.loginid.value == "")
	{
		alert("loginid should not be empty..");
		document.frmdoct.loginid.focus();
		return false;
	}
	else if(!document.frmdoct.loginid.value.match(alphanumericExp))
	{
		alert("loginid not valid..");
		document.frmdoct.loginid.focus();
		return false;
	}
	else if(document.frmdoct.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmdoct.password.focus();
		return false;
	}
	else if(document.frmdoct.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmdoct.password.focus();
		return false;
	}
	else if(document.frmdoct.password.value != document.frmdoct.cnfirmpassword.value )
	{
		alert("Password and confirm password should be equal..");
		document.frmdoct.password.focus();
		return false;
	}
	else if(document.frmdoct.education.value == "")
	{
		alert("Education should not be empty..");
		document.frmdoct.education.focus();
		return false;
	}
	else if(!document.frmdoct.education.value.match(alphaExp))
	{
		alert("Education not valid..");
		document.frmdoct.education.focus();
		return false;
	}
	else if(document.frmdoct.experience.value == "")
	{
		alert("Experience should not be empty..");
		document.frmdoct.experience.focus();
		return false;
	}
	else if(!document.frmdoct.experience.value.match(numericExpression))
	{
		alert("Experience not valid..");
		document.frmdoct.experience.focus();
		return false;
	}
	else if(document.frmdoct.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmdoct.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>