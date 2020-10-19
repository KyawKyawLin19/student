<?php

    require_once('vendor/autoload.php');

    use Utils\DB;
        
    $db = new DB();

    $student = $db->edit($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-8">
                <?php if($student):?>
                    
                    <h1>Edit Student Info</h1>
                    
                    <form action="update.php" method="POST">

                        <input type="hidden" name="id" value="<?php echo $student->id ?>">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $student->name ?>" >
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $student->email ?>" >
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="" disabled>Choose Gender</option>
                                <option value="male" <?php if($student->gender=="male") { echo "selected"; } ?>>Male</option>
                                <option value="female" <?php if($student->gender=="female") { echo "selected"; } ?>>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="<?php echo $student->dob ?>">
                        </div>

                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" name="age" class="form-control" value="<?php echo $student->age ?>">
                        </div>

                        <button type="submit" class="btn btn-primary text-white">Edit Student</button>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </form>

                <?php else: ?>

                    <p> Student Not Found </p>
                
                <?php endif; ?>
            
            </div>
        </div>
    </div>
</body>
</html>