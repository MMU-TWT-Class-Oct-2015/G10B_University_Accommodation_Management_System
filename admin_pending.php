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
	if(isset($_POST["upstatusbtn"]))
			{
						$newstatus="Rented";
						$wid=$_POST["waiting_id"];
						$pid=$_POST["place_id"];
						$student_id=$_POST["student_id"];
						$wait_start=$_POST["wait_start"];
						$wait_end=$_POST["wait_end"];
						mysql_query("insert into agreement (place_id, student_id, date_start, date_end) values ('$pid', '$student_id', '$wait_start', '$wait_end')");
						mysql_query("update room set room_status = '$newstatus' where place_id = '$pid'");
						mysql_query("update student set student_status = '$newstatus' where student_id = '$student_id'");
						mysql_query("DELETE FROM waiting WHERE waiting_id='$wid'");
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

                        <a href="admin_index.php"><i class="fa fa-fw fa-table"></i> Hall and Room</a>
                    </li>
                    <li class="active">
                        <a href="admin_pending.php"><i class="fa fa-fw fa-dashboard"></i> Pending Room</a>
                    </li>
					<li>
						<a href="admin_checkout.php"><i class="fa fa-fw fa-table"></i> Check out</a>
					</li>
					<li>
                        <a href="admin_course.php"><i class="fa fa-fw fa-table"></i> Course</a>
                    </li>
					<li>
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
                            Pending Room
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class="alert alert-info">
                    <strong>Below the list are showing the room still pending from student request. Please update room status.</strong>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <h2>Pending Room List</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Place ID</th>
                                        <th>Student ID</th>
										<th>Student Name</th>
										<th>Student H/P</th>
                                        <th>Start Date</th>
										<th>Terminate Date</th>
										<th style="width:180px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
										$room_result = mysql_query("select * from waiting,room,student where waiting.place_id=room.place_id and waiting.student_id=student.student_id and room.room_status='Pending'");
										if(mysql_num_rows($room_result)== 0)
										{
								?>
											<tr><td colspan="8" style="text-align:center;">Pending List is Empty.</td></tr>
								<?php
										}
										else
										{
										while ($room_row = mysql_fetch_array($room_result))
													{
														$waiting_id = $room_row['waiting_id'];
														$place_id = $room_row['place_id'];
														$student_id = $room_row['student_id'];
														$student_name = $room_row['student_name'];
														$student_hp = $room_row['student_hp'];
														$wait_start = $room_row['wait_start'];
														$wait_end = $room_row['wait_end'];
														$room_status = $room_row['room_status'];
														?>
															<tr>
															<form name="statusfrm" method="POST">
																	<td><?php echo $waiting_id ?></td>
																	<td><?php echo $place_id ?></td>
																	<td><?php echo $student_id ?></td>
																	<td><?php echo $student_name ?></td>
																	<td><?php echo $student_hp ?></td>
																	<td><?php echo $wait_start ?></td>
																	<td><?php echo $wait_end ?></td>
																	<td><?php echo "<span style='color:orange'>$room_status</span>" ?>

																		<input type="hidden" name="waiting_id" value="<?php echo $waiting_id; ?>">
																		<input type="hidden" name="place_id" value="<?php echo $place_id; ?>">
																		<input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
																		<input type="hidden" name="wait_start" value="<?php echo $wait_start; ?>">
																		<input type="hidden" name="wait_end" value="<?php echo $wait_end; ?>">

																		<button type="submit" title="Update Status" class="btn btn-default btn-primary" style="float:right;" name="upstatusbtn"><i class="glyphicon glyphicon-circle-arrow-up" style="color:white;"></i>
																		</button>

																	</td>

															</tr>
															</form>
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
