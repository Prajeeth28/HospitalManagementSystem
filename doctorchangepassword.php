<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	$sql = "UPDATE doctor SET password='$_POST[newpassword]' WHERE password='$_POST[oldpassword]' AND doctorid='$_SESSION[doctorid]'";
	$qsql= mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Password has been updated successfully..');</script>";
	}
	else
	{
		echo "<script>alert('Failed to update password..');</script>";		
	}
}
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Change Password</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
   <form method="post" action="" name="frmdoctchangepass" onSubmit="return validateform()">
    <table border="3" style="color:black";>
      <tbody>
        <tr>
          <td>Old Password</td>
          <td><input type="password" name="oldpassword" id="oldpassword" /></td>
        </tr>
        <tr>
          <td>New Password</td>
          <td><input type="password" name="newpassword" id="newpassword" /></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td><input type="password" name="password" id="password" /></td>
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
</div><br><br><br><br><br><br><br><br>
<?php
include("footers.php");
?>
<script type="application/javascript">
function validateform1()
{
	if(document.frmdoctchangepass.oldpassword.value == "")
	{
		alert("Old password should not be empty..");
		document.frmdoctchangepass.oldpassword.focus();
		return false;
	}
	else if(document.frmdoctchangepass.newpassword.value == "")
	{
		alert("New Password should not be empty..");
		document.frmdoctchangepass.newpassword.focus();
		return false;
	}
	else if(document.frmdoctchangepass.newpassword.value.length < 8)
	{
		alert("New Password length should be more than 8 characters...");
		document.frmdoctchangepass.newpassword.focus();
		return false;
	}
	else if(document.frmdoctchangepass.newpassword.value != document.frmdoctchangepass.password.value )
	{
		alert(" New Password and confirm password should be equal..");
		document.frmdoctchangepass.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
