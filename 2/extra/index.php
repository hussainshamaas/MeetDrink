<?php
require('include/db.php');

$query = "SELECT COUNT(*) as count FROM bars";
$result = $mysqli->query($query) or die($mysqli->error . __LINE__);
$row = $result->fetch_array();
$bars = $row['count'];

$query = "SELECT COUNT(*) as count FROM drinks";
$result = $mysqli->query($query) or die($mysqli->error . __LINE__);
$row = $result->fetch_array();
$drinks = $row['count'];

$query = "SELECT COUNT(*) as count FROM drinkers";
$result = $mysqli->query($query) or die($mysqli->error . __LINE__);
$row = $result->fetch_array();
$drinkers = $row['count'];
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Meet&Drink</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
 
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="../" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MD</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="dist/img/logo.png" style="height:50px"/></span>
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
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Current User</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Current User - Admin
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
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
        <li class="active"><a href=""><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
        <li><a href="1"><i class="fa fa-glass"></i> <span>Most Popular Drinks</span></a></li>
        <li><a href="2"><i class="fa fa-heart"></i> <span>Meet Someone</span></a></li>
        <li><a href="3"><i class="fa fa-beer"></i> <span>Cheapest bar</span></a></li>
		<li><a href="4"><i class="fa fa-cogs"></i> <span>Advanced Drink Suggester</span></a></li>
		<li><a href="5"><i class="fa fa-beer"></i> <span>Happy Hour</span></a></li>

        <li><a href="InsertDrinker"><i class="fa fa-user-plus"></i> <span>Insert Drinker</span></a></li>
        
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
        Home
        <small>Dashboard</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

     
        <div class="row">
         
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><center><?php echo $bars?></center></h3>

                        <p><center>Bars</center></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><center><?php echo $drinks?></center></h3>

                        <p><center>Drinks</center></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><center><?php echo $drinkers?></center></h3>

                        <p><center>Drinkers</center></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
			<div class="col-lg-12 col-xs-12">
			<h1> What is Meet & Drink? </h1>
				<div class="col-lg-9 col-xs-9">
					<p>Meet & Drink is an database web application that gives you a multitude of suggestions to step-up your bar game! 
					This is aimed at single individuals between the ages of 21 and 33 in New York. Meet & Drink helps users find the most 
					attractive bars based upon their individual preferences. 
					</p> 
				</div>
			</div>
			<div class="col-lg-12 col-xs-12">
			<h1> What makes us different?  </h1>
				<div class="col-lg-9 col-xs-9">
					<p>Unlike other services we focus on the bar scene giving you specific information about the relevant information one
					would need at a bar, rather than just finding the closest bar without any critique to your individual preferences.
					</p> 
					</div>
				</div>
				<div class="col-lg-12 col-xs-12">
			<h1> What do we offer? </h1>
					<div class="col-lg-9 col-xs-9">
						<p>It’s a Friday night and you don’t want to sit at home and watch Netflix. You want to go out and meet people, 
						maybe find a boyfriend or girlfriend who works in the same field you work in. Preferably someone around your age.
						We have you covered! Using our database you can input which borough of NYC you live in, what occupation you are looking 
						for, what age range you would want, and finally the gender of whom you are looking to meet. Using our database of
						thousands of individuals we are able to suggest the top bars you are most likely to find the soul mate or friend 
						you are looking to meet.</p> 
					</div>
				</div>
				
					<div class="col-lg-12 col-xs-12">
			<h1> Value Proposition: </h1>
					<div class="col-lg-9 col-xs-9">
						<p>Our research has been able to gather data about the popular trends in NYC, and with this data, we are able to offer 
						you which bars have the cheapest prices, including happy hour. Our database also accounts for those that are unable to 
						make it to happy hour, including those with the latest happy hours. Our database web application is differentiated by 
						others since it helps match individuals by occupations and finding their special someone in a certain area or field. 
						On top of that, we are able to provide the bars that are most frequented by men or by women. We even help you once you 
						get to the bar, we have accumulated a list of the most popular drinks. For instance, if you are looking to buy that girl 
						or guy across the bar a drink, but do not know which drink they would prefer. We have data that helps provide the most 
						popular drink based on gender as well as occupation. Using our database of thousands of individuals we have studied 
						trends of what types of drinks each gender prefers. You can search which drinks are popular with the ladies and which 
						drinks men like. So when you get to the bar and approach a person of interest you won’t look like a clueless person. 
						You can be suave and get a drink that your interested party will actually enjoy.
</p> 
					</div>
				</div>
			</div>
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

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

</body>
</html>
