<!DOCTYPE html>
<?php
	include("connection.php");
	session_start();

	if (isset($_SESSION['id']))
	{

		$sess_id=$_SESSION["id"];

		$staff_result = mysql_query("select * from staff where staff_id=$sess_id");
		$staff_row = mysql_fetch_assoc($staff_result);

	}
	
				if(isset($_REQUEST["editid"]))
				{
						$sid=$_REQUEST["editid"];
						$relative_result = mysql_query("select * from relative,student where student.student_id='$sid' and relative.student_id=student.student_id");
						$relative_row = mysql_fetch_assoc($relative_result);
						
						$student_id = $relative_row['student_id'];
						$relative_id = $relative_row['relative_id'];
						$relative_name = $relative_row['relative_name'];
						$relative_relation = $relative_row['relative_relation'];
						$relative_address = $relative_row['relative_address'];
						$relative_hp = $relative_row['relative_hp'];
						
						$student_name = $relative_row['student_name'];
						$student_address = $relative_row['student_address'];
						$student_dob = $relative_row['student_dob'];
						$student_category = $relative_row['student_category'];
						$student_status = $relative_row['student_status'];
						$course_id = $relative_row['course_id'];
						$student_hp = $relative_row['student_hp'];
						$student_pass = $relative_row['student_pass'];
						
				}
				if(isset($_POST["subbtn"]))
				{
						$nrelative_name = $_POST['relative_name'];
						$nrelative_relation = $_POST['relative_relation'];
						$nrelative_address = $_POST['relative_address'];
						$nrelative_hp = $_POST['relative_hp'];
						
						$nstudent_name = $_POST['student_name'];
						$nstudent_address = $_POST['student_address'];
						$nstudent_dob = $_POST['student_dob'];
						$nstudent_category = $_POST['student_category'];
						
						$ncourse_id = $_POST['course_id'];
						$nstudent_hp = $_POST['student_hp'];
						$nstudent_pass = $_POST['student_pass'];
						
						
						
						
						if(empty($nstudent_pass) || empty($nstudent_name))
						{
							?>
									<script type="text/javascript">
										alert("Please fill in Name and Password.");
									</script>
									
							<?php
						}
						else
						{
									mysql_query("update student set student_name = '$nstudent_name',student_address = '$nstudent_address',student_dob = '$nstudent_dob',
									student_category = '$nstudent_category',course_id = '$ncourse_id',student_hp = '$nstudent_hp',student_pass = '$nstudent_pass' where student_id='$sid'");
									mysql_query("update relative set relative_name = '$nrelative_name',relative_relation = '$nrelative_relation',relative_address = '$nrelative_address',
												relative_hp = '$nrelative_hp' where student_id='$sid'");
									?>
										<script type="text/javascript">
										alert("Updated Record.");
										window.location.href='admin_student.php';
										</script>
									<?php
						
						}
				}
?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MMU Accommodation Managament Admin System</title>
    <!-- Bootstrap Core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- css for awesome font -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <!-- Custom styles for this template -->


	 <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
	 <script src="jquery.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>



  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
	<form name="statusfrm" method="POST">

        <!-- Navigation -->
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin_index.php">MMU Accommodation Managament Admin System</a>
            </div>
            <!-- Top Menu Items -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float:right;margin-right:10px;">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#"><i class="fa fa-user"></i><?php echo $staff_row["staff_name"] ?></a>
                    </li>
					<li>
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>

                </ul>

            </div>
			
							 <div class="collapse navbar-collapse navbar-ex1-collapse">

								<ul class="nav navbar-nav side-nav">
									
									<li class="active">
										<a href="admin_student.php"><i class="fa fa-fw fa-table"></i> Student</a>
									</li>



								</ul>
							</div>
							<!-- /.navbar-collapse -->
						</nav>

						<div id="page-wrapper">

							<div class="container-fluid">

								<!-- Page Heading -->
								<div class="row">
									<div class="col-lg-12">
										<h1 class="page-header">
																	<br>
											Update Student <?php echo $student_id ?> Profile
										</h1>

									</div>
								</div>
								<!-- /.row -->

								<div class="alert alert-info">
									<strong>Please update <?php echo $student_id ?>'s information.</strong>
									
								</div>


								<div class="row" style="width:800px;margin-left:auto;margin-right:auto;">
									<div class="col-lg-12">
										
										<div class="form-group">
											<table style="width:780px;">
													<tr style="height:50px;">
														<th colspan="2" style="color:orange;text-align:center;">Student</th>
														<th colspan="2" style="color:orange;text-align:center;">Relative</th>
													</tr>
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">ID</th>
														<td><?php echo $student_id ?></td>
														<th style="color:skyblue;text-align:center;">Name</th>
														<td><input class="form-control" placeholder="" name="relative_name" type="text" value="<?php echo $relative_name ?>"></td>
													</tr>
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">Name</th>
														<td><input class="form-control" placeholder="" name="student_name" type="text" value="<?php echo $student_name ?>"></td>
														<th style="color:skyblue;text-align:center;">Relation</th>
														<td><input class="form-control" placeholder="" name="relative_relation" type="text" value="<?php echo $relative_relation ?>"></td>
													</tr>
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">Address</th>
														<td><input class="form-control" placeholder="" name="student_address" type="text" value="<?php echo $student_address ?>"></td>
														<th style="color:skyblue;text-align:center;">Address</th>
														<td><input class="form-control" placeholder="" name="relative_address" type="text" value="<?php echo $relative_address ?>"></td>
													
													</tr>
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">Date of Birth</th>
														<td><input class="form-control" placeholder="" name="student_dob" type="text" value="<?php echo $student_dob ?>"></td>
														<th style="color:skyblue;text-align:center;">H/P:</th>
														<td><input class="form-control" placeholder="" name="relative_hp" type="text" value="<?php echo $relative_hp ?>"></td>
																
													</tr>
										
													<tr style="height:50px;">
														
														<th style="color:skyblue;text-align:center;">Category</th>
														<td>
														
															<select class="form-control" id="sct" name="student_category">
																	<option value="<?php echo $student_category ?>" selected><?php echo $student_category ?></option>;
															
																	<option value="Undergraduate">Undergraduate</option>
																	<option value="Postgraduate">Postgraduate</option>
											
															</select>
														</td>
														<th></th>
														<td></td>		
													</tr>
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">Status</th>
														<td><?php echo $student_status ?></td>
														<th></th>
														<td></td>		
													</tr>
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">Course</th>
														<td>
														
															<select class="form-control" id="scid" name="course_id">
																	<option value="<?php echo $course_id ?>" selected><?php echo $course_id ?></option>;
															<?php
																$course_result = mysql_query("select * from course");
																while ($course_row = mysql_fetch_array($course_result))
																{
																		$course_id = $course_row['course_id'];
																		

																		echo "<option value='$course_id'>$course_id</option>";
																}

															?>
															</select>
														</td>
														<th></th>
														<td></td>		
													</tr>
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">H/P</th>
														<td><input class="form-control" placeholder="" name="student_hp" type="text" value="<?php echo $student_hp ?>"></td>
														<th></th>
														<td></td>		
													</tr>
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">Password</th>
														<td><input class="form-control" placeholder="" name="student_pass" type="text" value="<?php echo $student_pass ?>"></td>
														<th></th>
														<td></td>		
													</tr>
											</table>
											<input class="btn btn-lg btn-primary btn-block" type="submit" name="subbtn" value="Submit">
										</div>
									</div>

								</div>

			</div>
			<!-- /.container-fluid -->

			</div>
			<!-- /#page-wrapper -->
            
	</form>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
