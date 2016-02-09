<!DOCTYPE html>
<?php
	include("connection.php");
	session_start();
	ob_start();
	
	if (isset($_SESSION['id']))
	{
		 
		$sess_id=$_SESSION["id"];
		
		$student_result = mysql_query("select * from student,course,relative where student.student_id=$sess_id and student.course_id=course.course_id and relative.student_id=$sess_id");
		$student_row = mysql_fetch_assoc($student_result); 	
	}
?>
<html>
<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
<head>
<title>MMU Accommodation Managament System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- css for awesome font -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<meta name="viewport" content = "width-device-width, initial-scale=1.0">
    <!-- Custom styles for this template -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	 <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
	 <script src="jquery.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->

<style>


</style>

</head>

 
		<body>
  
						<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">MMU Accommodation Managament System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float:right;margin-right:10px;">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="rent.php">View Available Room</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#" style="color:skyblue;"><?php echo $student_row["student_name"] ?></a>
                    </li>
					<li>
                        <a href="logout.php">Logout</a>
                    </li>
					
                </ul>
				
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
  
			<div class="container">
			  <div class="jumbotron" style="height:180px; margin-top:70px;">
				<img src="img/mmulogo.png" alt="MMU" style="width: 300px;height:100px;">
				<table style="float:right;">
				<tr><td><h3 style="float:right;">MMU Accommodation Managament System</h3></td></tr>
				<tr><td><h4 style="float:right;font-style:italic;" class="text-primary"><u>Safe and Comfortable Environment</u></h4></td></tr>
				</table>
			  </div>
			  <div class="row">
				<div class="col-sm-4">
				  
				 <h3 style="color:skyblue;font-weight:bold;text-align:center;">Rent a Room</h3>
				
				<table class="table table-bordered" style="text-align:center;margin-top:30px;">
					<tr><td colspan="2" style="color:skyblue;"><?php echo $student_row["student_name"]; ?>
						<button type="button" title="Update next-of-kin profile" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="float:right;"><i class="glyphicon glyphicon-edit glyphicon-lg"></i></button>
						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
