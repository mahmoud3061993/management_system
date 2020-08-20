<?php

function modifyInput($input){
    $input= htmlspecialchars($input);
    $input= trim($input);
    return $input;
}

function validateForm($email,$password)
{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    echo "this is wrong email format <br/>";
}


if(!filter_var($password,FILTER_VALIDATE_INT))
{
    echo "this is wrong age format <br/>";
}}

function validateLoginForm($email,$password)
{
    $isValidData=true;//boolean
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            echo "this is wrong email format <br/>";
            $isValidData=false;
        }
    
    if(empty($password) || strlen($password)<8)
        {
            echo "this is wrong password format <br/>";
            $isValidData=false;
        }
    
    return $isValidData;
}


function validateProfileForm($name,$city,$gender,$phone,$birthday,$password,$path){
    
    $isValidData=true;//boolean
    if(empty($path))
        {
            $isValidData=false;
        }
    
    if(empty($password) || strlen($password)<5)
        {
            $isValidData=false;
        }
    
    if(empty($birthday))
        {
            $isValidData=false;
        }
    
    if(!preg_match("/^[0-0][0-9]{10}$/", $phone))
        {
            $isValidData=true;
        }
    
    if(empty($phone))
        {
            $isValidData=false;
        }
    
    if(empty($gender))
        {
            $isValidData=false;
        }
    
    if(empty($city))
        {
            $isValidData=false;
        }
    
    if(empty($name))
        {
            $isValidData=false;
        }
    
    return $isValidData;
}

function validateAddEmployee($email,$name,$city,$gender,$phone,$birthday,$password){
    
    $isValidData=true;//boolean
    if(empty($path))
        {
            $isValidData=false;
        }
    
    if(empty($password))
        {
            $isValidData=false;
        }
    
    if(empty($birthday))
        {
            $isValidData=false;
        }
    
    if(preg_match("/^[0-0][0-9]{10}$/", $phone))
        {
            $isValidData=true;
        }
    
    if(empty($phone))
        {
            $isValidData=false;
        }
    
    if(empty($gender))
        {
            $isValidData=false;
        }
    
    if(empty($city))
        {
            $isValidData=false;
        }
    
    if(empty($name))
        {
            $isValidData=false;
        }
    
    if(empty($email))
        {
            $isValidData=false;
        }
    
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $isValidData=false;
        }
    
    return $isValidData;
}

function validateEdit($emp_id,$task_name,$desc,$status,$deadline){
    
    $isValidData=true;//boolean
    if(empty($emp_id))
        {
            $isValidData=false;
        }
    
    if(empty($task_name))
        {
            $_SESSION['task_name'] = $task_name;
            $isValidData=false;
        }
    
    if(empty($desc))
        {
            $isValidData=false;
        }
    
    if(empty($status))
        {
            $isValidData=false;
        }
    
    if(empty($deadline))
        {
            $isValidData=false;
        }
    
    return $isValidData;
}
?>