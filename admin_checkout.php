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
	
    if(isset($_POST['place_id']))
	{	$pid=$_POST['place_id'];
		$update_detail = mysql_query("select * from student,agreement where agreement.place_id = '$pid' and agreement.student_id=student.student_id");
		$uprow = mysql_fetch_assoc($update_detail);
		$sid = $uprow["student_id"];   
		
        mysql_query("update room set room_status = 'None' where place_id='$pid'");
		mysql_query("update student set student_status = 'None' where student_id='$sid'");
		mysql_query("DELETE FROM agreement WHERE place_id='$pid' and student_id='$sid'");
		?>
						<script type="text/javascript">
								window.alert('Sucess to Checkout');
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
		<form name="co_form" method="post">
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
					<li class="active">
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
                            Checkout
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class="alert alert-info">
                    <strong>Below the list are showing the Rented room. Please select a room to checkout.</strong>
                </div>

                <!-- /.row -->


                <div class="row">

                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Rented Room </h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
									
                                        <thead>
                                            <tr>
                                                <th>Place ID</th>
                                                <th>Room Number</th>
                                                <th>Student ID</th>
												<th>Student Name</th>
												<th>Student H/P</th>
												<th>Start Date</th>
												<th>Terminate Date</th>
                                                <th>Room Status</th>
                                                <th>Checkout</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
												$room_detail = mysql_query("select * from room,agreement,student where room.room_status='Rented' and agreement.place_id=room.place_id and agreement.student_id=student.student_id");
												if(mysql_num_rows($room_detail)== 0)
												{
													?>
																<tr><td colspan="8" style="text-align:center;">No Room is Rented now.</td></tr>
													<?php
												}
												else
												{
													while ($room_row = mysql_fetch_array($room_detail))
													{

															$place_id = $room_row['place_id'];
															$room_num = $room_row['room_num'];
															$student_id = $room_row['student_id'];
															$student_name = $room_row['student_name'];
															$student_hp = $room_row['student_hp'];
															$date_start = $room_row['date_start'];
															$date_end = $room_row['date_end'];
															$room_status = $room_row['room_status'];
															?>
																<tr>
																		<td><?php echo $place_id ?></td>
																		<td><?php echo $room_num ?></td>
																		<td><?php echo $student_id ?></td>
																		<td><?php echo $student_name ?></td>
																		<td><?php echo $student_hp ?></td>
																		<td><?php echo $date_start ?></td>
																		<td><?php echo $date_end ?></td>
																		<td><?php
																			if ($room_status=='Pending')
																			{echo "<span style='color:orange'>$room_status</span>"; }
																			else if ($room_status=='Rented')
																			{echo "<span style='color:skyblue'>$room_status</span>"; }
																			else
																			{echo "<span>$room_status</span>"; }
																		?></td>
																		<td style="text-align:center;">
																			<input type="hidden" name="place_id" value="<?php echo $place_id; ?>">

																			<button type="submit" title="Checkout" class="btn btn-default btn-primary" name="cobtn"><i class="glyphicon glyphicon-share" style="color:white;"></i>
																			</button>
																		</td>
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
                <!-- /.row -->
			
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

	</form>
</body>

</html>