<div class="modal-content" style="color:black;font-family:serif;font-size:12pt;">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Update Profile</h4>
							  </div>
							  <div class="modal-body">
							  <form method="POST">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td><b>Contact Number: </b></td>
											<td> <input type="text" name="newstudent_hp" maxlength="11">
											</td>
										</tr>
										<tr>
											<td><b>Address:</b> </td>
											<td> <input type="text" name="newstudent_address" maxlength="50"></td>
											
										</tr>   
										
									</tbody>
								  </table>
								
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" value="Save and Exit" name="edit_student">
							  </div>
							</div>
							</form>
						  </div>
						</div></td>
						<?php
							if(isset($_POST['edit_student']))
							{
								$news_hp = $_POST['newstudent_hp'];
								$news_add = $_POST['newstudent_address'];
								
								if(empty($news_hp) && empty($news_add))
								{ ?>
									<script>alert("No information has been saved!");</script>	
								<?php
								}
								else if(empty($news_add))
								{
									if(is_numeric($news_hp) == true)
									{
										mysql_query("update student set student_hp='$news_hp' where student_id='$sess_id'");
									}
									else
									{ ?>
										<script>alert("Contact number must be numeric!");</script>
									<?php			
									}	
									
								}
								else if(empty($news_hp))
								{
									mysql_query("update student set student_address='$news_add' where student_id='$sess_id'");
								}
								else
								{ 
									if(is_numeric($news_hp) == true)
									{
										mysql_query("update student set student_hp='$news_hp',student_address='$news_add' where student_id='$sess_id'");
									}
									else
									{ ?>
										<script>alert("Contact number must be numeric!");</script>
									<?php			
									}	
								}
							}
						?>
					</tr>
					<tr><td>Matric Number</td><td><?php echo $student_row["student_id"]; ?></td></tr>
					<tr><td>Contact Number</td><td><?php echo $student_row["student_hp"]; ?></td></tr>
					<tr><td>Academic Status</td><td><?php echo $student_row["student_category"]; ?></td></tr>
					<tr><td>Address</td><td><?php echo $student_row["student_address"]; ?></td></tr>
					<tr><td>Date of Birth</td><td><?php echo $student_row["student_dob"]; ?></td></tr>
					<tr><td>Course</td><td><?php echo $student_row["course_title"] ?></td></tr>
					<tr><td>Rent Status</td><td><?php echo $student_row["student_status"]; ?></td></tr>
					<tr><td colspan="2" style="font-weight:bold;">Next-of-Kin</td></tr>
					<tr><td colspan="2" style="color:skyblue;"><?php echo $student_row["relative_name"]; ?>
						<button type="button" title="Update next-of-kin profile" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="float:right;"><i class="glyphicon glyphicon-edit glyphicon-lg"></i></button>
						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Update Profile</h4>
							  </div>
							  <div class="modal-body">
							   <form method="POST">
								<table class="table table-hover" >
									<tbody>
										<tr>
											<td><b>Contact Number: </b></td>
											<td> <input type="text" name="newrelative_hp" maxlength="11">
											</td>
										</tr>
										<tr>
											<td><b>Address:</b> </td>
											<td> <input type="text" name="newrelative_address" maxlength="50"></td>
											
										</tr>   
										
									</tbody>
								  </table>    
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" value="Save and Exit" name="edit_relative">
							  </div>
							</div>
						  </div>
						  </form>
						</div></td>
						
						<?php
							if(isset($_POST['edit_relative']))
							{
								$newr_hp = $_POST['newrelative_hp'];
								$newr_add = $_POST['newrelative_address'];
								
								if(empty($newr_hp) && empty($newr_add))
								{ ?>
									<script>alert("No information has been saved!");</script>	
								<?php
								}
								else if(empty($newr_add))
								{
									if(is_numeric($newr_hp) == true)
									{
										mysql_query("update relative set relative_hp='$newr_hp' where student_id='$sess_id'");
									}
									else
									{ ?>
										<script>alert("Contact number must be numeric!");</script>
									<?php			
									}	
									
								}
								else if(empty($newr_hp))
								{
									mysql_query("update relative set relative_address='$newr_add' where student_id='$sess_id'");
								}
								else
								{ 
									if(is_numeric($newr_hp) == true)
									{
										mysql_query("update relative set relative_hp='$newr_hp',relative_address='$newr_add' where student_id='$sess_id'");
									}
									else
									{ ?>
										<script>alert("Contact number must be numeric!");</script>
									<?php			
									}	
								}
							}
						?>
						
					</tr>
					<tr><td>Relationship</td><td><?php echo $student_row["relative_relation"]; ?></td></tr>
					<tr><td>Contact Number</td><td><?php echo $student_row["relative_hp"]; ?></td></tr>
					<tr><td>Address</td><td><?php echo $student_row["relative_address"]; ?></td></tr>
					
				</table>
				</div>
				
				<?php
					if(isset($_SESSION['rid']))
					{
						$roomid=$_SESSION['rid'];
						$room_result = mysql_query("select * from room where place_id='$roomid'");
						$room_row = mysql_fetch_assoc($room_result);
					}
				?>
				
				<div class="col-sm-4">
				<h3>Please select the date</h3>
				<form method="POST">
				<table style="width:700px;">
				<tr>
				<td><div class="panel panel-info" style="padding:5px;margin:5px;height:330px;">
						<div class="panel-heading">
						<?php 
							if(isset($_POST['btn_book']))
							{
								$datestart = $_POST['date_start'];
								$dateend = $_POST['date_end'];
								$studentid = $student_row["student_id"];
								
								if($datestart >= $dateend)
								{
						?>		<script>alert("Invalid date!");</script>
						<?php
								}
								else
								{
									if($datestart == 1)
										$semstart = "15/16 Semester 1";
									else if($datestart == 2)
										$semstart = "15/16 Semester 2";
									else if($datestart == 3)
										$semstart = "15/16 Semester 3";
									else if($datestart == 4)
										$semstart = "16/17 Semester 1";
									else if($datestart == 5)
										$semstart = "16/17 Semester 2";
									else if($datestart == 6)
										$semstart = "16/17 Semester 3";
									
									if($dateend == 1)
										$semend = "15/16 Semester 1";
									else if($dateend == 2)
										$semend = "15/16 Semester 2";
									else if($dateend == 3)
										$semend = "15/16 Semester 3";
									else if($dateend == 4)
										$semend = "16/17 Semester 1";
									else if($dateend == 5)
										$semend = "16/17 Semester 2";
									else if($dateend == 6)
										$semend = "16/17 Semester 3";
								
									mysql_query("insert into waiting (place_id,student_id,wait_start,wait_end) values ('$roomid','$studentid','$semstart','$semend')");
									mysql_query("update student set student_status='pending' where student_id='$sess_id'");
									mysql_query("update room set room_status='pending' where place_id='$roomid'");
									?>
										<script>
											alert("Wait for admin to approve your statement.");
											window.location.href = "index.php";
										</script>
									<?php
								}
							}
					?>
							Room detail
						</div>
					  <div class="panel-body">
					  <table>
					  <tr>
						<td>
								<?php 
									$hallid = $room_row['hall_id'];
									$hall_result = mysql_query("select * from hall where hall_id='$hallid'");
									$hall_row = mysql_fetch_assoc($hall_result);
								?>
								Hall: <?php echo $hall_row["hall_name"]; ?><br/>
								Address: <?php echo $hall_row["hall_address"]; ?><br/>
								Manager: <?php echo $hall_row["hall_manager"]; ?><br/>
								Contact Number: <?php echo $hall_row["hall_hp"]; ?><br/><br/>
								Room number: <?php echo $room_row["room_num"]; ?><br/>
								Rental: RM <?php echo $room_row["room_rent"]; ?><br/>
								Start: 	<select name="date_start">
											<option value="1">15/16 Semester 1</option>
											<option value="2">15/16 Semester 2</option>
											<option value="3">15/16 Semester 3</option>
											<option value="4">16/17 Semester 1</option>
											<option value="5">16/17 Semester 2</option>
											<option value="6">16/17 Semester 3</option>
										</select><br/>
								End:	<select name="date_end">
											<option value="1">15/16 Semester 1</option>
											<option value="2">15/16 Semester 2</option>
											<option value="3">15/16 Semester 3</option>
											<option value="4">16/17 Semester 1</option>
											<option value="5">16/17 Semester 2</option>
											<option value="6">16/17 Semester 3</option>
										</select><br/><br/>
						</td>
						</tr>
						</table>
						<input class="btn btn-lg btn-warning btn-block" type="submit" name="btn_book" value="Book">
					  </div>
					</div>
				</div>
			  </div>
				</td>
				</tr>
				</table>
				</form>
				</div>
			  </div>
			  <footer>
            <div class="row">
                <div class="col-lg-12" style="text-align:center;color:grey;">
                    <p>Copyright University Accommodation Management System</p>
                </div>
            </div>
        </footer>
			</div>
			</form>
			

        </body>
           
</html>