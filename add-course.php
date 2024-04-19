<?php require_once('./database/connection.php'); ?>

<?php
$name = $duration = $description = "";
if (isset($_POST['submit'])) {
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    //ECHO  "SUBMIT BUTTON WORKS";

    $name = htmlspecialchars($_POST['name']);
    
    $duration = htmlspecialchars($_POST['duration']);
    $description = htmlspecialchars($_POST['description']);
    


    if (empty($name)) {
        $error = "Enter the name!";
    } elseif (empty($duration)) {
        $error = "Enter the duration!";
    } else {
        $sql = "INSERT INTO `courses`(`name`, `duration`, `description`) VALUES ('$name', '$duration', '$description')";
        $result = $conn->query($sql);
        if ($result) {
            $success = "Magic has been spelled!";
            $name = $duration = "";
        } else {
            $error = "Magic has failed to spell!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="text-bg-dark" >
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header border border-3  border-warning ">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="m-0">Add Course</h3>
                            </div>
                            <div class="col-6 text-end">
                                <a href="./dashboard.php" class="btn btn-outline-primary">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border border-3  border-warning">

                        <?php
                        if (isset($error) && !empty($error)) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $error; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if (isset($success) && !empty($success)) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $success; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        }
                        ?>

                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name!" value="<?php echo $name ?>">
                            </div>

                            <div class="mb-3">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="text" class="form-control" name="duration" id="duration" placeholder="Enter the duration!" value="<?php echo $duration ?>">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Enter the description!"><?php echo $description ?></textarea>
                            </div>

                            <div>
                                <input type="submit" class="btn btn-outline-success  " name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>