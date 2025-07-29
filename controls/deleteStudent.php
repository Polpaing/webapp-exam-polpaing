<?php
session_start();
include 'db.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    // Prepare and execute the delete statement
    $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
    $result = $stmt->execute([$id]);

    if ($result) {
        $_SESSION['sucecess'] = "User deleted successfully!";
        header("Location: ../index.php");
    } else {
        $_SESSION['error'] = "Failed to delete user.";
        header("Location: ../index.php");
    }

    exit;
}
?>