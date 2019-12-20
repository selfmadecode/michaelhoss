<?php
    SESSION_START();

    include "includes/functions.php";


    //creates connection
    $connect=mysqli_connect('localhost', 'root', '', 'encodeup_internship');
        if(!$connect)
            die('Connection Error');


        //if the registration button is clicked
    if(isset($_POST['register']))
    {
        //prepare the inputs for insertion to the database
        $full_name = purify_input($_POST['full_name']);
        $email = purify_input($_POST['email']);
        $phone = purify_input($_POST['phone']);
        $password = purify_input($_POST['password']);
        $cpassword = purify_input($_POST['cpassword']);
        $dob = purify_input($_POST['dob']);
        $address = purify_input($_POST['address']);


        //validate input
        // if(empty($full_name)){
        //     die('error');
        // }

        $inputs = ['full_name', 'email', 'phone', 'password', 'cpassword', 'dob', 'address'];
        $err_msg = [];
        $fields = []; //associative array to hold the content of the fields

        foreach($inputs as $input)//loop through the $inputs array holding the name of the input
        {
            if(empty($_POST[$input])) //input field is empty
            {
                $err_msg[]= "$input field is required";  //populate the error message array
            }else{// input field isnt empty
                //store the content in the associative array
                $fields[$input] = $_POST[$input];
            }
        }
        //validating for password
        if($password !== $cpassword)
        {
            $err_msg[] = 'password mismatch';
        }




        if(empty($err_msg)) //if the error message array is empty
        {
            $password = md5($password);// encrpyt the password 
            // $password = password_hash($password);// encrpyt the password 

             //insert into the database
            $sql = "INSERT INTO users(
                name, email, phone, password, dob, address
             )VALUES (
                '$full_name', '$email', '$phone', '$password', '$dob', '$address'
             )";

            $query = mysqli_query($connect, $sql);
            if($query) //on successf ul execution of the query
            {
                $_SESSION['msg']= "Registration Sucessful. <br> Login to continue";
                header('location: login.php'); //go to the Login page
            } else{
                die("Query error". mysqli_error($connect));
            }
        }
        else{// if there is an error in filling the form
            // die("There was an error, Unsuccessful registration, fields cannot be left empty"); 
            $_SESSION['err_msg'] = $err_msg;
            $_SESSION['fields'] = $fields;
            header('location: registration.php');
        }
    }
    if(isset($_POST['login']))
        {
            $email = purify_input($_POST['email']);
            $password = md5(purify_input($_POST['password']));

            $sql = "SELECT * FROM `users` WHERE email = '$email'";
            $query = mysqli_query($connect, $sql);
            if(!$query){

                die('Query Error');
            }

            $user = mysqli_fetch_assoc($query);

            if (count($user) > 0)
            {
                //user email is correct
                // echo "Correct user";
                if($password == $user['password'])
                {
                //     // redirect to dashboard
                    $_SESSION['user'] = $user;

                    header("location: user.php");
                }else{
                    $_SESSION['msg']="incorect Password";
                    header("location: login.php");
                }
                
                
            }else{
                // invalid user
                echo "Invalid email";
                
            }
        }
        if(isset($_POST['submit'])) //sends the message to the database
        {
            $post_title = mysqli_real_escape_string($connect, purify_input($_POST['post_title']));
            //mysqli_real_escape_string allows the user to add 's to the database, $connect is an argument that follows
            $message = mysqli_real_escape_string($connect, purify_input($_POST['message']));
            $user_id = $_SESSION['user']['id'];
            $date = date("Y-m-d h:i:s");

            $sql = "INSERT INTO post(
                user_id, title, content, date
             )VALUES (
                '$user_id', '$post_title', '$message', '$date'
             )";

             $query = mysqli_query($connect, $sql);
            if($query) //on successful execution of the query
            {
                $_SESSION['post']= "post submitted";
                header('location: user.php');
            } else{
                die("Error Submitting post". mysqli_error($connect));
            }

        }//post ends
        if(isset($_POST['update'])){//when update button is clicked
            $post_title = mysqli_real_escape_string($connect, $_POST['post_title']);
            $message = mysqli_real_escape_string($connect, $_POST['message']);
            $id =  $_POST["update_id"];
            // $id = $_POST['update_id'];
            
            $sql = "UPDATE post 
                    SET title = '$post_title', content = '$message'
                    WHERE id = '$id'
                    ";
            $query = mysqli_query($connect, $sql);
            if($query){
                header("location: user.php");
                $msg = "Update Successful!";
            }
        }