<!DOCTYPE html>
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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">MMU Accommodation Managament System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="rent.php">View Available Room</a>
                    </li>
                    <li>
                        <a href="checkstatus.php">Check Booking Status</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#" style="color:skyblue;">Leong Yoong Wah</a>
                    </li>
					<li>
                        <a href="#">Logout</a>
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
					<tr><td colspan="2" style="color:skyblue;">Leong Yoong Wah
						<a href="#" title="Update profile">
							<span class="glyphicon glyphicon-edit" style="float:right;"></span>
						</a></td>
					</tr>
					<tr><td>Matric Number</td><td>1121115859</td></tr>
					<tr><td>Academic Year</td><td>Second Year</td></tr>
					<tr><td>Contact Number</td><td>01110646796</td></tr>
					<tr><td>Address</td><td>Street</br>City</br>Town</br>Postcode</td></tr>
					<tr><td>Date of Birth</td><td>0203</td></tr>
					<tr><td colspan="2" style="font-weight:bold;">Next-of-Kin</td></tr>
					<tr><td colspan="2" style="color:skyblue;">Leong X X
						<a href="#" title="Update next-of-kin profile">
							<span class="glyphicon glyphicon-edit" style="float:right;"></span>
						</a></td>
					</tr>
					<tr><td>Relationship</td><td>Father</td></tr>
					<tr><td>Contact Number</td><td>012xxxxxxx</td></tr>
					<tr><td>Address</td><td>Street</br>City</br>Town</br>Postcode</td></tr>
					
				</table>
				</div>
				
				
				
				<div class="col-sm-4">
				<h3>Please select a Hall</h3>
				<table style="width:700px;">
				<tr>
				<td><div class="panel panel-info" style="padding:5px;margin:5px;height:200px;">
					  <div class="panel-heading">Hall Ixora</div>
					  <div class="panel-body">
					  <table>
					  <tr>
						<td style="width:250px;">
							<img src="img/ixoralogo.jpg" style="width:200px;height:55px;">
						</td>
						<td>
							<p>	Address:<br/>
								Manager:<br/>
								Contact Number:<br/>
							</p>
						</td>
						</tr>
						</table>
						<input class="btn btn-lg btn-warning btn-block" type="button" name="hall1" value="Select">
					  </div>
					</div>
				</td>
				</tr>
				<tr>
				<td><div class="panel panel-info" style="padding:5px;margin:5px;height:200px;">
					  <div class="panel-heading">Hall EP</div>
					  <div class="panel-body">
					  <table>
					  <tr>
						<td style="width:250px;">
							<img src="img/eplogo.png" style="width:200px;height:55px;">
						</td>
						<td>
							<p>	Address:<br/>
								Manager:<br/>
								Contact Number:<br/>
							</p>
						</td>
						</tr>
						</table>
						<input class="btn btn-lg btn-warning  btn-block" type="button" name="hall2" value="Select">
					  </div>
					</div>
				</td>
				</tr>
				</table>
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