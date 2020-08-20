<?php

class addEmployee{
    public $name;
    public $email;
    public $password;
    public $city;
    public $gender;
    public $phone;
    public $birthday;
    
    public function __construct($_name,$_email,$_password,$_city,$_gender,$_phone,$_birthday)
    {
        $this->name=$_name;
        $this->email=$_email;
        $this->password=$_password;
        $this->city=$_city;
        $this->gender=$_gender;
        $this->phone=$_phone;
        $this->birthday=$_birthday;
    }
    
    public function setInfo()
    {
        include('conn.php');
        include('validation.php');
        
        $query = "SELECT email FROM employees ";
        $exquery = mysqli_query($mysqli,$query);
        $row = mysqli_fetch_array($exquery);

        if($row['email'] == $this->email ){
            header ('Location: addEmployee.php?message=17');}
            elseif($this->birthday == false){
                header ('Location: addEmployee.php?message=9');}

        else{ 
            $valid = validateProfileForm($this->email,$this->name,$this->city,$this->gender,$this->phone,$this->birthday,$this->password);

            if($valid){

                $Query="INSERT INTO employees (name, email, password, phone, city, gender, birthday) VALUES ('$this->name', '$this->email', '$this->password', '$this->phone', '$this->city', '$this->gender', '$this->birthday')";

                if(mysqli_query($mysqli, $Query) === true){
                     header ('Location: viewEmployees.php');
                } else{
                    echo "ERROR: Could not able to execute $Query. " . mysqli_error($mysqli);
                }

               
  
            }elseif($this->email == false){
                header ('Location: addEmployee.php?message=4');}
            elseif($this->name == false){
                header ('Location: addEmployee.php?message=5');}
            elseif($this->city == false){
                header ('Location: addEmployee.php?message=6');}
            elseif($this->gender == false){
                header ('Location: addEmployee.php?message=7');}
            elseif($this->phone !== false){
                header ('Location: addEmployee.php?message=8');}
            
            elseif($this->password == false){
                header ('Location: addEmployee.php?message=10');}}  

    }
}

class login{
    public $_email;
    public $_password;
    
    public function __construct($__email,$__password)
    {
        $this->email=$__email;
        $this->password=$__password;
    }
    
    public function adminLogin()
    {
        include 'conn.php';
        include 'validation.php';
        
       $this->email=modifyInput($this->email);
        
        $Query="select email, password from admins WHERE email = '$this->email' AND password = '$this->password'";
        $exeQuery=mysqli_query($mysqli,$Query);
        while($row = mysqli_fetch_array($exeQuery)){
        
        if($row['email'] == $this->email && $row['password'] == $this->password)
        {
                //storing data 
                $_SESSION['email']=$this->email;
                $_SESSION['password']=$this->password;
        
            header('Location: allTasks.php');
        }else{
            header('Location: admLogin.php?message=1');
        } }
    }
    
    public function empLogin()
    {
        include 'conn.php';
        include 'validation.php';
        
          $this->email=modifyInput($this->email);
    
            $Query="SELECT email, password FROM employees WHERE email = '$this->email' AND password = '$this->password'";
            $exeQuery=mysqli_query($mysqli,$Query);
            while($row = mysqli_fetch_array($exeQuery)){
            
            if($row['email'] == $this->email && $row['password'] == $this->password)
            {
                    //storing data 
                    $_SESSION['empemail']=$this->email;
                    $_SESSION['emppassword']=$this->password;
            
                header('Location: myTasks.php');
            }else{
                header('Location: empLogin.php?message=2');
            }}
    }
}

class addTask{
    public $emp_id;
    public $task_name;
    public $desc;
    public $status;
    public $deadline;
    
    public function __construct($_empid,$_taskname,$_desc,$_status,$_deadline)
    {
        $this->emp_id=$_empid;
        $this->task_name=$_taskname;
        $this->desc=$_desc;
        $this->status=$_status;
        $this->deadline=$_deadline;
    }
    
    public function setTask()
    {
        include('conn.php');
        include('validation.php');

$valid= validateEdit($this->emp_id,$this->task_name,$this->desc,$this->status,$this->deadline);
    

if($valid){
$Query="INSERT INTO tasks (emp_id, task_name, description, status, deadline) VALUES ('$this->emp_id', '$this->task_name', '$this->desc', '$this->status', '$this->deadline')";

if(mysqli_query($mysqli, $Query) === true){
    header('Location: allTasks.php');
} else{
    echo "ERROR: Could not able to execute $Query. " . mysqli_error($mysqli);
}


}
// }elseif($emp_id == false){
//     header ('Location: addTask.php?message=11');}
elseif($this->task_name == false){
    header ('Location: addTask.php?message=12');}
elseif($this->desc == false){
    header ('Location: addTask.php?message=13');}
// elseif($status == false){
//     header ('Location: addTask.php?message=14');}
elseif($this->deadline == false){
    header ('Location: addTask.php?message=15');}

    }
    
   
}

class updateTask{
    
    public $emp_id;
    public $task_name;
    public $desc;
    public $status;
    public $deadline;
    public $task_id;
    
    public function __construct($_empid,$_taskname,$_desc,$_status,$_deadline,$_taskid)
    {
        $this->emp_id=$_empid;
        $this->task_name=$_taskname;
        $this->desc=$_desc;
        $this->status=$_status;
        $this->deadline=$_deadline;
        $this->task_id=$_taskid;
    }
    
     public function update(){
        session_start();
        include('conn.php');
        include('validation.php');

        
        $valid = validateEdit($this->emp_id,$this->task_name,$this->desc,$this->status,$this->deadline);

        if($valid){
        $Query="UPDATE tasks SET emp_id = '$this->emp_id', task_name = '$this->task_name', description = '$this->desc', status = '$this->status', deadline = '$this->deadline'  WHERE task_id = $this->task_id ";
        
        if(mysqli_query($mysqli, $Query) === true){
             header('Location: allTasks.php');
        } else{
            echo "ERROR: Could not able to execute $Query. " . mysqli_error($mysqli);
        }
        
        
       }
            
        // }elseif($this->emp_id == false){
        //     header ('Location: editTask.php?message=11');}
        // elseif($this->task_name == false){
        //     header ('Location: editTask.php?message=12');}
        // elseif($this->desc== false){
        //     header ('Location: editTask.php?message=13');}
        // elseif($this->status == false){
        //     header ('Location: editTask.php?message=14');}
        // elseif($this->deadline !== false){
        //     header ('Location: editTask.php?message=15');}

        
    }
}

?>