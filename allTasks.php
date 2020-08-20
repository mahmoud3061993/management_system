<?php

session_start();
if(!isset($_SESSION['email']))//3aml login
{
   header('Location: index.php'); 
}

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
    

    <h2 class="task_title" >Empolyee Leaderboard</h2>
    
    <div class="text-center">
       
            <a class="btn btn-info" href="addTask.php" role="button">Add new task</a>
       
    </div>
    
    <br>
    
    <table>

			<tr bgcolor="#000">
				<th align = "center">emp_id</th>
				<th align = "center">emp_name</th>
				<th align = "center">Task_name</th>
				<th align = "center">Desc</th>
                <th align = "center">Status</th>
                <th align = "center">Deadline</th>
                <th align = "center">Actions</th>
				
            </tr>
            
        <?php
        
        include 'conn.php';
            $selQuery = 'SELECT tasks.task_id AS taid, tasks.emp_id AS id , employees.name AS empname, tasks.task_name AS name, tasks.description AS description, tasks.status AS status, tasks.deadline AS deadline FROM tasks JOIN employees
                         ON tasks.emp_id = employees.id';
            $exeQuery = mysqli_query($mysqli,$selQuery);
            while($row= mysqli_fetch_array($exeQuery)){
        
        ?>
        
        
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['empname']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['deadline']; ?></td>
                <td>
                    <a class="btn btn-success"  href="editTask.php?task_id=<?php echo $row['taid']; ?>" role="button">Edit</a>
                    <a class="btn btn-danger" href="deleteTask.php?task_id=<?php echo $row['taid']; ?>" role="button">Delete</a>
                    <a class="btn btn-primary" href="assignTask.php?id=<?php echo $row['id']; ?>" role="button">Assign to</a>
                </td>

            </tr>
            <?php
            }
        ?>

	</table>


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


