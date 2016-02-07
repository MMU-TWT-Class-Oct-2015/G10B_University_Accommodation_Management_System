<!DOCTYPE html>
<?php
	include("connection.php");
	session_start();
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

body
{
	background-color: #444;
    background: url("img/mmu_login.jpg");


}

.vertical-offset-100
{
    padding-top:100px;
}

.navbar-header {
    float: left;
    padding: 15px;
    text-align: center;
    width: 100%;
}

.page-header {
  padding-bottom: 9px;
  margin: 40px 0 20px;
  border-bottom: none;
}
</style>


</head>


      <body>



<div class="container">

  <div class="page-header">
    <img src ="img/mmu_login_logo.png" alt="MMU">
  </div>

    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">MMU Accommodation Management System</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="POST" >
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="ID" name="id" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<h6>Password is case sensitive</h6>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Login">
						<?php

							if(isset($_POST['submit']))
							{	$id=$_POST['id'];
								$pass=$_POST['password'];
								
								$check_student = mysql_query("select student_pass from student where student_id ='$id'");
								$check_staff = mysql_query("select staff_pass from staff where staff ='$id'");
								
								if(empty($_POST['id']) || empty($_POST['password']))
								{
							?>
									<div class="alert alert-danger">
												<strong>ERROR!</strong> Please fill in ID and Password!
											</div>
							<?php
								}
								else if($check_student != $pass)
								{
									?>
										<div class="alert alert-warning">
											<strong>Warning!</strong> ID or Password does not match!
											</div>
										<?php
								}
								else if($check_staff != $pass)
								{
									?> 
										<div class="alert alert-warning">
											<strong>Warning!</strong> ID or Password does not match!
										</div>
									<?php
								}
								if(0<mysql_num_rows(mysql_query("select * from student where student_id='$id' AND student_pass='$pass'")))
								{
									
									$query=mysql_query("select * from student where student_id='$id' AND student_pass='$pass'");
									
									
									$rows = mysql_num_rows($query);
									
									if ($rows == 1) 
									{
										$_SESSION['id']=$id; // Initializing Session
										header("location: index.php"); // Redirecting To Other Page	
									}
									
								}

								else if(0<mysql_num_rows(mysql_query("select * from staff where staff_id='$id' AND staff_pass='$pass'")))
								{
									$adminquery=mysql_query("select * from staff where staff_id='$id' AND staff_pass='$pass'");
									
									$adminrows = mysql_num_rows($adminquery);
									
								if ($adminrows == 1) 
								{
									$_SESSION['id']=$id; // Initializing Session
									header("location: admin_index.php"); // Redirecting To Other Page
								}
		
	
								}
							}
							

?>
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
        </body>

</html>



