<?php require_once('./database/connection.php'); ?>

<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: ./dashboard.php');
}

$sql = "DELETE FROM `courses` WHERE `id` = $id";
$result = $conn->query($sql);
if ($result) {
    header('location: ./dashboard.php');
} else {
    die('Failed to delete!');
}