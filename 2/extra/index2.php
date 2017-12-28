<?php
require('../include/db.php');
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Meet&Drink</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../include/css/dataTables.bootstrap.css">
 
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MD</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../dist/img/logo.png" style="height:50px"/></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Current User</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 Current User
                </p>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Current User</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
		<li><a href="../"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
        <li><a href="../1"><i class="fa fa-glass"></i> <span>Most Popular Drinks</span></a></li>
        <li class="active"><a href="../2"><i class="fa fa-heart"></i> <span>Meet Someone</span></a></li>
        <li><a href="../3"><i class="fa fa-beer"></i> <span>Cheapest bar</span></a></li>
		<li><a href="../4"><i class="fa fa-cogs"></i> <span>Advanced Drink Suggester</span></a></li>
		<li><a href="../5"><i class="fa fa-beer"></i> <span>Happy Hour</span></a></li>

        <li><a href="../InsertDrinker"><i class="fa fa-user-plus"></i> <span>Insert Drinker</span></a></li>
		
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		Meet someone that likes beers you like and lives near you! 
      </h1>
      </section>

    <!-- Main content -->
    <section class="content">

      
      
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Select your favorite drink, location, and you can provide an age limit as well!</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form method="POST" action="">
              <strong>Drink Name: </strong><select style="margin-bottom: 10px;  margin-right: 10px;" name="drinkname">
                <option>Select</option>

                <?php
                  $query = "SELECT DISTINCT(drinkname) FROM drinks ORDER BY drinkname;";
                  $result = $mysqli->query($query) or die($mysqli->error . __LINE__);
                  while ($row = $result->fetch_array()) {
                       ?>
                       <option><?php echo $row['drinkname'];?></option>
                       <?php
                  }
                ?>
              </select>
              <strong>Location: </strong><select style="margin-bottom: 10px;" name="location">
                <option>Select</option>
                <?php
                  $query = "SELECT DISTINCT(borough) FROM drinkers ORDER BY borough;";
                  $result = $mysqli->query($query) or die($mysqli->error . __LINE__);
                  while ($row = $result->fetch_array()) {
                       ?>
                       <option><?php echo $row['borough'];?></option>
                       <?php
                  }
                ?>
              </select>
			  
			  <strong>Occupation: </strong><select style="margin-bottom: 10px;" name="occupation">
                <option>Select</option>
                <?php
                  $query = "SELECT DISTINCT(occupation) FROM drinkers ORDER BY occupation;";
                  $result = $mysqli->query($query) or die($mysqli->error . __LINE__);
                  while ($row = $result->fetch_array()) {
                       ?>
                       <option><?php echo $row['occupation'];?></option>
                       <?php
                  }
                ?>
              </select>
			  </br>
			    <strong>Age: </strong>
                <input type="number" name="age" style="width:50px"/>
              <button  class="btn btn-primary" name="filter">Filter</button>
              </form>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Gender</th>
				  <th>Age</th>
                  <th>Drink Name</th>
                  <th>Location</th>
				  <th>Occupation</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT drinkers.drinker_id, name, age, gender, drinkname, borough, occupation
                          FROM prefs LEFT JOIN drinkers ON drinkers.drinker_id = prefs.drinker_id
                          WHERE drinkname = 'Angry Orchard' AND borough = 'Queens';";

                if(isset($_POST['filter']) && $_POST['drinkname']!="Select" && $_POST['location']!="Select" &&  $_POST['age']!=""  && $_POST['occupation']!="Select" ){
                  $drinkname = $_POST['drinkname'];
                  $location = $_POST['location'];
				  $occupuation = $_POST['occupation'];
                  $query = "SELECT drinkers.drinker_id, name, age, gender, drinkname, borough, occupation
                          FROM prefs LEFT JOIN drinkers ON drinkers.drinker_id = prefs.drinker_id
                          WHERE drinkname = '$drinkname' AND borough = '$location' AND occupation='$occupuation' AND age<='$age';
						  ";
				
				
                if(isset($_POST['filter']) && $_POST['drinkname']=="Select" && $_POST['location']=="Select" &&  $_POST['age']!=""  && $_POST['occupation']=="Select" ){
                  $drinkname = $_POST['drinkname'];
                  $location = $_POST['location'];
				  $occupuation = $_POST['occupation'];
				  $age = $_POST['age'];
                  $query = "SELECT drinkers.drinker_id, name, age, gender, drinkname, borough, occupation
                          FROM prefs LEFT JOIN drinkers ON drinkers.drinker_id = prefs.drinker_id
                          WHERE age<='$age';
						  ";
                }
				
				if(isset($_POST['filter']) && $_POST['drinkname']=="Select" && $_POST['location']!="Select" &&  $_POST['age']!=""  && $_POST['occupation']=="Select" ){
                  $drinkname = $_POST['drinkname'];
                  $location = $_POST['location'];
				  $occupuation = $_POST['occupation'];
				  $age = $_POST['age'];
                  $query = "SELECT drinkers.drinker_id, name, age, gender, drinkname, borough, occupation
                          FROM prefs LEFT JOIN drinkers ON drinkers.drinker_id = prefs.drinker_id
                          WHERE age<='$age'AND borough=='$location';
						  ";
                }
                $result = $mysqli->query($query) or die($mysqli->error . __LINE__);
                while($row = $result->fetch_array()){
                 ?>
                <tr>
                  <td><?php echo $row['name']?></td>
                  <td><?php echo $row['gender']?></td>
				  <td><?php echo $row['age']?></td>
                  <td><?php echo $row['drinkname']?></td>
                  <td><?php echo $row['borough']?></td>
				  <td><?php echo $row['occupation']?></td>

                  
                </tr>
                <?php
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
				<th>Name</th>
                  <th>Gender</th>
				  <th> Age</th>
                  <th>Drink Name</th>
                  <th>Location</th>
				  <th>Occupation</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <center><strong>Copyright &copy; 2017</strong> All rights reserved.</center>
  </footer>
  <div class="control-sidebar-bg"></div>
</div>

<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="../include/js/jquery.dataTables.min.js"></script>
<script src="../include/js/dataTables.bootstrap.min.js"></script>

<script>


  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>