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





				if(isset($_POST["addbtn"]))
				{
							
						$hall_namex = $_POST['hall_name'];
						$hall_idx = $_POST['hall_id'];
						$hall_addressx = $_POST['hall_address'];
						$hall_hpx = $_POST['hall_hp'];
						$hall_managerx = $_POST['hall_manager'];


						$hidresult=mysql_query("select * from hall where hall_id='$hall_idx'");
						if(empty($hall_namex) || empty($hall_idx)|| empty($hall_addressx))
						{
							?>
									<script type="text/javascript">
										alert("Please fill in hall name, ID and address.");
									</script>

							<?php
						}
						else if(is_numeric($hall_hpx) == false)
						{
							?>
									<script type="text/javascript">
										alert("Please enter only numeric at manager phone number. ");
									</script>

							<?php
						}
						else if(strlen($hall_managerx)<6)
						{
							?>
									<script type="text/javascript">
										alert("Please enter manager full name. ");
									</script>

							<?php
						}
						else if(strlen($hall_namex)<5)
						{
							?>
									<script type="text/javascript">
										alert("The hall name must more then 5 character. ");
									</script>

							<?php
						}
						else if((mysql_num_rows($hidresult)!=0))
						{
							?>
							<script type="text/javascript">
								alert("The hall ID is exist.");
							</script>
							<?php
						}
						else
						{
									mysql_query("insert into hall (hall_id,hall_name,hall_address,hall_manager,hall_hp)
												values('$hall_idx','$hall_namex','$hall_addressx','$hall_managerx','$hall_hpx')");
									
									?>
												<script type="text/javascript">
												alert("Record Added.");
												window.location.href='admin_index.php';
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
										<a href="admin_index.php"><i class="fa fa-fw fa-table"></i> Hall</a>
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
											Add New Hall
										</h1>

									</div>
								</div>
								<!-- /.row -->

								<div class="alert alert-info">
									<strong>Please fill up all the information.</strong>

								</div>


								<div class="row" style="width:800px;margin-left:auto;margin-right:auto;">
									<div class="col-lg-12">

										<div class="form-group">
											<table style="width:780px;">
													
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">Hall ID</th>
														<td><input class="form-control" placeholder="" pattern=".{5,}" title="minimum 5 character" name="hall_id" type="text" value=""></td>
														
													</tr>
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">Hall Name</th>
														<td><input class="form-control" placeholder="" name="hall_name" type="text" value=""></td>
														
													</tr>
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">Address</th>
														<td><input class="form-control" placeholder="" pattern=".{15,}" title="minimum 15 character" name="hall_address" type="text" value=""></td>
														
													</tr>
													<tr style="height:50px;">
														<th style="color:skyblue;text-align:center;">Manager</th>
														<td><input class="form-control" placeholder="" name="hall_manager" type="text" value=""></td>
														
													</tr>

													<tr style="height:50px;">

														<th style="color:skyblue;text-align:center;">H/P</th>
														<td><input class="form-control" placeholder="" pattern=".{9,}" title="minimum 9 number" name="hall_hp" type="text" value=""></td>
														
													</tr>
											
											</table>
											<input class="btn btn-lg btn-primary btn-block" type="submit" name="addbtn" value="Add">
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
