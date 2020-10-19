<?php
    
    require_once('vendor/autoload.php');

    use Utils\DB;
        
    $db = new DB();

    $statement = $pdo->prepare("SELECT * FROM students WHERE id = :id");

    $statement->bindParam(":id", $_GET["id"]);

    $statement->execute();

    $student = $statement->fetch(PDO::FETCH_OBJ);

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
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <table class="table table-light">
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
                        <tr>
                            <td><?php echo $student->id; ?></td>
                            <td><?php echo $student->name; ?></td>
                            <td><?php echo $student->email; ?></td>
                            <td><?php echo $student->gender; ?></td>
                            <td><?php echo $student->dob; ?></td>
                            <td><?php echo $student->age; ?></td>
                            <td><a href="edit.php?id=<?php echo $student->id; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="destroy.php?id=<?php echo $student->id; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>