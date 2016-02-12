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
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	 


  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
	
<style>
.breadcrumb {
  padding: 8px 0px;
  margin-bottom: 20px;
  margin-left:15px;
  margin-right:15px;
  list-style: none;
  background-color: transparent;

}

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
                    <li class="active">
                        <a href="about.php"><strong>About</strong></a>
                    </li>
                    <li>
                        <a href="#" style="color:skyblue;cursor:context-menu;"><?php echo $student_row["student_name"] ?></a>
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
			  <div class="jumbotron" style="height:180px; margin-top:70px;margin-right:20px;">
				<img src="img/mmulogo.png" alt="MMU" style="width: 300px;height:100px;">
				<table style="float:right;">
				<tr><td><h3 style="float:right;">MMU Accommodation Managament System</h3></td></tr>
				<tr><td><h4 style="float:right;font-style:italic;" class="text-primary"><u>Safe and Comfortable Environment</u></h4></td></tr>
				</table>
			  </div>
			  <div class="row">
			  <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php">Home</a>
                            </li>
                            <li class="active">
                                <i></i> About
                            </li>
                        </ol>
				<div class="col-sm-4">
				  
				 
				
				<table class="table table-bordered" style="text-align:center;margin-top:30px;">
					<tr><td colspan="2" style="background-color:#337ab7;color:white;font-size:15pt;font-family:serif;"><?php echo $student_row["student_name"]; ?>
						<button type="button" title="Update student profile" class="btn btn-default btn-primary" data-toggle="modal" data-target="#studentModal" style="float:right;"><i class="glyphicon glyphicon-edit glyphicon-lg" style="color:white;"></i>
                            </button>
						<!-- Modal -->
						<div id="studentModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content" style="color:black;font-family:serif;font-size:12pt;">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Update Profile</h4>
							  </div>
							  <div class="modal-body">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td><b>Contact Number: </b></td>
											<td> <input type="text" name="relative_hp">
											</td>
										</tr>
										<tr>
											<td><b>Address:</b> </td>
											<td> <input type="text" name="relative_address"></td>
											
										</tr>   
										
									</tbody>
								  </table>    
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal">Save and Exit</button>
							  </div>
							</div>

						  </div>
						</div></td>
						<?php
							if(isset($_POST['edit_student']))
							{
								$news_hp = $_POST['newstudent_hp'];
								$news_add = $_POST['newstudent_address'];
								
								if(empty($news_hp) && empty($news_add))
								{ ?>
									&nbsp;
									<div class="alert alert-warning">
												<i class="fa fa-exclamation-triangle"></i> No information has been saved!
											</div>
								<?php
									
								}
								else if(empty($news_add))
								{
									if(is_numeric($news_hp) == true)
									{
										mysql_query("update student set student_hp='$news_hp' where student_id='$sess_id'");
										header("Refresh:3");
										?>
										&nbsp;
										<div class="alert alert-success">
												<i class="fa fa-check-circle"></i> Information has been saved!
											</div>
											
											<?php
											
									}
									else
									{ ?>
										&nbsp;
										<div class="alert alert-warning">
												<i class="fa fa-exclamation-triangle"></i> Contact number must be numeric!
											</div>
										
									<?php			
									}	
									
								}
								else if(empty($news_hp))
								{
									mysql_query("update student set student_address='$news_add' where student_id='$sess_id'");
									header("Refresh:3");
									?>
										&nbsp;
										<div class="alert alert-success">
												<i class="fa fa-check-circle"></i> Information has been saved!
											</div>
											<?php
								}
									
								else
								{ 
									if(is_numeric($news_hp) == true)
									{
										mysql_query("update student set student_hp='$news_hp',student_address='$news_add' where student_id='$sess_id'");
										header("Refresh:3");
										?>
										&nbsp;
										<div class="alert alert-success">
												<i class="fa fa-check-circle"></i> Information has been saved!
											</div>
											<?php
									}
										
									else
									{ ?>
										&nbsp;
										<div class="alert alert-warning">
												<i class="fa fa-exclamation-triangle"></i> Contact number must be numeric!
											</div>
										
									<?php			
									}	
								}
							}
						?>
					</tr>
					<tr><td>Matric Number</td><td><?php echo $student_row["student_id"]; ?></td></tr>
					<tr><td>Academic Status</td><td><?php echo $student_row["student_category"]; ?></td></tr>
					<tr><td>Address</td><td><?php echo $student_row["student_address"]; ?></td></tr>
					<tr><td>Date of Birth</td><td><?php echo $student_row["student_dob"]; ?></td></tr>
					<tr><td>Course</td><td><?php echo $student_row["course_title"] ?></td></tr>
					<tr><td>Rent Status</td><td><?php  $sst=$student_row["student_status"]; 
																		if ($sst=="Pending") 
																		{echo "<span style=\"color:orange;font-weight:bold;\">$sst</span>"; }
																		else if ($sst=="Rented")
																		{echo "<span style=\"color:#25a900;font-weight:bold;\">$sst</span>"; }
																		else
																		{echo "<span style=\"font-weight:bold;\">None</span>"; }
											?></td>
					<tr><td colspan="2" style="font-weight:bold;">Next-of-Kin</td></tr>
					<tr><td colspan="2" style="background-color:#337ab7;color:white;font-size:15pt;font-family:serif;"><?php echo $student_row["relative_name"]; ?>
						<button type="button" title="Update next-of-kin profile" class="btn btn-default btn-primary" data-toggle="modal" data-target="#relativeModal" style="float:right;"><i class="glyphicon glyphicon-edit glyphicon-lg" style="color:white;"></i>
                           </button>					
						   <!-- Modal -->
						<div id="relativeModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Update Profile</h4>
							  </div>
							  <div class="modal-body">
								<table class="table table-hover" >
									<tbody>
										<tr>
											<td><b>Contact Number: </b></td>
											<td> <input type="text" name="relative_hp">
											</td>
										</tr>
										<tr>
											<td><b>Address:</b> </td>
											<td> <input type="text" name="relative_address"></td>
											
										</tr>   
										
									</tbody>
								  </table>    
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal">Save and Exit</button>
							  </div>
							</div>

						  </div>
						</div>
						</td>
						<?php
							if(isset($_POST['edit_relative']))
							{
								$newr_hp = $_POST['newrelative_hp'];
								$newr_add = $_POST['newrelative_address'];
								
								if(empty($newr_hp) && empty($newr_add))
								{ ?>
									&nbsp;
									<div class="alert alert-warning">
												<i class="fa fa-exclamation-triangle"></i> No information has been saved!
											</div>	
								<?php
								}
								else if(empty($newr_add))
								{
									if(is_numeric($newr_hp) == true)
									{
										mysql_query("update relative set relative_hp='$newr_hp' where student_id='$sess_id'");
										header("Refresh:3");
										?>
										&nbsp;
										<div class="alert alert-success">
												<i class="fa fa-check-circle"></i> Information has been saved!
											</div>
											<?php
									}
									else
									{ ?>
										&nbsp;
										<div class="alert alert-warning">
												<i class="fa fa-exclamation-triangle"></i> Contact number must be numeric!
											</div>
									<?php			
									}	
									
								}
								else if(empty($newr_hp))
								{
									mysql_query("update relative set relative_address='$newr_add' where student_id='$sess_id'");
									header("Refresh:3");
									?>
										&nbsp;
										<div class="alert alert-success">
												<i class="fa fa-check-circle"></i> Information has been saved!
											</div>
											<?php
								}
								else
								{ 
									if(is_numeric($newr_hp) == true)
									{
										mysql_query("update relative set relative_hp='$newr_hp',relative_address='$newr_add' where student_id='$sess_id'");
										header("Refresh:3");
										?>
										&nbsp;
										<div class="alert alert-success">
												<i class="fa fa-check-circle"></i> Information has been saved!
											</div>
											<?php
									}
									else
									{ ?>
										&nbsp;
										<div class="alert alert-warning">
												<i class="fa fa-exclamation-triangle"></i> Contact number must be numeric!
											</div>
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
				
				
				<div class="col-sm-4" style="margin-top:30px;">
					
					<div class="well" style="width:730px;">
						<h1>About</h1>
						<div>The director of the University Accommodation Management System requires you to design
								and implement a database system to assist with the administration of the office. The
								requirements collection and analysis phase of the database design process based on the
								Manager’s view has provided the following requirements specification for the accommodation
								office database system:
							<ul>
								<li>	
									Each hall of residence has a name, number, address, telephone number and a hall
									manager who supervises the operation of the hall. The halls provide only single rooms,
									which have a room number, place number and weekly rent rate.
								</li>
								<li>
									The place number uniquely identifies each room in all of the halls controlled by the
									accommodation office, and is used when renting a room to a student.
								</li>
								<li>
									Students may rent rooms throughout the academic year for various periods of time. Each
									individual rent agreement between a student and the accommodation office is uniquely
									identified using a lease number. The data stored on rooms currently rented includes the
									lease number, date the student started the rent period and date the student wishes to
									terminate the rent period (if known).
								</li>
								<li>
									The data stored on each student includes: the matric number, name (first and last name),
									home address (street, city/town, postcode), date of birth, category of student (for
									example, first year undergraduate (1UG), postgraduate (PG) and current status (placed /
									waiting). The student information stored relates to those currently renting a room and
									those on the waiting list.
								</li>
								<li>
									The accommodation office also stores a limited amount of information on the courses run
									by university including: course number, course title, course leader and department name.
									Each student is associated with a single course.
								</li>
								<li>
									Whenever possible, information on a student’s next-of-kin is stored, which includes the
									name, relationship, address (street, city/town, postcode) and contact telephone number.
								</li>
						</div>
					</div>
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
