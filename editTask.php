<?php
session_start();
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
			<h1>Company Name</h1>
			<ul id="navli">
				<li><a class="homered" href="allTasks.php">All tasks</a></li>
				<li><a class="homeblack" href="viewEmployees.php">View employees</a></li>
				<li><a class="homeblack" href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>


    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title text-center mb-4">Project Info</h2>
                    <form action="handleEditTask.php" method="post">

                        
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="emp_id">
                                    
                                    <?php
                                    
                                    include 'conn.php';
                                    $Query = "SELECT tasks.task_id AS taid, employees.name AS name, task_name As taname, tasks.description AS description, tasks.status AS status, tasks.deadline AS deadline, employees.id AS empid FROM tasks JOIN employees on tasks.emp_id = employees.id 
                                    WHERE tasks.task_id = ".$_GET['task_id']." ";
                                    $exeQuery = mysqli_query($mysqli,$Query);
                                    $row = mysqli_fetch_array($exeQuery);
                                    ?>
                                    <option value="<?php echo $row['empid']; ?>">
                                        <?php echo $row['name']; ?>
                                    </option> 
                                    <?php
                                    $selQuery = "SELECT tasks.task_id, employees.name AS name, task_name As taname, tasks.description AS description, tasks.status AS status, tasks.deadline AS deadline, employees.id AS emid FROM tasks RIGHT JOIN employees on tasks.emp_id = employees.id
                                    WHERE id != '".$row['empid']."'
                                    GROUP BY emid";
                                    $Query = mysqli_query($mysqli,$selQuery);
                                    while($rownew = mysqli_fetch_array($Query)){
                                        
                                    ?>
                            
                                    <option value="<?php echo $rownew['emid']; ?>">
                                        <?php echo $rownew['name']; ?>
                                    </option>
                                    
                                    
                                    <?php
                                    }
                                    ?>
                                    
                                </select>
                                
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" value="<?php echo $row['taname']; ?>" name="taskname">
                        </div>
                        <?php
                            if ( isset($_GET['message']) && $_GET['message'] == 50)
                            {
                                echo 

                                "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                                Please enter valid project name
                                </div>";
                            }
                        ?>
                        <div class="form-group">
                            <label style="color: #666;" for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="desc" rows="3"><?php echo $row['description']; ?></textarea>
                        </div>
                        <?php
                            if ( isset($_GET['message']) && $_GET['message'] == 60)
                            {
                                echo 

                                "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                
                                Please enter valid description
                                </div>";
                            }
                        ?>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="status">
                                    <option><?php echo $row['status']; ?></option>
                                    <option>
                                    
                                        <?php
                                        
                                        $sQuery = "SELECT tasks.task_id, tasks.status AS empstatus FROM employees JOIN tasks ON employees.id = tasks.emp_id WHERE tasks.task_id = ".$_GET["task_id"]." ";
                                        $eQuery = mysqli_query($mysqli,$sQuery);
                                        $srow = mysqli_fetch_array($eQuery);
                                        
                                        if($srow['empstatus'] == 'in process'){
                                            echo "completed";
                                        }else{
                                            echo "in process";
                                        }
                                        
                                        ?>
                                        
                                        
                                        
                                    </option>
                                </select>
                                
                                <div class="select-dropdown"></div>
                            </div>
                        </div>


                        <div class="input-group">
                            <input class="input--style-1" style="color: #666;" type="date" value="<?php echo $row['deadline']; ?>" name="deadline">
                        </div>
                         
                        
                        <input type="hidden" id="custId" name="task_id" value="<?php echo $row['taid']; ?>">
                            

                       
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Update</button>
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

