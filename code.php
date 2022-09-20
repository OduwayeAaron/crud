<?php
    session_start();
    include "dbcon.php";

    if(isset($_POST['delete_student'])){
        $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);
        $query = "DELETE FROM students WHERE id=  '$student_id'";
        $query_run = mysqli_query($con, $query);

        if($query_run){
            $_SESSION['message'] = "Students Successfully Deleted";
            header("location:index.php");
            exit(0);
        }else{
            $_SESSION['message'] = "Student cannot be deleted";
            header("location:index.php");
            exit(0);
        }
    }



    if(isset($_POST['update_student'])){
        $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $course  = mysqli_real_escape_string($con, $_POST['course']);

        $query = "UPDATE students SET name = '$name', email = '$email', phone = '$phone', course = '$course'  WHERE id = '$student_id'";
        $query_run = mysqli_query($con, $query);
        //$row = mysqli_num_row($query_run);
        if($query_run){
            $_SESSION['message'] = "Students Successfully updated";
            header("location:index.php");
            exit(0);
        }else{
            $_SESSION['message'] = "Not Successfully updated";
            header("location:index.php");
            exit(0);
        };
    }







    if(isset($_POST['save_student'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $course  = mysqli_real_escape_string($con, $_POST['course']);

        $query = "INSERT INTO students (name,email,phone,course) VALUES ('$name', '$email', '$phone', '$course')";
        $query_run = mysqli_query($con, $query);

        if($query_run){
            $_SESSION['message'] = "Student Created Successfully";
            header('location: student-create.php');
            exit(0);
        }else{
            $_SESSION['message'] = "Student not Created";
            header('location: student-create.php');
            exit(0);
        }

    }
?>