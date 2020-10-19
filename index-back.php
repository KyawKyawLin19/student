<?php

    require_once('vendor/autoload.php');

    use Utils\DB;

    use Utils\Message;

    use Utils\Demo;

    $demo = new Demo();

    dd($demo->sample());

    $test = new Message();

    dd($test->hello());
        
    $db = new DB();

    $students = $db->index();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <h1>Student Info</h1>
                <a href="create.php" class="btn btn-primary">Create a New Student</a>
                <hr>            

                <?php if($students): ?>

                <div class="row mt-3">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Gender</td>
                                    <td>Date of Birth</td>
                                    <td>Age</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($students as $student): ?>
                                    <tr>
                                        <td><?php echo $student->id; ?></td>
                                        <td><?php echo $student->name; ?></td>
                                        <td><?php echo $student->email; ?></td>
                                        <td><?php echo $student->gender; ?></td>
                                        <td><?php echo $student->dob; ?></td>
                                        <td><?php echo $student->age; ?></td>
                                        <td><a href="edit.php?id=<?php echo $student->id; ?>" class="btn btn-primary">Edit</a>
                                        <a href="destroy.php?id=<?php echo $student->id; ?>" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php else: ?>
                    <p>No Students found in database</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>