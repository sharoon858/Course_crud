<?php require_once('./database/connection.php'); ?>

<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: ./');
}
$sql = "SELECT * FROM `courses`";
$result = $conn->query($sql);
$courses = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="text-bg-dark">

    <div class="container mt-5">
        <div class="row">
            <div class="col-9 mx-auto">
                <div class="card">
                    <div class="card-header text-end">
                        <a href="./add-course.php" class="btn btn-primary">Add Course</a>
                        <a href="./logout.php" class="btn btn-danger">Logout</a>
                    </div>
                    <div class="card-body border border-3  border-warning">
                        Welcome <strong><?php echo $_SESSION['user']['name'] ?></strong>
                        
                        <?php
                        if ($result->num_rows > 0) { ?>
                            <table class="table table-bordered m-0">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Duration</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $sr = 1;
                                    foreach ($courses as $course) { ?>
                                        <tr>
                                            <td><?php echo $sr++; ?></td>
                                            <td><?php echo $course['name']; ?></td>
                                            <td><?php echo $course['duration']; ?></td>
                                            <td><?php echo $course['description']; ?></td>
                                            <td>
                                                <a href="./edit-course.php?id=<?php echo $course['id'] ?>" class="btn btn-outline-primary">Edit</a>
                                                <a href="./delete-course.php?id=<?php echo $course['id'] ?>" class="btn btn-outline-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        } else { ?>
                            <div class="alert alert-info m-0">No record found!</div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>



