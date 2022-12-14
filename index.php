<?php
    include 'dbcon.php';
    session_start();


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">

        <?php 
        include 'message.php';
        ?>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Students Details 
                            <a href="student-create.php" class="btn btn-primary float-end">Add Students</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th> 
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            
                             $query = "SELECT * FROM students ";
                             $query_run = mysqli_query($con, $query);
                         
                             
                             if(mysqli_num_rows($query_run) > 0){
                                foreach ($query_run as $student){
                                     //echo $student['name'];
                            ?>
                                    
                                    <tr>
                                    <td><?=$student['id']?></td>
                                    <td><?=$student['name']?></td>
                                    <td><?=$student['email']?></td>
                                    <td><?=$student['phone']?></td>
                                    <td><?=$student['course']?></td>
                                    <td>
                                    <a href="student-view.php?id=<?=$student['id'];?>" class="btn btn-info btn-sm">View</a>
                                    <a href="student-edit.php?id=<?= $student['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                    <form method="POST" action="code.php" class="d-inline">
                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>"  class="btn btn-danger btn-sm" >Delete</button>
                                    </form>
                                    </td>
                                    </tr>
                                    

                                    
                                    <?php
                                }
                             }else{
                                echo "<h5>No record found</h5>";
                             }   

                            ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>