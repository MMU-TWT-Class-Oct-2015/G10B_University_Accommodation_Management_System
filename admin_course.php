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
	
	if (isset($_POST['sdelbtn']))
	{
						$cid=$_POST["course_id"];
						mysql_query("DELETE FROM course WHERE course_id='$cid'");
						
						?>
						<script type="text/javascript">
								window.alert('The selected course is Deleted.');
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
<form name="statusfrm" method="POST">
    <div id="wrapper">

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
                    <li>
                        <a href="admin_pending.php"><i class="fa fa-fw fa-dashboard"></i> Pending Room</a>
                    </li>
					<li>
						<a href="admin_checkout.php"><i class="fa fa-fw fa-table"></i> Check out</a>
					</li>
					<li class="active">
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
                        <h1 class="page-header" >
													<br>
                            Course
                        </h1>


                <div class="row">

                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Student detail</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Course ID</th>
                                                <th>Course Title</th>
                                                <th>Course Leader</th>
                                                <th>Department Name</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

											<?php
												$c_detail = mysql_query("select * from course");
																								
												while ($c_row = mysql_fetch_array($c_detail))
												{
														$course_id = $c_row['course_id'];
														$course_title = $c_row['course_title'];
														$course_leader = $c_row['course_leader'];
														$department_name = $c_row['department_name'];
                           
											?>
															<tr>
																	<td><?php echo $course_id ?></td>
																	<td><?php echo $course_title ?></td>
																	<td><?php echo $course_leader ?></td>
																	<td><?php echo $department_name ?></td>
																	
																	<td style="text-align:center;">
																	<input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
																	<a href="admin_editcourse.php?editid=<?php echo $course_id?>" title="Edit <?php echo $course_id ?> information." class="btn btn-default btn-primary" style="" name="seditbtn"><i class="glyphicon glyphicon-pencil" style="color:white;"></i></a>
																	<button type="submit" title="Delete <?php echo $course_id ?> record." class="btn btn-default btn-primary" style="" name="sdelbtn"><i class="glyphicon glyphicon-remove" style="color:white;"></i></button>
																	
																	</td>
															</tr>
														<?php
												}


											?>

                                        </tbody>

                                    </table>
                                    <a href="admin_addcourse.php" class="btn btn-lg btn-success">Add Course</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

	</form>
</body>

</html>
