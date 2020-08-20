<?php
include('conn.php');
include('validation.php');

$name = $_POST['name'];
// $email = $_POST['email'];
$password = $_POST['password'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$id= $_POST['id'];
$image = $_FILES['image'];
$imageName = $image['name'];
$imageType = $image['type'];
$imageTmpname = $image['tmp_name'];
$imageSize = $image['size'];
$targetFolder = "images/";
$imageName = time().$id.$imageName;

$path=$targetFolder.$imageName;
move_uploaded_file($imageTmpname,$path);

$selQuery = "SELECT pic FROM employees WHERE id = '$id'";
$exeQuery = mysqli_query($mysqli,$selQuery);
$row = mysqli_fetch_array($exeQuery);


if(file_exists($path)){
          $path = $path;
   }
else{
    $path = $row['pic'];}

$valid = validateProfileForm($name,$city,$gender,$phone,$birthday,$password,$path);

if($valid){
$query = "UPDATE employees SET name = '$name', password = '$password', city = '$city', gender = '$gender', phone = '$phone', birthday = '$birthday', pic = '$path'  WHERE id = $id ";

    if(mysqli_query($mysqli, $query) === true){
        header('Location:myProfile.php');
} else{
    echo "ERROR: Could not able to execute $query. " . mysqli_error($mysqli);
}

}
elseif($name == false){
    header ('Location: myProfile.php?message=21');}
elseif($city == false){
    header ('Location: myProfile.php?message=22');}
elseif($gender == false){
    header ('Location: myProfile.php?message=23');}
elseif($phone == false){
    header ('Location: myProfile.php?message=24');}
elseif($birthday == false){
    header ('Location: myProfile.php?message=25');}
elseif($password == false){
    header ('Location: myProfile.php?message=26');}
elseif($path == false){
    header ('Location: myProfile.php?message=27');}




?>