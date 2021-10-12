<?php

include('include/functions.php');
    //  user - details
    if(isset($_POST['user_registration'])){
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contactno = mysqli_real_escape_string($con, $_POST['contactno']);  
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($con, $_POST['conformPassword']);
   



    // profile image upload
    $profileImageName = $_FILES["profileImage"]["name"];
    $tempname = $_FILES["profileImage"]["tmp_name"];   
    $folder = "assets/picture/profiles/".$profileImageName;
         


    // $re_pass = base64_encode(mysqli_real_escape_string($conn, $_POST['reg_pass']));

    $User_details="SELECT * FROM users_details WHERE Firstname='$firstname' OR Email='$email'";
    $result=mysqli_query($con,$User_details)or die("can't fetch");
    $num=mysqli_num_rows($result);

  

    if ($firstname == "admin") {
        $error="Invalid Username (You cannot use the username as admin!)";
        error("signup.php",$error);
    } else if ($num>0) {
        $error="Username or email id is already taken!";
        error("signup.php",$error);
    } else {

        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
       
        // if(strlen($password) < 3 || !$number || !$uppercase || !$lowercase || !$specialChars) {

         //password validation 

          if(strlen($password) < 3) {
                $error = "Password must be at least 3 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
                error("signup.php",$error);
          }else{

              if($password!=$confirmPassword){
                    $error = "Invalid password and confirm password !";
                    error("signup.php",$error);
              }else{

                    // query validation
                    $insert="insert into users_details (FirstName,LastName,Email,Password,ContactNo,Gender,ProfileImage) values('$firstname','$lastname','$email','$password','$contactno','$gender','$profileImageName') " ;

                    if(mysqli_query($con,$insert))
                    {
                        if(!move_uploaded_file($tempname, $folder)){
                            $error ="Error in Registration ...! Try after sometime";
                            error("signup.php",$error);
                        }else{
                            header("Location:index.php");
                        }
                    }
                    else{
                          $error ="Error in Registration ...! Try after sometime";
                          error("signup.php",$error);

                  }

              }
          }
        
   }
}

   ?>