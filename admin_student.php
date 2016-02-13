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
			if(isset($_POST["student_id"]))
			{
						
						$sid=$_POST["student_id"];
						mysql_query("DELETE FROM student WHERE student_id='$sid'");
						mysql_query("DELETE FROM relative WHERE student_id='$sid'");
						?>
						<script type="text/javascript">
								window.alert('The selected student is Deleted.');
						</script>
					<?php
						
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
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
             <div class="collapse navbar-collapse navbar-ex1-collapse">

                <ul class="nav navbar-nav side-nav">
					<li>

                        <a href="admin_index.php"><i class="fa fa-fw fa-table"></i> View Hall and Room Status</a>
                    </li>
                    <li >
                        <a href="admin_pending.php"><i class="fa fa-fw fa-dashboard"></i> Pending Room</a>
                    </li>
					<li>
						<a href="admin_checkout.php"><i class="fa fa-fw fa-table"></i> Check out</a>
					</li>
					<li>
                        <a href="admin_course.php"><i class="fa fa-fw fa-table"></i> Course</a>
                    </li>
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
                            Student
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class="alert alert-info">
                    <strong>The below are showing the student list. You may add new student by click below the button.</strong>
					<a href="admin_addstudent.php" class="btn btn-lg btn-primary btn-block">Add Student</a>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <h2>Student List</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" style="text-align:center;">
                                <thead>
                                    <tr style="color:skyblue;">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
										<th>Date of Birth</th>
										<th>Category</th>
                                        <th>Status</th>
										<th>Course</th>
										<th>H/P</th>
										<th>Password</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php	
									
										$student_result = mysql_query("select * from student,relative where relative.student_id=student.student_id");
										if(mysql_num_rows($student_result)== 0)
										{
								?>
											<tr><td colspan="10" style="text-align:center;">Student List is Empty.</td></tr>
								<?php
										}
										else
										{
										while ($student_row = mysql_fetch_array($student_result))
													{	
														
														$student_id = $student_row['student_id'];
														$student_name = $student_row['student_name'];
														$student_address = $student_row['student_address'];
														$student_dob = $student_row['student_dob'];
														$student_category = $student_row['student_category'];
														$student_status = $student_row['student_status'];
														$course_id = $student_row['course_id'];
														$student_hp = $student_row['student_hp'];
														$student_pass = $student_row['student_pass'];
														
														
														?>
															<tr>
															
																	<td rowspan="2"><?php echo $student_id ?></td>
																	<td><?php echo $student_name ?></td>
																	<td><?php echo $student_address ?></td>
																	<td><?php echo $student_dob ?></td>
																	<td><?php echo $student_category ?></td>
																	<td><?php echo $student_status ?></td>
																	<td><?php echo $course_id ?></td>
																	<td><?php echo $student_hp ?></td>
																	<td><?php echo $student_pass ?></td>
																	<td rowspan="2" >
																		
																		<input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
																		<a href="admin_editstudent.php?editid=<?php echo $student_id?>" title="Edit <?php echo $student_id ?> information." class="btn btn-default btn-primary" style="" name="seditbtn"><i class="glyphicon glyphicon-pencil" style="color:white;"></i></a>
																		<button type="submit" title="Delete <?php echo $student_id ?> record." class="btn btn-default btn-primary" style="" name="sdelbtn"><i class="glyphicon glyphicon-remove" style="color:white;"></i></button>
										
																		
																	</td>

															</tr>
															<?php 
																$relative_id = $student_row['relative_id'];
																$relative_name = $student_row['relative_name'];
																$relative_relation = $student_row['relative_relation'];
																$relative_address = $student_row['relative_address'];
																$relative_hp = $student_row['relative_hp'];
															
															?>
															 <tr>
																<td><?php echo $relative_name ?></td>
																<td><?php echo $relative_address ?></td>
																<th style="color:skyblue;">Relation</td>
																<td><?php echo $relative_relation ?></td>
																
																<th style="color:skyblue;">H/P:</th>
																<td colspan="2"><?php echo $relative_hp ?></td>
																<th style="color:skyblue;"><i class="glyphicon glyphicon-arrow-left" style="color:black;"></i> Relative</th>
																
															</tr>
															
															
														<?php
													}
										}

								?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->
		</form>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	

</body>

</html>
