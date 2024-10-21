<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Hospital Management</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/style.css" rel="stylesheet">
	 <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	 <link href="https://fonts.googleapis.com/css?family=Markazi+Text" rel="stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
  </head>

<?php
session_start();
include("dbconnection.php");
?>

<div class="wrapper col2">
  <div id="breadcrumb">
  <ul>
      <li class="first">Doctor Report</li></ul>
     </div>
</div>
<div class="wrapper col4">
  <div id="container">
  <section class="container">
	<table class="order-table" style="color:black">
      <thead>
        <tr>
          <th><div>Doctor Name</div></th>
          <th><div>Mobile Number</div></th>
          <th><div>Department</div></th>
          <th><div>Login ID</div></th>
          <th><div>Consultancy Charge</div></th>
          <th><div>Education</div></th>
          <th><div>Experience</div></th>
          <th><div>Status</div></th>
        </tr>
        </thead>
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print Report</button>
        <div class="container">
        <p></p>
        </div><br>
        <tbody>
    <?php
		$sql ="SELECT * FROM doctor";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
			$qsqldept = mysqli_query($con,$sqldept);
			$rsdept = mysqli_fetch_array($qsqldept);
        echo "<tr>
        <td>&nbsp;$rs[doctorname]</td>
        <td>&nbsp;$rs[mobileno]</td>
		    <td>&nbsp;$rsdept[departmentname]</td>
			  <td>&nbsp;$rs[loginid]</td>
		  	<td>&nbsp;$rs[consultancy_charge]</td>
			  <td>&nbsp;$rs[education]</td>
		  	<td>&nbsp;$rs[experience]</td>
        <td>$rs[status]</td>
        </tr>";
		}
		?>      
    </tbody>
    </table>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
