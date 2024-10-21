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
      <li class="first">Appointment Report</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <section class="container">  
    <table class="order-table" style="color:black">
      <thead>
        <tr>
          <th><div>Patient Detail</div></th>
          <th><div>Appointment Date &  Time</div></th>
          <th><div>Department</div></th>
          <th><div>Doctor</div></th>
          <th><div>Appointment Reason</div></th>
          <th><div>Status</div></th>
        </tr>
        </thead>
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print Report</button>
		    <div class="container">
		    <p></p>
		    </div><br>
        <tbody>
          
    <?php
		$sql ="SELECT * FROM appointment WHERE (status='Approved' OR status='Active')";

		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqlpat = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
			$qsqlpat = mysqli_query($con,$sqlpat);
			$rspat = mysqli_fetch_array($qsqlpat);
			
			$sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
			$qsqldept = mysqli_query($con,$sqldept);
			$rsdept = mysqli_fetch_array($qsqldept);
			
			$sqldoc= "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
			$qsqldoc = mysqli_query($con,$sqldoc);
			$rsdoc = mysqli_fetch_array($qsqldoc);
        echo "<tr>         
        <td>&nbsp;$rspat[patientname]<br>&nbsp;$rspat[mobileno]</td>		 
			  <td>&nbsp;$rs[appointmentdate]&nbsp;$rs[appointmenttime]</td> 
		    <td>&nbsp;$rsdept[departmentname]</td>
			  <td>&nbsp;$rsdoc[doctorname]</td>
			  <td>&nbsp;$rs[app_reason]</td>
			  <td>&nbsp;$rs[status]</td>
        </tr>";
		}
		?>
      </tbody>
    </table>
    </section>
  </div>
</div>
