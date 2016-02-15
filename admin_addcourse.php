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

    $ncourse_id = $_POST['course_id'];
    $ncourse_title = $_POST['course_title'];
    $ncourse_leader = $_POST['course_leader'];
    $ndepartment_name = $_POST['department_name'];

    $cidresult=mysql_query("select * from course where course_id='$ncourse_id'");
    if(empty($ncourse_id) || empty($ncourse_title)|| empty($ncourse_leader)|| empty($ndepartment_name))
    {
      ?>
          <script type="text/javascript">
            alert("Please fill in title, ID, Leader and department_name.");
          </script>

      <?php
    }
    else if((mysql_num_rows($cidresult)!=0))
    {
      ?>
      <script type="text/javascript">
        alert("The course ID is exist.");
      </script>
      <?php
    }
    else
    {
          mysql_query("insert into course (course_id,course_title,course_leader,department_name)values('$ncourse_id','$ncourse_title','$ncourse_leader','$ndepartment_name')");

          ?>
                <script type="text/javascript">
                alert("Record Added.");
                window.location.href='admin_course.php';
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
                  <a href="admin_course.php"><i class="fa fa-fw fa-table"></i> Add Course</a>
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
                    Add New Course
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
                          <th colspan="2" style="color:orange;text-align:center;font-size:20px;">Course</th>

                        </tr>
                        <tr style="height:50px;">
                          <th style="color:skyblue;text-align:center;">Course ID</th>
                          <td><input class="form-control" placeholder="" name="course_id" type="text" value=""></td>

                        </tr>
                        <tr style="height:50px;">
                          <th style="color:skyblue;text-align:center;">Course Title</th>
                          <td><input class="form-control" placeholder="" name="course_title" type="text" value=""></td>
                        </tr>
                        <tr style="height:50px;">
                          <th style="color:skyblue;text-align:center;">Course Leader</th>
                          <td><input class="form-control" placeholder="" name="course_leader" type="text" value=""></td>

                        </tr>
                        <tr style="height:50px;">
                          <th style="color:skyblue;text-align:center;">Department Name</th>
                          <td><input class="form-control" placeholder="" name="department_name" type="text" value=""></td>

                        </tr>


                    </table>
                    <input style="height:40px; width:80px; margin-top:10px; margin-left:700px;" class="btn btn-primary btn-block"  type="submit" name="addbtn" value="Add">
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
