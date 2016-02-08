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
					<li class="active">
                        <a href="admin_index.php"><i class="fa fa-fw fa-table"></i> View Hall and Room Status</a>
                    </li>
                    <li>
                        <a href="admin_pending.php"><i class="fa fa-fw fa-dashboard"></i> Pending Room</a>
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
                            View Hall and Room Status
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                               
									<label for="sel1">Please select a hall:  </label>
													
                            </li>
							 <li class="active">
									<div class="form-group">
									<form action="" method="post" >
									<select class="form-control" id="sel1" name="selecthall">
											<option value="0" selected></option>;
									<?php
										$hall_result = mysql_query("select * from hall");
										while ($hall_row = mysql_fetch_array($hall_result)) 
										{
												$hall_id = $hall_row['hall_id'];
												$hall_name = $hall_row['hall_name'];
											
												echo "<option value='$hall_id' class='alert alert-success'>$hall_name</option>";
										}
										
									?>
									</select>
										
									</div>
									
                            </li>
							<li class="active" style="margin-left:50px;">
                               <p>
										<?php 
											if (isset($_POST['subbtn'])) 
											{	
												if($_POST['selecthall']=="0")
												{
														echo "<br>";
												}
												else
												{
												$selecthall = $_POST['selecthall'];
												$displayname = mysql_query("select hall_name from hall where hall_id = '$selecthall'");
												$displaynamerow = mysql_fetch_assoc($displayname); 
												$hall_name1 = $displaynamerow['hall_name'];

												echo "<p>You are selecting <strong>$hall_name1</strong>.</p>";
												}
												
											}
											else
											{
												echo "<p>You are not select hall yet.</p>";
											}
											
									
										?>
							   </p>			
                            </li>
							<li class="active" style="float:right;">
                               <input class="btn btn-lg btn-success btn-block" type="submit" value="Submit" name="subbtn">				
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			
                <div class="alert alert-info">
                    <strong>Hall Detail: </strong> 
					<?php 
						if (isset($_POST['subbtn'])) 
						{
							if($_POST['selecthall']=="0")
							{
									echo "<p>Please select a hall to continue.</p>";
							}
							else
							{
							$selecthall = $_POST['selecthall'];
							$hall_detail = mysql_query("select * from hall where hall_id = '$selecthall'");
							$hall_detailrow = mysql_fetch_assoc($hall_detail); 
							$hall_name2 = $hall_detailrow['hall_name'];
							$hall_address = $hall_detailrow['hall_address'];
							$hall_hp = $hall_detailrow['hall_hp'];
							$hall_manager = $hall_detailrow['hall_manager'];
							echo "<div class='alert alert-success'><strong>$hall_name2</strong> <strong style='margin-left:50px;'>Address: </strong>$hall_address 
																	<strong style='margin-left:50px;'>H/P: </strong>$hall_hp <strong style='margin-left:50px;'>Manager: </strong>$hall_manager</div>";
							
					?>
                </div>

                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Room detail of <strong><?php echo "$hall_name2"?></strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Place ID</th>
                                                <th>Room Number</th>
                                                <th>Room Rent</th>
                                                <th>Room Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
												$room_detail = mysql_query("select * from hall,room where hall.hall_id = '$selecthall' and room.hall_id='$selecthall'");
												
												while ($room_row = mysql_fetch_array($room_detail)) 
												{		
														$place_id = $room_row['place_id'];
														$room_num = $room_row['room_num'];
														$room_rent = $room_row['room_rent'];
														$room_status = $room_row['room_status'];
														?>
															<tr>
																	<td><?php echo $place_id ?></td>
																	<td><?php echo $room_num ?></td>
																	<td><?php echo $room_rent ?></td>
																	<td><?php 
																		if ($room_status=='Pending') 
																		{echo "<span style='color:orange'>$room_status</span>"; }
																		else if ($room_status=='Rented')
																		{echo "<span style='color:skyblue'>$room_status</span>"; }
																		else
																		{echo "<span>$room_status</span>"; }
																	?></td>
															</tr>
														<?php
												}
											
											
											?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                         
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
			<?php
			}			
						
						}
						else
						{
							echo "<br>";
						}
						
			?>	
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

	</form>
</body>

</html>
