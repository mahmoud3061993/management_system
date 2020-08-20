<?php
                        session_start();
                        include 'conn.php';
    
                        $Query = "SELECT * FROM employees WHERE email = '".$_SESSION["empemail"]."'";
                        $exeQuery = mysqli_query($mysqli,$Query);
                        $row = mysqli_fetch_array($exeQuery);
                        
                        ?>
<!DOCTYPE html>

<html>
  <head>
	<title>Company Name</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleindex.css">
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<link rel="stylesheet" type="text/css" href="css/styletasks.css">


  </head>
<body>

<header>
		<nav>
            
            
			<h1><img class="rounded-circle" src="<?php echo $row['pic']; ?>" width="35px" height="35px"> <?php echo $row['name']; ?></h1>
			<ul id="navli">
				<li><a class="homered" href="myTasks.php">My tasks</a></li>
				<li><a class="homeblack" href="chat.php">Chat</a></li>
				<li><a class="homeblack" href="myProfile.php">Profile</a></li>
                <li><a class="homeblack" href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>


<!-- <form id = "registration" action="edit.php" method="POST"> -->
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    
                    <form method="POST" action="handleMyProfile.php" enctype="multipart/form-data">
                        <?php
  
                            if ( isset($_GET['message']) && $_GET['message'] == 27 )
                            {
                                echo 

                                "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                                Please upload picture!
                                </div>";
                            }
            
                        ?>
                        
                        <h2 class="title" style="text-align:center;">My Info</h2>   
                        <div class="input-group ">
                            <img class="title rounded-circle" src="<?php echo $row['pic']; ?>" width="100px" height="100px">
                        </div>
                       

                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                  <p>Name</p>
                                     <input class="input--style-1" type="text" name="name" value="<?php echo $row['name']; ?>"  >
                                </div>
                                <?php
  
                            if ( isset($_GET['message']) && $_GET['message'] == 21 )
                            {
                                echo 

                                "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                                Please enter valid name
                                </div>";
                            }
            
                        ?>
                            </div>
<!--
                            <div class="col-5">
                                <div class="input-group">
                                  <p>Last Name</p>
                                    <input class="input--style-1" type="text" name="lastName" value="" >
                                </div>
                            </div>
-->
                        </div>

                        <div class="input-group">
                          <p>Email</p>
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $row['email']; ?>" disabled>
                        </div>
                        <?php
  
                            if ( isset($_GET['message']) && $_GET['message'] == 20 )
                            {
                                echo 

                                "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                                Please enter valid email
                                </div>";
                            }
            
                        ?>
                        <div class="input-group">
                          <p>Password</p>
                            <input class="input--style-1" style="color: #666;" type="password"  name="password" value="<?php echo $row['password']; ?>" >
                        </div>
                        <?php
  
                            if ( isset($_GET['message']) && $_GET['message'] == 26 )
                            {
                                echo 

                                "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                                Please enter valid password
                                </div>";
                            }
            
                        ?>
                        <div class="row row-space">
                            <div class="col-5">
                                <div class="input-group">
                                  <p>City</p>
                                    <input class="input--style-1" type="text" name="city" value="<?php echo $row['city']; ?>" >
                                   
                                </div>
                                <?php
  
                            if ( isset($_GET['message']) && $_GET['message'] == 22 )
                            {
                                echo 

                                "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                                Please enter valid city
                                </div>";
                            }
            
                        ?>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                  <p>Gender</p>
                                  <input class="input--style-1" type="text" name="gender" value="<?php echo $row['gender']; ?>" >
                                </div>
                                <?php
  
                            if ( isset($_GET['message']) && $_GET['message'] == 23 )
                            {
                                echo 

                                "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                                Please enter valid gender
                                </div>";
                            }
            
                        ?>
                            </div>
                        </div>
                        
                        <div class="input-group">
                          <p>Phone Number</p>
                            <input class="input--style-1" type="number" name="phone" value="<?php echo $row['phone']; ?>" >
                        </div>
                        <?php
  
                            if ( isset($_GET['message']) && $_GET['message'] == 24 )
                            {
                                echo 

                                "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                                Please enter valid phone number
                                </div>";
                            }
            
                        ?>
                        <div class="input-group">
                          <p>Birthday</p>
                            <input class="input--style-1" type="date" name="birthday" value="<?php echo $row['birthday']; ?>" >
                        </div>
                        <?php
  
                            if ( isset($_GET['message']) && $_GET['message'] == 25 )
                            {
                                echo 

                                "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                                Please enter valid birthday
                                </div>";
                            }
            
                        ?>
                        <div class="input-group">
                          <p>Picture</p>
                            <input class="input--style-1" type="file" name="image" value="" >
                        </div>


                        <input type="hidden" name="id" id="textField" value="<?php echo $row['id']; ?>" required="required">
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green"  name="send" >Update Info</button>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    
    <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="js/global.js"></script> 

  </body>
</html>


